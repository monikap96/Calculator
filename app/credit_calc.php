<?php
require_once dirname(__FILE__).'/../config.php';

$amount = $_REQUEST ['amount'];
$year = $_REQUEST ['year'];
$percent= $_REQUEST ['percent'];

if ( ! (isset($amount) && isset($year) && isset($percent))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ( $amount == "") {
	$messages [] = 'Nie podano liczby 1';
}
if ( $year == "") {
	$messages [] = 'Nie podano liczby 2';
}
if ( $percent == "") {
	$messages [] = 'Nie podano liczby 3';
}

if (empty( $messages )) {
	if (! is_numeric( $amount )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	if (! is_numeric( $year )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	
	if (! is_numeric( $percent )) {
		$messages [] = 'Trzecia wartość nie jest liczbą całkowitą';
	}
}

if (empty ( $messages )) {
	$amount = floatval($amount);
	$year = floatval($year);
	$monthlyRate = $amount/($year*12) * (100+ $percent)/100 ;
	$allRates = $amount*(100+$percent)/100;
}

include 'credit_calc_view.php';

?>