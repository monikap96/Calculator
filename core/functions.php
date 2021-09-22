<?php

function getParamFrom(&$source, &$param, &$isRequire, &$requiredMessage){
    if(isset($source[$param])){
        return $source[$param];
    }else{
        if($isRequire){
            getMessages()->addError($requiredMessage);
            return null;
        }
    }
}

function getParamFromRequest($param, $isRequire=false, $requiredMessage=null){
    return getParamFrom($_REQUEST, $param, $isRequire, $requiredMessage);
}
function getParamFromSession($param, $isRequire=false, $requiredMessage=null){
    return getParamFrom($_SESSION, $param, $isRequire, $requiredMessage);
}

function inRole($role){
    return isset(getConfig()->roles[$role]);
}

function addRole($role){
    getConfig()->roles[$role]=true;
    $_SESSION['_roles']= serialize(getConfig()->roles);
}

function forwardTo($action_name){
    getRouter()->setAction($action_name);
    include getConfig()->root_path."/controller.php";
    exit;
}
function redirectTo($action_name){
    header("Locaation:".getConfig()->action_url.$action_name);
    exit;
}
