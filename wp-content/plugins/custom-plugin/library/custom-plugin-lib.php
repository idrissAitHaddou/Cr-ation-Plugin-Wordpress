<?php

$getParam=isset($_REQUEST['param']) ? $_REQUEST['param'] : '';
global $wpdb;
if(!empty($getParam)){
      if($getParam=="savedata"){
       $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
       $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
       $wpdb->insert($wpdb->prefix.'custom_plugin' , array(
           'name' => $name,
           'email' => $email,
       ));
       echo json_encode(array('status'=>'inserted'));
      }

      if($getParam=="saveparams"){
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $wpdb->update( 'wp_custom_plugin_params', array( 'name' => "$name", 'email' => "$email" ), array( 'id' => 1 ) );
        echo json_encode(array('status'=>'name : '.$name.'---- email : '.$email));
      }

}
