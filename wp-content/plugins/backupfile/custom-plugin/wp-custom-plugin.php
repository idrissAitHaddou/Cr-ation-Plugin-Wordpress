<?php

/**
 * Plugin Name:       Custom plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       exemple form.
 * Version:           1.10.3
 * Author:            idriss ait haddou
 */

// constants

define('PLUGIN_DIR_PATH' , plugin_dir_path(__FILE__));
define('PLUGIN_URL' , plugins_url());
define('PLUGIN_VERSION','1.0');

function add_my_custom_menu(){
    add_menu_page(
        'customplugin',            // page title
        'custom plugin',           // menu title
        'manage_options',          // admin level
        'custom-plugin',           // page slug
        'add_new_function',       // collback function
        'dashicons-admin-plugins', // icon url
        6                          // position
    );

    add_submenu_page(
        'custom-plugin',   // parent slug
        'Add New',         // page title
        'Add New',         // menu title
        'manage_options',  // capability = user_level access
        'custom-plugin',         // menu slug
        'add_new_function',// collback function
    );

    add_submenu_page(
        'custom-plugin',   // parent slug
        'All Pages',         // page title
        'All Pages',         // menu title
        'manage_options',  // capability = user_level access
        'all-pages',         // menu slug
        'all_page_function',// collback function
    );
}

add_action('admin_menu','add_my_custom_menu');


function add_new_function(){
    // add new function
    include_once PLUGIN_DIR_PATH."/views/add-new.php";
}

function all_page_function(){
    // all page function
    include_once PLUGIN_DIR_PATH."/views/all-page.php";
}

function custom_plugin_assets(){
    // css and js files
    wp_enqueue_style(
        'cpl_style', // unique name for cas file
        PLUGIN_URL.'/custom-plugin/assets/css/style.css', // css file path
        '',  // dependency on other files
        PLUGIN_VERSION,  // plugin version number 
    );

    wp_enqueue_script(
        'cpl_script', // unique name for js file
        PLUGIN_URL.'/custom-plugin/assets/js/script.js', // css file path
        '',  // dependency on other files
        PLUGIN_VERSION,  // plugin version number 
        false
    );
}

add_action('init' , 'custom_plugin_assets');


function custom_plugin_tables(){
    global $wpdb;
 require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

 if (count($wpdb->get_var('SHOW TABLES LIKE "wp_custom_plugin"')) == 0){

 $sql_query_to_create_table = "CREATE TABLE `wp_custom_plugin` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `name` varchar(150) DEFAULT NULL,
     `email` varchar(150) DEFAULT NULL,
     `phone` varchar(150) DEFAULT NULL,
     `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1"; /// sql query to create table

 dbDelta($sql_query_to_create_table);

 }
}

// and Finally we have to attach with Action hook, 
register_activation_hook(__FILE__,'custom_plugin_tables');


function deactivate_table(){
    // uninstall mysql code
    global $wpdb;
    $wpdb-query("DROP table IF Exists wp_custom_plugin");
    
    // step1: we get the id of post means page
    // delete the post from table
    
    $the_post_id = get_option("custom_plugin_page_id");
    if(!empty($the_post_id)){
       wp_delete_post($the_post_id,true);
    }
  
 }
 
//  and Finally we have to attach with Action hook,
//  If we want to delete table while deactivates then we should use 
 register_deactivation_hook(__FILE__,"deactivate_table");
 
//  If we want to delete then we have to change action hook,
 register_uninstall_hook(__FILE__,"deactivate_table");
