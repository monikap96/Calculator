<?php
require_once $myConfig->root_path.'/lib/smarty/Smarty.class.php';
require_once $myConfig->root_path.'/lib/Messages.class.php';
require_once $myConfig->root_path.'/app/creditCalc/CreditCalcForm.class.php';
require_once $myConfig->root_path.'/app/creditCalc/CreditCalcResult.class.php';


class CreditCalcCtrl{
    
    private $values;
    private $messages;
    private $result;
    
    public function __construct() {
        $this->values = new CreditCalcForm();
        $this->messages = new Messages();
        $this->result = new CreditCalcResult();
    }
    
    public function getCalcParams(){
        $this->values->amount = isset($_REQUEST ['amount']) ? $_REQUEST ['amount'] : null;
        $this->values->year = isset($_REQUEST ['year']) ? $_REQUEST ['year'] : null;
        $this->values->percent = isset($_REQUEST ['percent']) ? $_REQUEST ['percent'] : null;
    }   
    public function validateValues(){
        if(!(isset($this->values->amount)&& isset($this->values->year) && isset($this->values->percent))){
            return false;
        }
        if ($this->values->amount== "") {
            $this->messages->addError('Nie podano kwoty jaką chcesz otrzymać');
        }
        if ($this->values->year == "") {
            $this->messages->addError('Nie podano liczby lat');
        }
        if ($this->values->percent == "") {
            $this->messages->addError('Nie podano oprocentowania');
        }
        if ($this->messages->isError()){
            return false;
        }

        if ($this->messages->isEmpty()) {
                if (! is_numeric($this->values->amount)) {
                   $this->messages->addError('Pierwsza wartość nie jest liczbą rzeczywistą');
                }
                if (! is_numeric($this->values->year)) {
                   $this->messages->addError('Druga wartość nie jest liczbą rzeczywistą');
                }	
                if (! is_numeric($this->values->percent)) {
                   $this->messages->addError('Trzecia wartość nie jest liczbą rzeczywistą');
                }
        }
        return ($this->messages->isError()) ? false : true;
    }
    
    public function countCreditValues(){
        if (!$this->messages->isError()>0) {
            $this->values->amount= floatval($this->values->amount);
            $this->values->year= floatval($this->values->year);
            
            $this->result->monthlyRate = $this->values->amount/($this->values->year*12)*(100+ $this->values->percent)/100;
//            $monthlyRate = $values['amount']/($values['year']*12) * (100+ $values['percent'])/100 ;
            $this->result->allRates = $this->values->amount*(100+$this->values->percent)/100;
//            $allRates = $values['amount']*(100+$values['percent'])/100;
        }
    }
    public function process() {
        $this->getCalcParams();

        if($this->validateValues()){
            $this->countCreditValues();
        }

        $this->generateView();
    }

    
    public function generateView(){
        global $myConfig;
        $smarty = new Smarty();
        $smarty->assign('myConfig', $myConfig);
        $smarty->assign('app_url',$myConfig->app_url);
        $smarty->assign('app_root',$myConfig->app_root);
        $smarty->assign('root_path',$myConfig->root_path);

        $smarty->assign('pageTitle','Credit calculator');
        $smarty->assign('values',$this->values);
        $smarty->assign('messages',$this->messages);
        $smarty->assign('result',$this->result);

        if(isset($this->result->monthlyRate)){
            $smarty->assign('monthlyRate', $this->result->monthlyRate);
        }

        if(isset($this->result->allRates)){
            $smarty->assign('allRates', $this->result->allRates);
        }

        $smarty->display($myConfig->root_path.'/app/creditCalc/CreditCalcView.html');

    }
}
?>