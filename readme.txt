=== Genesis Visual Hook Guide ===
Contributors: cochran
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=TLKVZFHV64ZS4&lc=US&item_name=Christopher%20Cochran&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: genesis, hooks, genesiswp, studiopress, filters, markup, guide
Requires at least: 3.4
Tested up to: 4.1
Stable tag: trunk
License: GPLv2 or later

Find Genesis hooks (action and filter hooks) quick and easily by seeing their actual locations inside your theme.

== Description ==

Once a tool for myself the Genesis Visual Hook guide has slowly evolved into what it is today. I finally welcome the plugin version of the popular [Visual Genesis Hooks and Filters Guide](http://genesistutorials.com/visual-hook-guide) from [Genesis Tutorials](http://genesistutorials.com).

Once installed this plugin adds a drop down menu to the admin bar to select between three views (Hook, Filter, and Markup). Select an option or all three to see the hooks in their actual locations on your current theme.

Great companion to [Genesis Simple Hooks](http://wordpress.org/extend/plugins/genesis-simple-hooks/).

**Genesis Theme Framework required.**

== Installation ==

1. Upload the entire `genesis-visual-hook-guide` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= I have my admin bar disable, can I still view the hooks without it? =

Sure! The views are triggered by a query string. Simply add ?g_markup=show ?g_hooks=show or ?g_filters=show to the end the url.

== Screenshots ==

1. Plugin in action on the default Sample Child Theme.
2. Hooks in Document Head.

== Changelog ==

= 0.9.5 =
* Added: Clear menu item to disable all active displayed views. (Props salcode)
* Fixed: Don't add actions onto genesis' hooks unless displaying. (Props jb510)
* Fixed: The textual value echod from gvhg_ping_author_says_text function was incorrect.
* Updated: Simplified filter hook callbacks. (Props garyj)

= 0.9.0 =
* Added: New Hooks from Genesis 2.0 (HTML5):
			genesis_before_entry,
			genesis_entry_header,
			genesis_before_entry_content,
			genesis_entry_content,
			genesis_after_entry_content,
			genesis_entry_footer,
			genesis_after_entry,
			genesis_before_post,
* Added: New markup containers and classes for Genesis 2.0 (HTML5):
* Fixed: Added filter for genesis_footer_creds_text.

= 0.8.3 =
* Fixed: get_theme_data() deprecated in WP 3.4 / replaced with wp_get_theme().

= 0.8.2 =
* Fixed: Error messages when WP_DEBUG is enabled.

= 0.8.1 =
* Added: Discription for genesis_header_right()
* Fixed: Removed wp_print_styles in favor of wp_enqueue_scripts.

= 0.8 =
* Added: Missing descriptions for the rest of the hooks.
* Added: More filters:
			genesis_comments_closed_text,
			genesis_no_comments_text,
			genesis_no_pings_text

= 0.7b =
* Added: More descriptions to a few of the hooks.
* Added: More filters:
			genesis_post_info,
			genesis_post_meta,
			genesis_post_title_text,
			genesis_noposts_text,
			genesis_search_text,
			genesis_search_button_text,
			genesis_nav_home_text
* Fix: Formatting of Document Head hook comments. Now followed by a carriage return.

= 0.6b =
* Bug fix: Fixes an issue in which the path to the stylesheets required to style the hooks was incorrect.

= 0.5b =
* Initial Beta Release