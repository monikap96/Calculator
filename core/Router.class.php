<?php
namespace core;
use Exception;

class Router{
    public $action = null;
    public $routes = null;
    private $default = null;
    private $login = 'login';
    
    public function getAction() {
        return $this->action;
    }

    public function setAction($action): void {
        $this->action = $action;
    }

    public function addRouteEx($action, $namespace, $controllerR, $method, $roles = null) {
        $this->routes[$action] = new Route($namespace, $controllerR, $method, $roles);
    }

    public function addRoute($action, $controllerR, $roles = null) {
        $this->routes[$action] = new Route(null, $controllerR, 'action_'.$action, $roles);
    }

    public function setDefaultRoute($route) {
        $this->default = $route;
    }

    public function setLoginRoute($route) {
        $this->login = $route;
    }

    private function control($namespace, $controllerR, $method, $roles=null){
        if(!empty($roles)){
            $foundRole = false;
            if(is_array($roles)){
                foreach ($roles as $role) {
                    if(inRole($role)){
                        $foundRole = true;
                        break;
                    }
                }
            }else if(inRole($role)){
                $foundRole = true;
            }
            if(!$foundRole){
                forwardTo($this->login);
            }
        }
        if(empty($namespace)){
            $controllerR="app\\controllers\\".$controllerR;
        }else{
            $controllerR=$namespace."\\".$controllerR;
        }

        $controller = new $controllerR;
        if (method_exists($controller, $method)) {
            $controller->$method();
        } else {
            throw new Exception('Method "' . $method . '" does not exist in "' . $controller . '"');
        }
        exit;
       
    }
    
    public function go() {
        if (isset($this->routes[$this->action])) {
            $route = $this->routes[$this->action];
            $this->control($route->namespace, $route->controllerR, $route->method, $route->roles);
        } else {
            if (isset($this->default) && isset($this->routes[$this->default])) {
                $route = $this->routes[$this->default];
                $this->control($route->namespace, $route->controllerR, $route->method, $route->roles);
            } else {
                throw new Exception('Route for "' . $this->action . '" is not defined');
            }
        }
    }

    
}
