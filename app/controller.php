<?php
require_once dirname(__FILE__).'/../config.php';
require_once $myConfig->root_path.'/app/CreditCalcCtrl.class.php';

$myCtrl = new CreditCalcCtrl();
$myCtrl->process();
?>