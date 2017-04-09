<?php
/*
Plugin Name: Genesis Visual Hook Guide
Plugin URI: https://genesistutorials.com/visual-hook-guide/
GitHub Plugin URI: https://github.com/christophercochran/Genesis-Visual-Hook-Guide
Description: Find Genesis hooks (action and filter hooks) quick and easily by seeing their actual locations inside your theme.
Version: 1.0.0
Author: Christopher Cochran
Author URI: http://christophercochran.me
Text Domain: genesis-visual-hook-guide
License: GPLv2
*/


register_activation_hook(__FILE__, 'gvhg_activation_check');
function gvhg_activation_check() {

		$theme_info = wp_get_theme();

		$genesis_flavors = array(
			'genesis',
			'genesis-trunk',
		);

		if ( ! in_array( $theme_info->Template, $genesis_flavors ) ) {
			deactivate_plugins( plugin_basename(__FILE__) ); // Deactivate ourself
			wp_die('Sorry, you can\'t activate unless you have installed <a href="https://my.studiopress.com/themes/genesis/">Genesis</a>');
		}
}

add_action( 'admin_notices', 'gvhg_active_notice' );
function gvhg_active_notice() { ?>
    <div class="notice notice-warning" >
        <p><?php _e( 'Genesis Visual Hook Guide is currently active. If this is a production site, remember to deactivate after use.', 'genesis-visual-hook-guide' ); ?></p>
    </div>
<?php }

add_action( 'admin_bar_menu', 'gvhg_admin_bar_links', 100 );
function gvhg_admin_bar_links() {
global $wp_admin_bar;

	if ( is_admin() )
		return;

	$wp_admin_bar->add_menu(
		array(
			'id' => 'gvhg_hooks',
			'title' => __( 'Genesis Hook Guide', 'genesis-visual-hook-guide' ),
			'href' => '',
			'position' => 0,
		)
	);
	$wp_admin_bar->add_menu(
		array(
			'id'	   => 'gvhg_hooks_action',
			'parent'   => 'gvhg_hooks',
			'title'	   => __( 'Action Hooks', 'genesis-visual-hook-guide' ),
			'href'	   => esc_url( add_query_arg( 'gvhg_hooks', 'show' ) ),
			'position' => 10,
		)
	);
	$wp_admin_bar->add_menu(
		array(
			'id'	   => 'gvhg_hooks_filter',
			'parent'   => 'gvhg_hooks',
			'title'	   => __( 'Filter Hooks', 'genesis-visual-hook-guide' ),
			'href'	   => esc_url( add_query_arg( 'gvhg_filters', 'show' ) ),
			'position' => 10,
		)
	);
	$wp_admin_bar->add_menu(
		array(
			'id'	   => 'gvhg_hooks_markup',
			'parent'   => 'gvhg_hooks',
			'title'	   => __( 'Markup', 'genesis-visual-hook-guide' ),
			'href'	   => esc_url( add_query_arg( 'gvhg_markup', 'show' ) ),
			'position' => 10,
		)
	);
	$wp_admin_bar->add_menu(
		array(
			'id'	   => 'gvhg_hooks_clear',
			'parent'   => 'gvhg_hooks',
			'title'	   => __( 'Clear', 'genesis-visual-hook-guide' ),
			'href'	   => esc_url( remove_query_arg(
				array(
					'gvhg_hooks',
					'gvhg_filters',
					'gvhg_markup',
				)
			) ),
			'position' => 10,
		)
	);

}

add_action('wp_enqueue_scripts', 'gvhg_hooks_stylesheet');
function gvhg_hooks_stylesheet() {

	 $gvhg_plugin_url = plugins_url( NULL, __FILE__ );

	 if ( 'show' == isset( $_GET['gvhg_hooks'] ) )
		wp_enqueue_style( 'gvhg_styles', $gvhg_plugin_url . '/css/styles.css' );

	 if ( 'show' == isset( $_GET['gvhg_filters'] ) )
		wp_enqueue_style( 'gvhg_styles', $gvhg_plugin_url . '/css/styles.css' );

	 if ( 'show' == isset( $_GET['gvhg_markup'] ) )
		wp_enqueue_style( 'gvhg_markup_styles', $gvhg_plugin_url . '/css/markup.css' );

}


