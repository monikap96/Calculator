<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator Kredytowy</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" />
</head>
<body style="margin: auto;
    width: 500px;
    padding: 50px;
    vertical-align: middle";>

    <a href="<?php print(_APP_ROOT);?>/app/security/logout.php"  class="pure-button">Logout</a>
    <br/><br/><br/>
    <label>Kalkulator</label>
    <hr/>
    <form action="<?php print(_APP_URL);?>/app/credit_calc.php" method="post">
            <label for="id_amount">Kwota jaką chcesz otrzymać: </label>
            <input id="id_amount" type="text" name="amount" value="<?php echo out($values['amount']); ?>" /><br /><br/>
            <label for="id_year">Na ile lat?: </label>
            <input id="id_year" type="text" name="year" value="<?php echo out($values['year']); ?>" /><br /><br/>
            <label for="id_percent">Oprocentowanie: </label>
            <input id="id_percent" type="text" name="percent" value="<?php echo out($values['percent']); ?>"/>
            <label> %</label><br /><br/>
            <input type="submit" value="Oblicz" class="pure-button-primary pure-button"/>
    </form>	

<?php
    if (isset($CalcMessages)) {
        if (count ( $CalcMessages ) > 0) {
            echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
            foreach ( $CalcMessages as $key => $CalcMessage ) {
                echo '<li>'.$CalcMessage.'</li>';
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