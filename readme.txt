=== Unhook while switched framework ===
Contributors: wpmuguru, cuny-academic-commons
Tags: network, switched, utility, multisite
Requires at least: 2.7
Tested up to: 3.1
Stable tag: trunk

A framework for unhooking plugins while switched in a WP network.

== Description ==

This plugin adds two hooks to your WordPress network for plugins to use to unhook while switched and re-hook when restored to the original site. It include sample functions that unhooks and re-hooks the [Subscribe2](http://wordpress.org/extend/plugins/subscribe2/) plugin. Plugin authors can safely code their plugins to use the hooks without having to code in checks for the plugin being active. 

This plugin was written by [Ron Rennick](http://ronandandrea.com/) in collaboration with the [CUNY Academic Commons](http://dev.commons.gc.cuny.edu/).

[Plugin Page](http://wpmututorials.com/plugins/unhook-while-switched/)

== Installation ==

1. Upload the entire `unhook-while-switched-framework` folder to the `/wp-content/plugins/` directory
1. Network activate the plugin through the 'Plugins' menu in WordPress

OR

1. Upload ra-unhook-while-switched.php to the  `/wp-content/mu-plugins/` directory

== Changelog ==

= 0.1 =
* Original version.