add_action('genesis_meta', 'gvhg_genesis_hooker' );
function gvhg_genesis_hooker() {

	 if ( !('show' == isset( $_GET['gvhg_hooks'] ) ) && !('show' == isset( $_GET['gvhg_filters'] ) ) && !('show' == isset( $_GET['gvhg_markup'] ) ) ) {
		 return;  // BAIL without hooking into anyhting if not displaying anything
	 }

	add_action( 'genesis_header_right', '__return_empty_string', 1 );
	add_action( 'all', 'gvhg_genesis_action_hook', 1 );
}

function gvhg_genesis_action_hook () {
	global $wp_actions;

	if ( 'show' != isset( $_GET['gvhg_hooks'] ) ) {
		return;
	}

	$current_action = current_filter();

	if ( 'genesis_' !== substr( $current_action, 0, 8 ) ) {
		// Not a Genesis hook or filter.
		return;
	}

	if ( ! isset( $wp_actions[ $current_action ] ) ) {
		// This action is not an action (it is probably a filter).
		return;
	}

	echo '<div class="gvhg-hook-cue" data-gvhg-hook-cue="' . $current_action . '">' . $current_action . '</div>';

}

function gvhg_hook_name( $function, $element = null, $description = null ) {
	$function_name = str_replace( 'gvhg', 'genesis', $function );
	if ( $element ) {
		return '<' . $element . ' class="gvhg-filter-cue" data-gvhg-filter-cue="' . $function_name . '" title="' . $description . '">' . $function_name . '</' . $element . '>';
	}
	return $function;
}

add_action( 'wp', 'gvhg_filter_logic' );
function gvhg_filter_logic() {

	if ( 'show' == isset( $_GET['gvhg_filters'] ) ) {

		add_filter( 'genesis_seo_title', 'gvhg_seo_title', 10, 3 );
		add_filter( 'genesis_seo_description', 'gvhg_seo_description', 10, 3 );
		add_filter( 'genesis_title_comments', 'gvhg_title_comments');
		add_filter( 'genesis_comment_form_args', 'gvhg_comment_form_args');
		add_filter( 'genesis_comments_closed_text', 'gvhg_comments_closed_text');
		add_filter( 'comment_author_says_text', 'gvhg_comment_author_says_text');
		add_filter( 'genesis_no_comments_text', 'gvhg_no_comments_text');
		add_filter( 'genesis_title_pings', 'gvhg_title_pings');
		add_filter( 'ping_author_says_text', 'gvhg_ping_author_says_text');
		add_filter( 'genesis_no_pings_text', 'gvhg_no_pings_text');
		add_filter( 'genesis_breadcrumb_args', 'gvhg_breadcrumb_args');
		add_filter( 'genesis_footer_backtotop_text', 'gvhg_footer_backtotop_text', 100);
		add_filter( 'genesis_footer_creds_text', 'gvhg_footer_creds_text', 100);
		//add_filter( 'genesis_footer_output', 'gvhg_footer_output', 100, 3);
		add_filter( 'genesis_author_box_title', 'gvhg_author_box_title' );
		add_filter( 'genesis_post_info', 'gvhg_post_info' );
		add_filter( 'genesis_post_meta', 'gvhg_post_meta' );
		add_filter( 'genesis_post_title_text', 'gvhg_post_title_text');
		add_filter( 'genesis_noposts_text', 'gvhg_noposts_text');
		add_filter( 'genesis_search_text', 'gvhg_search_text');
		add_filter( 'genesis_search_button_text', 'gvhg_search_button_text');
		add_filter( 'genesis_nav_home_text', 'gvhg_nav_home_text');
		add_filter( 'genesis_favicon_url', 'gvhg_favicon_url');
		add_filter( 'genesis_footer_creds_text', 'gvhg_footer_creds_text');

	}

}

