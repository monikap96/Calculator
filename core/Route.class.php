<?php

namespace core;

class Route{
    public $namespace = null;
    public $controllerR = null;
    public $method = null;
    public $roles = null;
    
    public function __construct($namespace, $controllerR, $method, $roles) {
        $this->namespace = $namespace;
        $this->controllerR = $controllerR;
        $this->method = $method;
        $this->roles = $roles;
    }

}