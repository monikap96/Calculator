<?php

namespace app\controllers;
use app\forms\LoginForm;
use app\transfers\User;

class LoginCtrl{
    private $form;
    
    public function __construct() {
        $this->form = new LoginForm();
    }

    public function getParams(){
        $this->form->login = getParamFromRequest('login');
        $this->form->password = getParamFromRequest('pass');
    }

    public function verify(){
        if(!(isset($this->form->login) && isset($this->form->password))){
            return false;
        }
        
        if(!getMessages()->isError()){
            if($this->form->login==""){
                getMessages()->addError("Nie podano loginu");
            }
            if($this->form->password == ""){
                getMessages()->addError("Nie podano hasła");
            }
        }

        if(!getMessages()->isError()){
            if($this->form->login=="admin" && $this->form->password=="admin"){
                $user = new User($this->form->login, 'admin');
                $_SESSION['user']= serialize($user);
                addRole($user->role);
            }else if($this->form->login=="user" && $this->form->password=="user"){
                $user = new User($this->form->login, 'user');
                $_SESSION['user']= serialize($user);
                addRole($user->role);
            }else{
                getMessages()->addError("Niepoprawny login lub hasło");
            }
        }
        return !getMessages()->isError();
    }
    
    public function generateView() {
        getSmarty()->assign('page title', 'Logowanie');
        getSmarty()->assign('form',$this->form);
        getSmarty()->display('LoginView.html');
    }
    
    public function action_login() {
        $this->getParams();
        if($this->verify()){
            header("Location:".getConfig()->app_url."/");
        }else{
            $this->generateView();
        }
    }
    
    public function action_logout() {
        session_destroy();
        getMessages()->addInfo("Poprawnie wylogowano");
        $this->generateView();
    }
}