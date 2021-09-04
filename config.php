<?php
    require_once 'Config.class.php';
    
    $myConfig = new Config();
    $myConfig->server_name='localhost:80';
    $myConfig->server_url='http://'.$myConfig->server_name;
    $myConfig->app_root='/projects/Calculator';
    $myConfig->app_url=$myConfig->server_url.$myConfig->app_root;
    $myConfig->root_path=dirname(__FILE__);
?>
