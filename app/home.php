<?php
require_once dirname(__FILE__).'/../config.php';
require_once $myConfig->root_path.'/lib/smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('app_url',$myConfig->app_url);
$smarty->assign('root_path',$myConfig->root_path);
$smarty->assign('pageTitle','Home');
$smarty->display($myConfig->root_path.'/app/home.html');

?>