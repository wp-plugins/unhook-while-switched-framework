<?php
/*
Plugin Name: Switch Framework for WordPress
Plugin URI: http://ronandandrea.com/plugins/unhook-while-switched/
Description: Provides a framework for unhooking while switched.
Version: 0.1
Author: Ron Rennick (http://ronandandrea.com)
Network: true

    Copyright:	(C) 2010 Ron Rennick, All rights reserved. Distributed under GPLv2
*/

function ra_switched_restore_hooks() {
	global $mysubscribe2;

	if( is_object( $mysubscribe2 ) && class_exists( 's2class' ) ) {
		add_action( 'save_post', array( &$mysubscribe2, 's2_meta_handler' ) );
		add_action( 'create_category', array( &$mysubscribe2, 'new_category' ) );
		add_action( 'delete_category', array( &$mysubscribe2, 'delete_category' ) );
		add_action( 'wp_meta', array( &$mysubscribe2, 'add_minimeta' ), 0 );
		add_action( 'new_to_publish', array( &$mysubscribe2, 'publish' ) );
		add_action( 'draft_to_publish', array( &$mysubscribe2, 'publish' ) );
		add_action( 'pending_to_publish', array( &$mysubscribe2, 'publish' ) );
		add_action( 'private_to_publish', array( &$mysubscribe2, 'publish' ) );
		add_action( 'future_to_publish', array( &$mysubscribe2, 'publish' ) );
	}
}
add_action( 'ra_switched_restore', 'ra_switched_restore_hooks' );

function ra_switched_remove_hooks() {
	global $mysubscribe2;

	if( is_object( $mysubscribe2 ) && class_exists( 's2class' ) ) {
		remove_action( 'save_post', array( &$mysubscribe2, 's2_meta_handler' ) );
		remove_action( 'create_category', array( &$mysubscribe2, 'new_category' ) );
		remove_action( 'delete_category', array( &$mysubscribe2, 'delete_category' ) );
		remove_action( 'wp_meta', array( &$mysubscribe2, 'add_minimeta' ), 0 );
		remove_action( 'new_to_publish', array( &$mysubscribe2, 'publish' ) );
		remove_action( 'draft_to_publish', array( &$mysubscribe2, 'publish' ) );
		remove_action( 'pending_to_publish', array( &$mysubscribe2, 'publish' ) );
		remove_action( 'private_to_publish', array( &$mysubscribe2, 'publish' ) );
		remove_action( 'future_to_publish', array( &$mysubscribe2, 'publish' ) );
	}
}
add_action( 'ra_switched_remove', 'ra_switched_remove_hooks' );
/*
 * Do not edit below this line - the code below controls when unhooking and hooking occurs
 */
function ra_unhook_while_switched( $switched_id, $previous_id ) {
	global $switched_stack;
	static $switched = false;

	if( $switched_id == $previous_id || ( !$switched && empty( $switched_stack ) ) )
		return;

	if( !$switched ) {
		$switched = true;
		do_action( 'ra_switched_remove', $switched_id, $previous_id );
		return;
	}
	foreach( $switched_stack as $id ) {
		if( $id != $switched_id )
			return;
	}
	$switched = false;
	do_action( 'ra_switched_restore', $switched_id, $previous_id );
}
add_action( 'switch_blog', 'ra_unhook_while_switched', 10, 2 );

