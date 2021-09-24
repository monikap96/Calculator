<?php

    require_once 'core/Config.class.php';
    use core\Config;
    $myConfig = new Config();
    require_once 'config.php';
    
    function &getConfig(){
        global $myConfig;
        return $myConfig;
    }

    require_once 'core/Messages.class.php';
    use core\Messages;
    $messages = new Messages();
    
    function &getMessages(){
        global $messages;
        return $messages;
    }
    
    $smarty = null;
    
    function &getSmarty(){
        global $smarty;
        if(!isset($smarty)){
            include_once 'lib/smarty/Smarty.class.php';
            $smarty = new Smarty();
            $smarty->assign('myConfig', getConfig());
            $smarty->assign('messages', getMessages());
            $smarty->setTemplateDir(array(
                    'one' => getConfig()->root_path.'/app/views',
                    'two' => getConfig()->root_path.'/app/views/templates'
            ));            
        }
        return $smarty;
    }
    require_once 'core/ClassLoader.class.php';
    $classLoader = new core\ClassLoader();
    
    function &getClassLoader(){
        global $classLoader;
        return $classLoader;
    }

    require_once 'core/Router.class.php'; 
    $router = new core\Router();
    function &getRouter(): core\Router {
        global $router;
        return $router;
    }
    
    $database = null; //przygotuj Medoo, twórz tylko raz - wtedy kiedy potrzeba
    function &getDatabase() {
        global $myConfig, $database;
        if (!isset($database)) {
            require_once 'lib/medoo/Medoo.php';
            $database = new \Medoo\Medoo([
                'database_type' => &$myConfig->db_type,
                'server' => &$myConfig->db_server,
                'database_name' => &$myConfig->db_name,
                'username' => &$myConfig->db_user,
                'password' => &$myConfig->db_pass,
                'charset' => &$myConfig->db_charset,
                'port' => &$myConfig->db_port,
                'prefix' => &$myConfig->db_prefix,
                'option' => &$myConfig->db_option
            ]);
        }
        return $database;
    }

    require_once 'core/functions.php';
    
    session_start();
    $myConfig->roles = isset($_SESSION['_roles']) ? unserialize($_SESSION['_roles']) : array();
    
    $router->setAction(getParamFromRequest('action'));