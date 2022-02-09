<?php
/**
* Fired when the plugin is uninstalled.
*
* @package Absolute Swiper
*/

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {	exit;}
global $wpdb;

$swiper_slide = get_posts( array( 'post_type' => 'absolute_swiper', 'numberposts' => -1 ) );
foreach( $swiper_slide as $slides ) {
	wp_delete_post( $slides->ID, true );
}

foreach ( wp_load_alloptions() as $option => $value ) {
    if ( strpos( $option, '_absolute_swiper_' ) === 0 ) {
        delete_option( $option );
    }
}