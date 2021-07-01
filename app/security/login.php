<?php
//require_once _ROOT_PATH."/config.php";
require_once dirname(__FILE__).'/../../config.php';
$form = array();
$messages = array();

function getParams(&$form){
    $form['login'] = isset($_REQUEST['login'])? $_REQUEST['login'] : null;
    $form['password'] = isset($_REQUEST['password'])? $_REQUEST['password'] : null;
    
}

function verify($form, &$messages){
    if(!(isset($form['login']) && isset($form['password']))){
        return false;
    }
    if($form['login']==""){
        $messages[] = "Nie podano loginu";
    }
    if($form['password']==""){
        $messages[] = "Nie podano hasła";
    }
    if (count ( $messages ) > 0) {
        return false;
    }
    if((($form['login']=="admin") || ($form['login']=="admin@wp.pl")) && ($form['password']=="admin")){
        session_start();
        $_SESSION['role']="admin";
        return true;
    }
    $messages[]="Niepoprawny login lub hasło";
    return false;
}

getParams($form);
if(!verify($form, $messages)){
    include _ROOT_PATH."/app/security/login_view.php";
}else{
    header("Location: "._APP_URL);
}