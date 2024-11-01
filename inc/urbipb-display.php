<?php
/*
 * Display Functions
 *
 * @package urbipb
 *
 */
 
if ( ! defined( 'ABSPATH' ) ) exit;
 

function urbipb_settings_options() {

	// Section
	add_settings_section(
		'urbipb_settings_section', 
		'Plugin Settings', 
		'urbipb_display_settings_options_content', 
		'urbipb&tab=urbipb-options'
	);
	
	// Enable Promobar
	add_settings_field(
		'urbipb_enable_disclaimer', 
		'Enable Disclaimer', 
		'urbipb_enable_checkbox', 
		'urbipb&tab=urbipb-options', 
		'urbipb_settings_section', 
		array( 'var' => 'urbipb_enable_disclaimer' ) 
	);      
	register_setting('urbipb_settings_section', 'urbipb_enable_disclaimer');

	// Promobar HTML content
	add_settings_field(
		'urbipb_disclaimer_html', 
		'Disclaimer HTML Content', 
		'urbipb_display_wp_editor', 
		'urbipb&tab=urbipb-options', 
		'urbipb_settings_section'
	);      
	register_setting('urbipb_settings_section', 'urbipb_disclaimer_html');

	// Enable Fixed
	add_settings_field(
		'urbipb_disclaimer_fixed', 
		'Fixed Position', 
		'urbipb_enable_checkbox', 
		'urbipb&tab=urbipb-options', 
		'urbipb_settings_section', 
		array( 'var' => 'urbipb_disclaimer_fixed' ) 
	);      
	register_setting('urbipb_settings_section', 'urbipb_disclaimer_fixed');

	// Background color picker
	add_settings_field(
		'urbipb_disclaimer_background', 
		'Disclaimer Background Color', 
		'urbipb_display_color_picker', 
		'urbipb&tab=urbipb-options', 
		'urbipb_settings_section'
	);      
	register_setting('urbipb_settings_section', 'urbipb_disclaimer_background');

	// Dashicons icon picker
	add_settings_field(
		'urbipb_disclaimer_icon', 
		'Disclaimer Icon', 
		'urbipb_display_icons_picker', 
		'urbipb&tab=urbipb-options', 
		'urbipb_settings_section'
	);      
	register_setting('urbipb_settings_section', 'urbipb_disclaimer_icon');

	// Start Date
	add_settings_field(
		'urbipb_disclaimer_start_date', 
		'Start Date', 
		'urbipb_display_date', 
		'urbipb&tab=urbipb-options', 
		'urbipb_settings_section', 
		array('option_id' => 'urbipb_disclaimer_start_date', 'class' => 'urbipb-date')
	);      
	register_setting('urbipb_settings_section', 'urbipb_disclaimer_start_date');

	// Start Time
	add_settings_field(
		'urbipb_disclaimer_start_time', 
		'', 
		'urbipb_display_time', 
		'urbipb&tab=urbipb-options', 
		'urbipb_settings_section', 
		array('option_id' => 'urbipb_disclaimer_start_time', 'class' => 'urbipb-time')
	);      
	register_setting('urbipb_settings_section', 'urbipb_disclaimer_start_time');

	// End Date
	add_settings_field(
		'urbipb_disclaimer_end_date', 
		'End Date', 
		'urbipb_display_date', 
		'urbipb&tab=urbipb-options', 
		'urbipb_settings_section', 
		array('option_id' => 'urbipb_disclaimer_end_date', 'class' => 'urbipb-date')
	);      
	register_setting('urbipb_settings_section', 'urbipb_disclaimer_end_date');

	// End Time
	add_settings_field(
		'urbipb_disclaimer_end_time', 
		'', 
		'urbipb_display_time', 
		'urbipb&tab=urbipb-options', 
		'urbipb_settings_section', 
		array('option_id' => 'urbipb_disclaimer_end_time', 'class' => 'urbipb-time')
	);      
	register_setting('urbipb_settings_section', 'urbipb_disclaimer_end_time');

	// Exclude Pages
	add_settings_field(
		'urbipb_exclude_pages', 
		'Exclude Page(s)', 
		'urbipb_exclude_pages_multiselect', 
		'urbipb&tab=urbipb-options', 
		'urbipb_settings_section'
	);      
	register_setting('urbipb_settings_section', 'urbipb_exclude_pages');

	// JS Cookie Expire		
	add_settings_field(
		'urbipb_cookie_expire', 
		'Cookie Expires', 
		'urbipb_cookie_expire_input', 
		'urbipb&tab=urbipb-options', 
		'urbipb_settings_section'
	);
	register_setting('urbipb_settings_section', 'urbipb_cookie_expire');

	// Enable Localhost
	add_settings_field(
		'urbipb_enable_localhost', 
		'Enable Localhost', 
		'urbipb_enable_checkbox', 
		'urbipb&tab=urbipb-options', 
		'urbipb_settings_section', 
		array( 'var' => 'urbipb_enable_localhost' )
	);      
	register_setting('urbipb_settings_section', 'urbipb_enable_localhost');

	// Reset JS Cookie Value
	add_settings_field(
		'urbipb_cookie_set_value', 
		'JS Cookie Value', 
		'urbipb_cookie_reset_field', 
		'urbipb&tab=urbipb-options', 
		'urbipb_settings_section' 
	);
	register_setting('urbipb_settings_section', 'urbipb_cookie_set_value');	
	
}
add_action('admin_init', 'urbipb_settings_options');



