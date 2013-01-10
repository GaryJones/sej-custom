<?php
/*
Plugin Name: SEJ Customisations
Plugin URI: http://codeforthepeople.com/?plugin=sej-custom
Description: A safe way to make changes to the Genesis Magazine child theme. Produced by Code For The People on behalf of Social Europe Journal.
Author: Simon Dickson
Version: 2013.01
Author URI: http://codeforthepeople.com/

            _____________
           /      ____   \
     _____/       \   \   \
    /\    \        \___\   \
   /  \    \                \
  /   /    /          _______\
 /   /    /          \       /
/   /    /            \     /
\   \    \ _____    ___\   /
 \   \    /\    \  /       \
  \   \  /  \____\/    _____\
   \   \/        /    /    / \
    \           /____/    /___\
     \                        /
      \______________________/

*/

function call_sej_custom_css() {
	$theme = wp_get_theme();
	if ( 'magazine' == $theme->stylesheet ) {
?>
<link rel="stylesheet" id="sej-css" media="all" type="text/css" href="<?php
	echo plugins_url( 'sej-custom.css', __FILE__ )
?>"></link>
<?php
	}
}
add_action( 'wp_head', 'call_sej_custom_css', 739165030 ); /* FYI: it's the estimated population of Europe in 2011 */

function re_reposition_navigation() {
	remove_action( 'genesis_before', 'genesis_do_nav' );
	remove_action( 'genesis_after_header', 'genesis_do_subnav' );
	add_action( 'genesis_after_header', 'genesis_do_nav' );
	add_action( 'genesis_after_header', 'genesis_do_subnav' );
}
add_action( 'after_setup_theme', 're_reposition_navigation' );

function no_reply_on_trackback( $link ) {
	global $comment;
	if ( ( $comment->comment_type == "trackback" ) || ( $comment->comment_type == "pingback" ) ) {
		$link = '';
	}
	return $link;
}
add_filter( 'comment_reply_link', 'no_reply_on_trackback' );

function sej_change_favicon( $url ) {
	return WP_PLUGIN_URL . '/sej-custom/favicon.ico';
}
add_filter( 'genesis_favicon_url', 'sej_change_favicon' );

//Custom Feed Display
add_action( 'do_feed_rss2_custom', 'do_feed_rss2_custom', 10, 1 );
function do_feed_rss2_custom( $for_comments ) {
	if ( $for_comments )
		load_template( plugin_dir_path(__FILE__) . '/feed-rss2-custom-comments.php' );
	else
		load_template( plugin_dir_path(__FILE__) . '/feed-rss2-custom.php' );
}

function custom_feed_rewrite($wp_rewrite) {
	$feed_rules = array(
	'feed/(.+)' => 'index.php?feed=' . $wp_rewrite->preg_index(1),
	'(.+).xml' => 'index.php?feed='. $wp_rewrite->preg_index(1)
	);
	$wp_rewrite->rules = $feed_rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'custom_feed_rewrite');

add_filter('default_feed', 'change_default_feed');
function change_default_feed() {
	return 'rss2_custom';
}

remove_action('genesis_comment_form', 'genesis_do_comment_form');
add_action('genesis_before_comments', 'genesis_do_comment_form');