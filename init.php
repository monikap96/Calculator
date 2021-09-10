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
//            $smarty->assign('app_url',$myConfig->app_url);
//            $smarty->assign('app_root',$myConfig->app_root);
//            $smarty->assign('root_path',$myConfig->root_path);
//
//            $smarty->assign('pageTitle','Credit calculator');
//            $smarty->assign('values',$this->values);
            $smarty->assign('messages', getMessages());
//            $smarty->getTemplateDir(array(
//                'one' => getConfig()->root_path.'/app/views',
//                'two' => getConfig()->root_path.'/app/views/templates'
//            ));
            $smarty->setTemplateDir(array(
                    'one' => getConfig()->root_path.'/app/views',
                    'two' => getConfig()->root_path.'/app/views/templates'
            ));
//            $smarty->assign('result',$this->result);
//
//            if(isset($this->result->monthlyRate)){
//                $smarty->assign('monthlyRate', $this->result->monthlyRate);
//            }
//
//            if(isset($this->result->allRates)){
//                $smarty->assign('allRates', $this->result->allRates);
//            }
//
//            $smarty->display($myConfig->root_path.'/app/creditCalc/CreditCalcView.html');

            
        }
        return $smarty;
    }
    
    require_once getConfig()->root_path.'/core/functions.php';
    
    $action = getParamFromRequest('action');