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

    wp_localize_script("cpl_script","ajaxurl",admin_url('admin-ajax.php'));
}

add_action('init' , 'custom_plugin_assets');

// action=custom_plugin_library
// It attaches the library file with client request

    if(isset($_REQUEST['action'])){  // it checks the action param is set or not
        switch($_REQUEST['action']){  // if set pass to switch method to match case
            case "custom_plugin_library" : 

            add_action("admin_init","add_custom_plugin_library");  // match case
            function add_custom_plugin_library(){  // function attached with the action hook
            global $wpdb;
            include_once PLUGIN_DIR_PATH."/library/custom-plugin-lib.php";  // ajax handler file within /library folder
            }

            break;

        }
    }


function myjscode(){
    ?>

     <script type='type/javascript'>
        // custom script code here
        var online = {"admin_url" : "<?php echo admin_url('admin-ajax.php'); ?>"}
     </script>

    <?php
}

add_action('wp-head' , 'myjscode');

// custom ajax_req  from js file
add_action("wp_ajax_custom_ajax_req","custom_ajax_req_fn");
function custom_ajax_req_fn(){
    echo json_encode($_REQUEST);  // here we simply returned posted form data as response in encoded form
    wp_die();
}

add_action( 'wp_ajax_custom_plugin', 'prefix_ajax_custom_plugin' );
function prefix_ajax_custom_plugin() {
    print_r($_REQUEST);
    wp_die();
}

// tabel generating code
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

 if (count($wpdb->get_var('SHOW TABLES LIKE "wp_custom_plugin_params"')) == 0){

    $sql_query_to_create_table = "CREATE TABLE `wp_custom_plugin_params` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(150) DEFAULT NULL,
        `email` varchar(150) DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
       ) ENGINE=MyISAM DEFAULT CHARSET=latin1"; /// sql query to create table
   
    dbDelta($sql_query_to_create_table);

    $wpdb->insert('wp_custom_plugin_params' , array(
        'name' => 1,
        'email' => 1,
    ));
   
    }

}

// and Finally we have to attach with Action hook, 
register_activation_hook(__FILE__,'custom_plugin_tables');



function deactivate_table(){
    // uninstall mysql code
    global $wpdb;
    $wpdb->query("DROP table IF Exists wp_custom_plugin");
    $wpdb->query("DROP table IF Exists wp_custom_plugin_params");
    
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



 function create_page(){
    // code for create page
    $page = array();
    $page['post_title']= "Custom Plugin";
    $page['post_content']= "Learning Platform for Wordpress Customization for Themes, Plugin and Widgets";
    $page['post_status'] = "publish";
    $page['post_slug'] = "custom-plugin";
    $page['post_type'] = "page";
    
    $post_id = wp_insert_post($page); // post_id as return value
    
    add_option("custom_plugin_page_id",$post_id);  // wp_options table from the name of custom_plugin_page_id
 }
 
//  and Finally we have to attach with Action hook,
 register_activation_hook(__FILE__,"create_page");

 add_shortcode("custom-plugin","customPluginFunction");

 function customPluginFunction(){
    global $wpdb;
    $results = $wpdb->get_results( 
                $wpdb->prepare("SELECT * FROM wp_custom_plugin_params") 
             );
    $validateName = $results[0]->name;
    $validateEmail = $results[0]->email;
    
    include_once PLUGIN_DIR_PATH."/views/shortcode-template.php";

    if($validateName==0){
        echo " 
        <div class='container'>
        <form action='#' id='frmPost' method='POST'>
                 <div hidden class='form-group'> 
                <label for='name'>Name :</label>
                <input type='text' id='textName' required class='form-control' placeholder='Enter name' name='textName'>
                </div>
                <div class='form-group'>
                <label for='email'>Email :</label>
                <input type='email' class='form-control' required id='textEmail' placeholder='Enter email' name='textEmail'>
                </div>
                <button type='submit' class='btn btn-default'>Submit</button>
        </form>
    </div>
        ";
    }elseif($validateEmail==0){
        echo " 
        <div class='container'>
        <form action='#' id='frmPost' method='POST'>
                 <div class='form-group'> 
                <label for='name'>Name :</label>
                <input type='text' id='textName' required class='form-control' placeholder='Enter name' name='textName'>
                </div>
                <div hidden class='form-group'>
                <label for='email'>Email :</label>
                <input type='email' class='form-control' required id='textEmail' placeholder='Enter email' name='textEmail'>
                </div>
                <button type='submit' class='btn btn-default'>Submit</button>
        </form>
    </div>
        ";
    }elseif($validateEmail==0 && $validateName==0){
        echo " 
        <div class='container'>
        <form action='#' id='frmPost' method='POST'>
                 <div hidden class='form-group'> 
                <label for='name'>Name :</label>
                <input type='text' id='textName' required class='form-control' placeholder='Enter name' name='textName'>
                </div>
                <div hidden class='form-group'>
                <label for='email'>Email :</label>
                <input type='email' class='form-control' required id='textEmail' placeholder='Enter email' name='textEmail'>
                </div>
                <button type='submit' class='btn btn-default'>Submit</button>
        </form>
    </div>
        ";
    }else{
        echo " 
        <div class='container'>
        <form action='#' id='frmPost' method='POST'>
                 <div class='form-group'> 
                <label for='name'>Name :</label>
                <input type='text' id='textName' required class='form-control' placeholder='Enter name' name='textName'>
                </div>
                <div class='form-group'>
                <label for='email'>Email :</label>
                <input type='email' class='form-control' required id='textEmail' placeholder='Enter email' name='textEmail'>
                </div>
                <button type='submit' class='btn btn-default'>Submit</button>
        </form>
    </div>
        ";
    }

 }


 add_shortcode("tag_based","custom_plugin_tag_based");

 function custom_plugin_tag_based($params ,$content ,$tag){

 }

 add_shortcode("called_me_down","custom_plugin_tag_based");