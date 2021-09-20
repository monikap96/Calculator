<?php

namespace app\transfers;

class User{
    public $login;
    public $role;
    
    public function __construct($login, $role) {
        $this->login = $login;
        $this->role = $role;
    }

}
