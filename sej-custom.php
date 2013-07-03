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


function sej_add_to_home() {
/*
 *  Thanks to http://cubiq.org/add-to-home-screen
 *  Also at https://github.com/cubiq/add-to-homescreen
 */
?>
<link rel="apple-touch-icon" href="<?php echo plugins_url( 'apple-touch-icon.png', __FILE__ ); ?>" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo plugins_url( 'apple-touch-icon-72.png', __FILE__ ); ?>" />
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo plugins_url( 'apple-touch-icon-114.png', __FILE__ ); ?>" />
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo plugins_url( 'apple-touch-icon-144.png', __FILE__ ); ?>" />
<?php if ( is_front_page() ) { ?>
<script type="text/javascript">
var addToHomeConfig = {
	animationIn: 'bubble',
	animationOut: 'drop',
	autostart:false,
	lifespan:10000,
	expire:2,
	touchIcon:true,
	message:'Add Social Europe Journal to your %device home screen. Click on the %icon icon.'
};
</script>

<link rel="stylesheet" href="<?php echo plugins_url( 'add2home/add2home.css', __FILE__ ); ?>">
<script type="application/javascript" src="<?php echo plugins_url( 'add2home/add2home.js', __FILE__ ); ?>"></script>

<script type="text/javascript">
function loaded () {
	if ( window.location.hash.match('ios') ) return;
	addToHome.show();
	window.location.hash = '#ios';
}
window.addEventListener('load', loaded, false);
</script>


<?php
}
}
add_action('wp_head','sej_add_to_home');


function sej_custom_functions() {
	include('functions.php');
}
add_action( 'after_setup_theme', 'sej_custom_functions' );

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

add_filter( 'sidebars_widgets', 'cftp_randomise_widgets' );
function cftp_randomise_widgets( array $sidebars_widgets ) {
	if ( is_admin() ) {
		return $sidebars_widgets;
	}
	global $wp_registered_widgets;
	$primary = $sidebars_widgets['sidebar'];
	if ( in_array('text-25',$primary) && in_array('text-16',$primary) ) {
		$h = date('g');
		if ($h&1) {
			$primary[ array_search('text-16',$primary) ] = 'text-25';
			$primary[ array_search('text-25',$primary) ] = 'text-16';
		}

	}
	$sidebars_widgets['sidebar'] = $primary;
	return $sidebars_widgets;
}
