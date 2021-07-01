<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH."/app/security/checkRole.php";

$values = array();
$CalcMessages = array();
$monthlyRate=null;
$allRates=null;
$results=array();

function getCalcParams(&$values){
    $values['amount'] = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
    $values['year'] = isset($_REQUEST['year']) ? $_REQUEST['year'] : null;
    $values['percent']= isset($_REQUEST['percent']) ? $_REQUEST['percent'] : null;
}
function validateValues($values, &$CalcMessages){
    if(!(isset($values['amount'])&& isset($values['year']) && isset($values['percent']))){
        return false;
    }
    if ( $values['amount']== "") {
            $CalcMessages [] = 'Nie podano liczby 1';
    }
    if ( $values['year'] == "") {
            $CalcMessages [] = 'Nie podano liczby 2';
    }
    if ( $values['percent'] == "") {
            $CalcMessages [] = 'Nie podano liczby 3';
    }
    if (count ( $CalcMessages ) != 0){
        return false;
    }

    if (empty($CalcMessages)) {
            if (! is_numeric( $values['amount'] )) {
                    $CalcMessages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
            }
            if (! is_numeric( $values['year'] )) {
                    $CalcMessages [] = 'Druga wartość nie jest liczbą całkowitą';
            }	
            if (! is_numeric( $values['percent'] )) {
                    $CalcMessages [] = 'Trzecia wartość nie jest liczbą całkowitą';
            }
    }
    return (count($CalcMessages)!=0) ? false : true;
}
function countCreditValues(&$values, &$CalcMessages, &$monthlyRate, &$allRates){
    if (empty ( $CalcMessages )) {
        $amount = floatval($values['amount']);
        $year = floatval($values['year']);
        $monthlyRate = $values['amount']/($values['year']*12) * (100+ $values['percent'])/100 ;
        $allRates = $values['amount']*(100+$values['percent'])/100;
    }
}
getCalcParams($values);

if(validateValues($values, $CalcMessages)){
    countCreditValues($values, $CalcMessages, $monthlyRate, $allRates);
    
}

include 'credit_calc_view.php';

?>