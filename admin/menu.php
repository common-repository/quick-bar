<?php
if ( ! defined( 'ABSPATH' ) ) exit;
	add_action('admin_menu', 'qbr_menu');

function qbr_menu()
{
    add_menu_page('Quick Bar Settings', 'XYZ Quick Bar', 'manage_options', 'quickbar-settings', 'qbr_settings',plugin_dir_url(XYZ_QBR_PLUGIN_FILE).'images/quickbar-popup.png');
	// Add a submenu to the Dashboard:
	$page=add_submenu_page('quickbar-settings', 'Quick Bar Settings', 'Quick Bar', 'manage_options', 'quickbar-settings' ,'qbr_settings'); // 8 for admin
	add_submenu_page('quickbar-settings', 'Quick Bar - Basic Settings', 'Basic Settings', 'manage_options', 'quickbar-basic-settings' ,'qbr_basic_settings'); // 8 for admin
	add_submenu_page('quickbar-settings', 'Quick Bar - About', 'About', 'manage_options', 'quickbar-about' ,'qbr_about'); // 8 for admin
	add_action( "admin_print_scripts-$page", 'qbr_farbtastic_script' );
	add_action( "admin_print_styles-$page", 'qbr_farbtastic_style' );
}
function qbr_basic_settings()
{
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/settings.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}
function qbr_settings()
{
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/quickbar-settings.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}
function qbr_about()
{
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/about.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}
function qbr_farbtastic_script() 
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('farbtastic');
}
function qbr_farbtastic_style() 
{
	wp_enqueue_style('farbtastic');
}
function xyz_qbr_admin_style()
{
	//require( dirname( __FILE__ ) . '/style.php' );
	wp_enqueue_script('jquery');
	wp_register_style('xyz_qbr_style', plugins_url('quick-bar/css/style.css'));
	wp_enqueue_style('xyz_qbr_style');
	wp_register_script( 'xyz_notice_script_qbr', plugins_url('quick-bar/js/notice.js') );
	wp_enqueue_script( 'xyz_notice_script_qbr' );
}
add_action('admin_enqueue_scripts', 'xyz_qbr_admin_style');
?>