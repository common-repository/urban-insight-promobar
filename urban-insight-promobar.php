<?php
/*
 * Plugin Name: Urban Insight Promobar
 * Description: Adds a dismissable promo bar to the top of a website with a customizable HTML message, and scheduling options
 * Version: 1.3.3
 * Requires at least: 5.0
 * Tested up to: 6.4
 * Author: Urban Insight
 * Author URI: https://urbaninsight.com?ref=urbipb
 * Text Domain: urbipb
 */
 
if ( ! defined( 'ABSPATH' ) ) exit;

function urbipb_initialize() {
	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)) ? "https://" : "http://";
	define('URBIPB_INSTANCE', str_replace($protocol, "", get_bloginfo('wpurl')));
	define('URBIPB_VERSION', '1.3.3');
}
add_action('plugins_loaded', 'urbipb_initialize'); 


add_action('admin_enqueue_scripts', 'urbipb_admin_enqueue_scripts');
function urbipb_admin_enqueue_scripts( $screen_id ) {
	if ( $screen_id != 'settings_page_urbipb' ) {
		return;
	}

	// Color Picker
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );

	// Dashicons Picker
	wp_enqueue_style( 'dashicons-picker', plugins_url( 'css/dashicons-picker.css', __FILE__ ), array( 'dashicons' ), '1.0' );
	wp_enqueue_script( 'dashicons-picker', plugins_url( 'js/dashicons-picker.js', __FILE__ ), array( 'jquery' ), '1.0' );

	// Plugin Style, Script
	wp_enqueue_style('urbipb-admin-style', plugins_url('css/urbipb-admin.css', __FILE__));
	wp_enqueue_script('urbipb-admin-js', plugins_url('js/urbipb-admin.js', __FILE__), array('jquery'), '', true);
}


add_action('wp_enqueue_scripts', 'urbipb_enqueue_scripts');
function urbipb_enqueue_scripts() {
	wp_enqueue_style('dashicons');

	wp_enqueue_style('urbipb-style', plugins_url('css/urbipb.css', __FILE__));

	if ( wp_script_is( 'js-cookie', 'enqueued' ) == false ) {
		wp_enqueue_script('js-cookie', plugins_url('js/js.cookie.min.js', __FILE__), array('jquery'));
	}

	// JS Cookie Args
	$urbipb_cookie_args = array(
		'path' => sanitize_file_name('/'),
	);

	// Domain
	if ( get_option( 'urbipb_enable_localhost' ) !== '1' ) {
		$urbipb_cookie_args['domain'] = URBIPB_INSTANCE;
	}

	// Expires
	if ( $cookie_expire = get_option( 'urbipb_cookie_expire' ) ) {
		$urbipb_cookie_args['expires'] = intval($cookie_expire);
	}

	wp_register_script( 'urbipb-script', plugins_url('js/urbipb.js', __FILE__), array('jquery', 'js-cookie') );
	$urbipb_data = array(
		'cookie_value' => get_option( 'urbipb_cookie_set_value', 'seen' ),
		'fixed' => get_option( 'urbipb_disclaimer_fixed', false ),
		'cookie_args' => json_encode( $urbipb_cookie_args )
	);
	wp_localize_script( 'urbipb-script', 'urbipb_data', $urbipb_data );
	wp_enqueue_script( 'urbipb-script' );
}


require_once('inc/urbipb-functions.php');
require_once( 'inc/urbipb-display.php' );


add_action('admin_menu', 'urbipb_admin_menu');
function urbipb_admin_menu() {
	add_submenu_page('options-general.php', 'Urban Insight Promobar', 'UI Promobar', 'activate_plugins', 'urbipb', 'urbipb_page');
}


function urbipb_page() {
?>

	<div id="urbipb-container" class="wrap">
		
		<div class="plugin-header">
			<h2 class="plugin-title">
				<a href="https://urbaninsight.com?ref=<?php echo URBIPB_INSTANCE; ?>&plugin=urbipb" target="_blank">
					<img src="<?php echo plugins_url( '/img/urban_insight-logo_dark.svg', __FILE__ ); ?>" width="300" height="auto" align="middle" align="left" />
				</a>
				Urban Insight Promobar<br><small>Version <?php echo URBIPB_VERSION; ?></small>
			</h2>
		</div>

		<?php urbipb_main_display(); ?>
		
	</div><!-- #urbipb-container -->
	
<?php

} // urbipb_page


add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'urbipb_action_links' );
function urbipb_action_links( $links ) {
	$plugin_links = array(
		'<a href="' . admin_url( 'options-general.php?page=urbipb' ) . '">' . __( 'Settings', 'urbipb' ) . '</a>',
	);
	return array_merge( $plugin_links, $links );	
}
