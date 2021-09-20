<?php
require_once 'init.php';

getConfig()->login_action='login';

switch ($action){
    default :{
        control('app\\controllers','CreditCalcCtrl', 'generateView', ['user','admin']);
    }
    case 'login':{
        control('app\\controllers','LoginCtrl', 'doLogin');
    }case 'creditCalc':{
        control(null, 'CreditCalcCtrl', 'process', ['user','admin']);
    }
    case 'logout':{
        control(null,'LoginCtrl', 'doLogout', ['user', 'admin']);
    }
}
?>