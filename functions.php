<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_separate', trailingslashit( get_stylesheet_directory_uri() ) . 'ctc-style.css', array( 'chld_thm_cfg_parent','twentytwenty-style','twentytwenty-print-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

/* HOOK FILTERS */
/*
function is_user_logged_in() {
	$user = wp_get_current_user();

	return $user->exists();
}
*/

$Menu = [
    [
        'Nous' => 'Nous rencontrer',
        'Admin' => 'Admin',
        'Commander' => 'Commander'
        
    ],
];

$Menu1 = array('Nous rencontrer', 'Admin', 'Commander');

add_filter( 'wp_nav_menu_items', 'custom_menu_item', 10, 2 );
function custom_menu_item ( $items, $args ) {

$menu2 = explode('</li>', $items);

    if ( is_user_logged_in() && $args->theme_location == 'primary' ) {
        /* $items .= '<li class="menu-item"><a href="/wp-login.php">Admin</a></li>'; */
        array_splice($menu2, 1, 0, '<li class="menu-item"><a href="/wp-login.php">Admin</a></li>');
    }
    return implode ('</li>', $menu2);

}