<?php
require_once 'CreditCalcForm.class.php';
require_once 'CreditCalcResult.class.php';


class CreditCalcCtrl{
    
    private $values;
    private $result;
    
    public function __construct() {
        $this->values = new CreditCalcForm();
        $this->result = new CreditCalcResult();
    }
    
    public function getCalcParams(){
        $this->values->amount = getParamFromRequest('amount');
        $this->values->year = getParamFromRequest('year');
        $this->values->percent = getParamFromRequest('percent');
    }   
    public function validateValues(){
        if(!(isset($this->values->amount)&& isset($this->values->year) && isset($this->values->percent))){
            return false;
        }
        if ($this->values->amount== "") {
            getMessages()->addError('Nie podano kwoty jaką chcesz otrzymać');
        }
        if ($this->values->year == "") {
            getMessages()->addError('Nie podano liczby lat');
        }
        if ($this->values->percent == "") {
            getMessages()->addError('Nie podano oprocentowania');
        }
        if (getMessages()->isError()){
            return false;
        }

        if (getMessages()->isEmpty()) {
                if (! is_numeric($this->values->amount)) {
                    getMessages()->addError('Pierwsza wartość nie jest liczbą rzeczywistą');
                }
                if (! is_numeric($this->values->year)) {
                    getMessages()->addError('Druga wartość nie jest liczbą rzeczywistą');
                }	
                if (! is_numeric($this->values->percent)) {
                    getMessages()->addError('Trzecia wartość nie jest liczbą rzeczywistą');
                }
        }
        return (getMessages()->isError()) ? false : true;
    }
    
    public function countCreditValues(){
        if (!getMessages()->isError()>0) {
            $this->values->amount= floatval($this->values->amount);
            $this->values->year= floatval($this->values->year);
            
            $this->result->monthlyRate = $this->values->amount/($this->values->year*12)*(100+ $this->values->percent)/100;
            $this->result->allRates = $this->values->amount*(100+$this->values->percent)/100;
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
        getSmarty()->assign('pageTitle','Credit calculator');
        getSmarty()->assign('values',$this->values);
        getSmarty()->assign('result',$this->result);

        if(isset($this->result->monthlyRate)){
            getSmarty()->assign('monthlyRate', $this->result->monthlyRate);
        }

        if(isset($this->result->allRates)){
            getSmarty()->assign('allRates', $this->result->allRates);
        }

        getSmarty()->display('CreditCalcView.html');
    }
}
?>