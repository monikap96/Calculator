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

function addROle($role){
    getConfig()->roles[$role]=true;
    $_SESSION['_roles']= serialize(getConfig()->roles);
}

function forwardTo($action_name){
    global $action;
    $action = $action_name;
    include getConfig()->root_path."/controller.php";
    exit;
}
function redirectTo($action_name){
    header("Locaation:".getConfig()->action_url.$action_name);
    exit;
}

function control($namespace, $controllerName, $method, $roles=null){
    if($roles!=null){
        $foundRole = false;
        if(is_array($roles)){
            foreach ($roles as $role) {
                if(inRole($role)){
                    $foundRole = true;
                    break;
                }
            }
        }else if(inRole($role)){
            $foundRole = true;
        }
        if(!$foundRole){
            forwardTo(getConfig()->login_action);
        }
    }
    if(empty($namespace)){
        $controllerName="app\\controllers\\".$controllerName;
    }else{
        $controllerName=$namespace."\\".$controllerName;
    }
    
    include_once getConfig()->root_path.DIRECTORY_SEPARATOR.$controllerName.'.class.php';
    
    $controller = new $controllerName;
    
    if(is_callable(array($controller, $method))){
        $controller->$method();
    }
    exit();
}