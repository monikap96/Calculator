<?php
    require_once dirname(__FILE__).'/core/Config.class.php';
    $myConfig = new Config();
    include dirname(__FILE__).'/config.php';
    
    function &getConfig(){
        global $myConfig;
        return $myConfig;
    }

    require_once getConfig()->root_path.'/core/Messages.class.php';
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
    
    require_once getConfig()->root_path.'/core/functions.php';
    
    $action = getParamFromRequest('action');