<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator Kredytowy</title>
</head>
<body style="margin: auto;
    width: 700px;
    padding: 50px;
    vertical-align: middle";>


<form action="<?php print(_APP_URL);?>/app/credit_calc.php" method="get">
	<label for="id_amount">Kwota jaką chcesz otrzymać: </label>
	<input id="id_amount" type="text" name="amount" value="<?php if(isset($amount)) print($amount); ?>" /><br /><br/>
	<label for="id_year">Na ile lat?: </label>
	<input id="id_year" type="text" name="year" value="<?php if(isset($year)) print($year); ?>" /><br /><br/>
	<label for="id_percent">Oprocentowanie: </label>
	<input id="id_percent" type="text" name="percent" value="<?php if(isset($percent)) print($percent); ?>" />
	<label> %</label><br /><br/>
	<input type="submit" value="Oblicz" />
</form>	

<?php
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($monthlyRate)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:500px;">
<?php echo 'Miesięczna rata do zapłaty: '.round($monthlyRate,2).'zł'; ?>
	 <?php } ?>
	 <br>
<?php 
if (isset($allRates)){ 
echo 'Całkowita kwota do zapłaty w ciągu całego okresu kredytowego: '.round($allRates,2).'zł'; ?>	
</div>
<?php } ?>
</body>
</html>