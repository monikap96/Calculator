<?php
require_once dirname(__FILE__).'/../config.php';

$action= isset($_REQUEST['action'])?$_REQUEST['action']:'';

switch ($action){
    
    case 'creditCalc':{
        require_once $myConfig->root_path.'/app/creditCalc/CreditCalcCtrl.class.php';
        $myCtrl = new CreditCalcCtrl();
        $myCtrl->process();
        break;
    }
    default :{
        require_once $myConfig->root_path.'/app/creditCalc/CreditCalcCtrl.class.php';
        $myCtrl = new CreditCalcCtrl();
        $myCtrl->process();
        break;
    }
}


?>