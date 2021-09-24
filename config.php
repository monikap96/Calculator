<?php
    $myConfig->server_name='localhost:80';
    $myConfig->server_url='http://'.$myConfig->server_name;
    $myConfig->app_root='/projects/Calculator';
    $myConfig->app_url=$myConfig->server_url.$myConfig->app_root;
    $myConfig->root_path=dirname(__FILE__);
    
    $myConfig->action_root=$myConfig->app_root.'/controller.php?action=';
    $myConfig->action_url=$myConfig->server_url.$myConfig->action_root;

    $myConfig->db_type = 'mysql';
    $myConfig->db_server = 'localhost';
    $myConfig->db_name = 'calculator';
    $myConfig->db_user = 'root';
    $myConfig->db_pass = '';
    $myConfig->db_charset = 'utf8';

    # konfiguracja bazy danych (opcjonalna)
    $myConfig->db_port = '3307';
    #$conf->db_prefix = '';
    $myConfig->db_option = [ PDO::ATTR_CASE => PDO::CASE_NATURAL, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];

?>