function gvhg_seo_title( $title, $inside, $wrap ) {
	return sprintf('<%s id="title">' . gvhg_hook_name( __FUNCTION__, 'span', 'Applied to the output of the genesis_seo_site_title function which depending on the SEO option set by the user will either wrap the title in <h1> or <p> tags. Default value: $title, $inside, $wrap' ) . '</%s>', $wrap, $wrap);
}

function gvhg_seo_description( $description, $inside, $wrap ) {
	return sprintf('<%s id="title">' . gvhg_hook_name( __FUNCTION__, 'span', 'Applied to the output of the genesis_seo_site_description function which depending on the SEO option set by the user will either wrap the description in <h1> or <p> tags. Default value: $description, $inside, $wrap' ) . '</%s>', $wrap, $wrap);
}

function gvhg_author_box_title() {
	return '<strong>' . gvhg_hook_name( __FUNCTION__, 'span' ) . '</strong>';
}

function gvhg_comment_author_says_text() {
	return gvhg_hook_name( __FUNCTION__, 'span' );
}

function gvhg_ping_author_says_text() {
	return gvhg_hook_name( __FUNCTION__, 'span' );
}

function gvhg_footer_backtotop_text() {
	return gvhg_hook_name( __FUNCTION__, 'div' );
}

function gvhg_footer_creds_text() {
	return gvhg_hook_name( __FUNCTION__, 'div' );
}

function gvhg_footer_output($output, $backtotop_text, $creds) {
	return gvhg_hook_name( __FUNCTION__, 'div' ) . $backtotop_text . $creds;
}

function gvhg_breadcrumb_args($args) {
	$args['prefix'] = '<div class="breadcrumb"><span class="filter">genesis_breadcrumb_args</span> ';
	$args['suffix'] = '</div>';
	$args['home'] = __('<span class="filter">[\'home\']</span>', 'genesis');
	$args['sep'] = '<span class="filter">[\'sep\']</span>';
	$args['labels']['prefix'] = __('<span class="filter">[\'labels\'][\'prefix\']</span> ', 'genesis');
	return $args;
}

function gvhg_title_pings() {
	echo gvhg_hook_name( __FUNCTION__, 'h3' );
}

function gvhg_no_pings_text() {
	echo gvhg_hook_name( __FUNCTION__, 'p' );
}

function gvhg_title_comments() {
	echo gvhg_hook_name( __FUNCTION__, 'h3' );
}

function gvhg_comments_closed_text() {
	echo gvhg_hook_name( __FUNCTION__, 'p' );
}

function gvhg_no_comments_text() {
	echo gvhg_hook_name( __FUNCTION__, 'p' );
}

function gvhg_comment_form_args($args) {
	$args['title_reply'] = '<span class="filter">genesis_comment_form_args [\'title_reply\']</span>';
	$args['comment_notes_before'] = '<span class="filter">genesis_comment_form_args [\'comment_notes_before\']</span>';
	$args['comment_notes_after'] = '<span class="filter">genesis_comment_form_args [\'comment_notes_after\']</span>';

	return $args;
}

function gvhg_favicon_url() {
	return 'genesis_favicon_url';
}

function gvhg_post_info() {
	return gvhg_hook_name( __FUNCTION__, 'span' );
}

function gvhg_post_meta() {
	return gvhg_hook_name( __FUNCTION__, 'span' );
}

function gvhg_post_title_text() {
	return gvhg_hook_name( __FUNCTION__, 'span' );
}

function gvhg_noposts_text() {
	return gvhg_hook_name( __FUNCTION__, 'span' );
}

function gvhg_search_text() {
	return esc_attr('genesis_search_text');
}

function gvhg_search_button_text() {
	return esc_attr('genesis_search_button_text');
}

function gvhg_nav_home_text() {
	return gvhg_hook_name( __FUNCTION__, 'span' );
}
