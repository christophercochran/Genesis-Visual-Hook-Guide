# Genesis Visual Hook Guide

Find Genesis hooks (action and filter hooks) quick and easily by seeing their actual locations inside your theme.

## Description 

Once a tool for myself the Genesis Visual Hook guide has slowly evolved into what it is today. I finally welcome the plugin version of the popular [Visual Genesis Hooks and Filters Guide](http://genesistutorials.com/visual-hook-guide) from [Genesis Tutorials](http://genesistutorials.com).

Once installed this plugin adds a drop down menu to the admin bar to select between three views (Hook, Filter, and Markup). Select an option or all three to see the hooks in their actual locations on your current theme.

Great companion to [Genesis Simple Hooks](https://wordpress.org/plugins/genesis-simple-hooks/).

**Genesis Theme Framework required.**

## Installation

### Upload

1. Download the latest tagged archive (choose the "zip" option).
* Go to the __Plugins__ → __Add New__ screen and click the __Upload__ tab.
* Upload the zipped archive directly.
* Go to the Plugins screen and click __Activate__.

### Manual

1. Download the latest tagged archive (choose the "zip" option).
* Unzip the archive.
* Copy the folder to your `/wp-content/plugins/` directory.
* Go to the Plugins screen and click __Activate__.

Check out the Codex for more information about [installing plugins manually](https://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation).

### Git

In a terminal, browse to your `/wp-content/plugins/` directory and clone this repository:

~~~sh
git clone git@github.com:christophercochran/Genesis-Visual-Hook-Guide.git
~~~

Then go to your Plugins screen and click __Activate__.


## FAQ
### I have my admin bar disable, can I still view the hooks without it?

Sure! The views are triggered by a query string. Simply add ?g_markup=show ?g_hooks=show or ?g_filters=show to the end the url.


## Release History
### 0.9.5
* Added: Clear menu item to disable all active displayed views. (Props salcode)
* Fixed: Don't add actions onto genesis' hooks unless displaying. (Props jb510)
* Fixed: The textual value echod from gvhg_ping_author_says_text function was incorrect.
* Updated: Simplified filter hook callbacks. (Props garyj)

### 0.9.0
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

### 0.8.3
* Fixed: get_theme_data() deprecated in WP 3.4 / replaced with wp_get_theme().

### 0.8.2
* Fixed: Error messages when WP_DEBUG is enabled.

### 0.8.1
* Added: Discription for genesis_header_right()
* Fixed: Removed wp_print_styles in favor of wp_enqueue_scripts.

### 0.8
* Added: Missing descriptions for the rest of the hooks.
* Added: More filters:
			genesis_comments_closed_text,
			genesis_no_comments_text,
			genesis_no_pings_text

### 0.7b
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

### 0.6b
* Bug fix: Fixes an issue in which the path to the stylesheets required to style the hooks was incorrect.

### 0.5b
* Initial Beta Release

## Credits

Built by [Christopher Cochran](https://twitter.com/tweetsfromchris)  
