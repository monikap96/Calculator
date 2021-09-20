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
            include_once getConfig()->root_path.'/lib/smarty/Smarty.class.php';
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




    require_once 'core/functions.php';
    
    session_start();
    $myConfig->roles = isset($_SESSION['_roles']) ? unserialize($_SESSION['_roles']) : array();
    
    $action = getParamFromRequest('action');