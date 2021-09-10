<?php
namespace core;

class ClassLoader{
    
    public $paths=array();

    public function __construct() {
        spl_autoload_register(function($class) {
            $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
            $fileName = getConfig()->root_path.DIRECTORY_SEPARATOR.$class.'.class.php';
            if (is_readable($fileName)) {
                require_once $fileName;
            }
        });
    }

}