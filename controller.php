<?php
require_once 'init.php';
switch ($action){
    
    case 'creditCalc':{
//        include_once 'app/controllers/creditCalc/CreditCalcCtrl.class.php';
        $myCtrl = new app\controllers\CreditCalcCtrl();
        $myCtrl->process();
        break;
    }
    default :{
//        include_once 'app/controllers/creditCalc/CreditCalcCtrl.class.php';
        $myCtrl = new app\controllers\CreditCalcCtrl(); 
        $myCtrl->process();
        break;
    }
}


?>