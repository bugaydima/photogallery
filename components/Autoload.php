<?php
function my_autoload($class_name){
    $array_path = array(
        '/models/',
        '/components/'
    );
    
    foreach ($array_path as $path){
        $path = ROOT . $path . $class_name . '.php';
        if (is_file($path)){
            include_once $path;
        }
    }
}
spl_autoload_register('my_autoload');