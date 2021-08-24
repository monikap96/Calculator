<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('app_url',_APP_URL);
//$smarty->assign('app_root',_APP_ROOT);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('pageTitle','Home');
$smarty->display(_ROOT_PATH.'/app/home.html');

?>