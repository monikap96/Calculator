<?php
require_once 'init.php';

getRouter()->setDefaultRoute('calcShow');
getRouter()->setLoginRoute('login'); 
getRouter()->addRoute('calcShow', 'CreditCalcCtrl',  ['user','admin']);
getRouter()->addRoute('calcCompute', 'CreditCalcCtrl',  ['user','admin']);
getRouter()->addRoute('login', 'LoginCtrl');
getRouter()->addRoute('logout', 'LoginCtrl', ['user','admin']);
getRouter()->addRoute('addResultToDB', 'CreditCalcCtrl', ['user','admin']);
getRouter()->go();
?>