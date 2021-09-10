<?php
namespace core;

class Messages{
    private $errors = array();
    private $number = 0;
    
    public function addError($message){
        $this->errors[] = $message;
        $this->number++;
    }
    
    public function isEmpty() {
        return $this->number==0;
    }
    
    public function isError() {
        return count($this->errors)>0;
    }
    
    public function getErrors() {
        return $this->errors;
    }
}