function urbipb_display_settings_options_content(){ 
	echo '<p>Configure settings for promobar plugin.</p>';
}


function urbipb_enable_checkbox( $variation ) { 
	$setting_id = $variation['var'];
	$setting_value = get_option( $setting_id );

	echo sprintf('<p><input type="checkbox" id="%1$s" name="%1$s" value="1" %2$s /></p>', $setting_id, checked( $setting_value, 1, false ) );
}

function urbipb_cookie_reset_field() {
	$urbipb_cookie_value = get_option( 'urbipb_cookie_set_value', 'seen' );

	echo '<p><input type="text" id="urbipb_cookie_set_value" name="urbipb_cookie_set_value" value="'. $urbipb_cookie_value .'" readonly/> <a id="urbipb_cookie_reset" class="button" tabindex="99">Regenerate</a></p>';
}

function urbipb_display_wp_editor() {
	$content = get_option('urbipb_disclaimer_html');

	wp_editor( $content, 'urbipb_disclaimer_html' );
}

function urbipb_display_color_picker() {
	$color = get_option( 'urbipb_disclaimer_background' );

	echo '<input id="urbipb_disclaimer_background" class="color-picker" name="urbipb_disclaimer_background" type="text" value="'. $color .'" />';
}

function urbipb_display_icons_picker( $args ) {
	$icon_option = ( !empty( get_option('urbipb_disclaimer_icon') ) ? get_option('urbipb_disclaimer_icon') : '' );

	echo sprintf( '<p><span id="icon-preview" class="icon-preview"><span class="dashicons %1$s"></span></span> <input class="regular-text" type="text" id="urbipb_disclaimer_icon" name="urbipb_disclaimer_icon" value="%1$s"/>', $icon_option );

	echo '<input type="button" data-target="#urbipb_disclaimer_icon" class="button dashicons-picker" value="Choose Icon" /> <a href="https://developer.wordpress.org/resource/dashicons/" target="_blank" class="helper-link">Dashicons Reference</a></p>';

}


function urbipb_display_date($variation) {
	$urbipb_option_id = $variation['option_id'];
	$urbipb_date = get_option($urbipb_option_id);
	
	echo '<input type="date" id="'. $urbipb_option_id .'" name="'. $urbipb_option_id .'" value="'. $urbipb_date .'" /> ';
}


function urbipb_display_time($variation) {
	$urbipb_option_id = $variation['option_id'];
	$urbipb_time = get_option($urbipb_option_id);
	
	echo '<input type="time" id="'. $urbipb_option_id .'" name="'. $urbipb_option_id .'" value="'. $urbipb_time .'" />';
}


function urbipb_exclude_pages_multiselect() {
	$urbipb_exclude_pages = get_option('urbipb_exclude_pages');

	$page_args = array(
		'post_type' => 'page',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	
	$pages = get_pages($page_args);
	
	if ( $pages ) : 
	?>
		<select id="urbipb_exclude_pages" name="urbipb_exclude_pages[]" multiple="multiple">
		    <?php foreach ( $pages as $page ) : 
		    	if ( ! empty( $urbipb_exclude_pages ) ) {
		    ?>
		    	<option value="<?php echo $page->ID; ?>" <?php selected( true, in_array( $page->ID, $urbipb_exclude_pages ) ); ?>><?php echo $page->post_title; ?></option>
			<?php } else { ?>
		    	<option value="<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option>
			<?php
				}
			endforeach;  ?>
		</select>
	<?php 
	endif; // $pages

} // urbipb_exclude_pages_multiselect


function urbipb_announce_delay_input() { ?>

	<input type="number" id="urbipb_announce_delay" name="urbipb_announce_delay" value="<?php echo $urbipb_announce_delay = get_option( 'urbipb_announce_delay', 2.5 ); ?>" step="0.1" min="0" max="10"> <small><em><?php echo __('seconds', 'urbipb'); ?></em></small>
	
<?php } // urbipb_announce_delay_input


function urbipb_cookie_expire_input() { ?>

	<input type="number" id="urbipb_cookie_expire" name="urbipb_cookie_expire" value="<?php echo $urbipb_cookie_expire = get_option( 'urbipb_cookie_expire', 180 ); ?>" step="1" min="1" max="366"> <small><em><?php echo __('days', 'urbipb'); ?></em></small>

<?php } // urbipb_cookie_expire_input


function urbipb_main_display() {
?>
	<form method="post" action="options.php" enctype="multipart/form-data">

<?php
		settings_fields('urbipb_settings_section');
		do_settings_sections('urbipb&tab=urbipb-options');
		submit_button();
?>

	</form>
<?php
} // urbipb_main_display


add_action( 'wp_ajax_urbipb_reset_cookie_value', 'urbipb_reset_cookie_value' );
function urbipb_reset_cookie_value() {
	if ( ! is_admin() || ! is_user_logged_in() ) {
		die();
	}

	$randomized_value = urbipb_get_random_string();

	echo json_encode($randomized_value);
	
	die();

} // urbipb_reset_cookie_value

