<?php
/*
 * Functions & Shortcodes
 *
 * @package urbipb
 *
 */
 
if ( ! defined( 'ABSPATH' ) ) exit;


function urbipb_get_random_string( $length = 16 ) {
    $chars = 'abcdefghijklmnopqrstuvwxyz';
    $output = substr( str_shuffle( $chars ), 0, $length );

    return $output;
}


function urbipb_footer() {
	$urbipb_cookie_value = get_option( 'urbipb_cookie_set_value', 'seen' );

	if ( ( isset( $_COOKIE['urbipb'] ) && ( $_COOKIE['urbipb'] === $urbipb_cookie_value ) ) ) {
		return;
	}
	
	if ( get_option( 'urbipb_enable_disclaimer' ) == '1' ) { 
	
		if ( ( get_option('urbipb_disclaimer_start_date') !== '' ) && ( get_option('urbipb_disclaimer_end_date') !== '' ) ){
			echo urbipb_announce_schedule_display();
		} else {
			echo urbipb_announce_display();
		}

	} // if urbipb_enable_disclaimer

} // urbipb_footer
add_action( 'wp_footer', 'urbipb_footer' );


function urbipb_announce_schedule_display() {
	$exclude_pages_option = get_option('urbipb_exclude_pages');

	$exclude_pages = apply_filters( 'urbipb_exclude_posts_pages', $exclude_pages_option );

	if ( ! empty( $exclude_pages ) && is_page( $exclude_pages ) ) {
		return;
	}

	$urbipb_announce_start = get_option('urbipb_disclaimer_start_date') .' '. get_option('urbipb_disclaimer_start_time');
	$urbipb_announce_end = get_option('urbipb_disclaimer_end_date') .' '. get_option('urbipb_disclaimer_end_time');
	
	$urbipb_now_datetime = current_time('mysql');
	
	$urbipb_now_date = strtotime($urbipb_now_datetime);
	$urbipb_start_date = strtotime($urbipb_announce_start);
	$urbipb_end_date = strtotime($urbipb_announce_end);
	
	if ( ( $urbipb_start_date <= $urbipb_now_date ) && ( $urbipb_end_date > $urbipb_now_date ) ) {
		urbipb_announce_overlay();
	}
	
} // urbipb_announce_display


function urbipb_announce_display() {
	$exclude_pages_option = get_option('urbipb_exclude_pages');

	$exclude_pages = apply_filters( 'urbipb_exclude_posts_pages', $exclude_pages_option );
	
	if ( ! empty( $exclude_pages ) && is_page( $exclude_pages ) ) {
		return;
	}

	urbipb_announce_overlay();

} // urbipb_announce_display


function urbipb_announce_overlay() {
	$background_color = get_option( 'urbipb_disclaimer_background', '#990000' );

?>

	<!-- Urban Insight Promobar Plugin -->
	<div id="urbipb-announcement-container" class="urbipb-announcement-container" style="background-color: <?php echo $background_color; ?>;">
		<div id="urbipb-announcement" class="urbipb-announcement">
			<?php echo urbipb_announce_close(); ?>
			<?php echo urbipb_announce_content(); ?>
		</div>
	</div><!-- #urbipb-announcement-container -->
		
<?php

} // urbipb_announce_overlay


function urbipb_announce_close() {
	$urbipb_announce_close = '<a id="urbipb-announce-btn"><span class="dashicons dashicons-no"></span></a>';

	return apply_filters( 'urbipb_announce_close_button', $urbipb_announce_close );

}


function urbipb_announce_content() {
	$urbipb_icon = urbipb_get_announcement_icon();
	$urbipb_html = wp_kses_post( get_option('urbipb_disclaimer_html') );

	$urbipb_announce_content = '';

	$urbipb_announce_content.= '<div id="urbipb-announcement-content" class="urbipb-announcement-content">';

	if ($urbipb_icon !== 'dashicons-' ) {
		$urbipb_announce_content.= sprintf( '<span class="mega-icon dashicons %s"></span>', esc_attr( $urbipb_icon ) );
	}

	$urbipb_announce_content.= $urbipb_html;

	$urbipb_announce_content.= '</div><!-- #urbipb-announcement-content -->';

	return apply_filters( 'urbipb_announce_content_html', $urbipb_announce_content, $urbipb_icon, $urbipb_html );

}


function urbipb_get_announcement_icon() {
	$urbipb_icon = ( !empty( get_option('urbipb_disclaimer_icon') ) ? get_option('urbipb_disclaimer_icon') : '' );

	if ( $urbipb_icon && (strpos( $urbipb_icon, '|' ) !== false)) {
		$urbipb_icon_array = explode( '|', $urbipb_icon );
		$urbipb_icon = $urbipb_icon_array[1];
	}

	return $urbipb_icon;

}
