# Change Log
All notable changes to this project will be documented in this file.

## [Unreleased]
### Added 
- No added features yet

### Changed
- No other changes yet

## [1.0.0] - 2017-4-8
### Added 
- Activated notice.
- Automating the locating of hooks (props salcode)

### Changed
- Main file name updated from `g-hooks.php` to `genesis-visual-hook-guide` to match plugin slug. Due to this, plugin will need to be reactivated after updating.
- Query strings to display hooks, filters, and markup are now gvhg_hooks, gvhg_filters and gvhg_markup.
- Escapes output of add_query_arg
- Filter hooks genesis_seo_title and genesis_seo_description names were displayed wrong.
- Action hooks no longer have descriptions. This will be re-added in a later release.

## [0.9.5] - 2014-12-31
- Added: Clear menu item to disable all active displayed views. (Props salcode)
- Fixed: Don't add actions onto genesis' hooks unless displaying. (Props jb510)
- Fixed: The textual value echod from gvhg_ping_author_says_text function was incorrect.
- Updated: Simplified filter hook callbacks. (Props garyj)

## 0.9.0 - 2013-5-16
- Added: New Hooks from Genesis 2.0 (HTML5):
			genesis_before_entry,
			genesis_entry_header,
			genesis_before_entry_content,
			genesis_entry_content,
			genesis_after_entry_content,
			genesis_entry_footer,
			genesis_after_entry,
			genesis_before_post,
- Added: New markup containers and classes for Genesis 2.0 (HTML5):
- Fixed: Added filter for genesis_footer_creds_text.

## 0.8.3
- Fixed: get_theme_data() deprecated in WP 3.4 / replaced with wp_get_theme().

## 0.8.2
- Fixed: Error messages when WP_DEBUG is enabled.

## 0.8.1
- Added: Discription for genesis_header_right()
- Fixed: Removed wp_print_styles in favor of wp_enqueue_scripts.

## 0.8
- Added: Missing descriptions for the rest of the hooks.
- Added: More filters:
			genesis_comments_closed_text,
			genesis_no_comments_text,
			genesis_no_pings_text

## 0.7b
- Added: More descriptions to a few of the hooks.
- Added: More filters:
			genesis_post_info,
			genesis_post_meta,
			genesis_post_title_text,
			genesis_noposts_text,
			genesis_search_text,
			genesis_search_button_text,
			genesis_nav_home_text
- Fix: Formatting of Document Head hook comments. Now followed by a carriage return.

## 0.6b
- Bug fix: Fixes an issue in which the path to the stylesheets required to style the hooks was incorrect.

## 0.5b
- Initial Beta Release

[Unreleased]: https://github.com/christophercochran/Genesis-Visual-Hook-Guide/compare/0.9.5...HEAD
[1.0.0]: https://github.com/christophercochran/Genesis-Visual-Hook-Guide/compare/0.9.5...1.0.0
[0.9.5]: https://github.com/christophercochran/Genesis-Visual-Hook-Guide/compare/0.9.0...0.9.5
