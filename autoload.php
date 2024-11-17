<?php

spl_autoload_register(function ($class){
    $relativePath = str_replace('\\',  DIRECTORY_SEPARATOR, $class);
    $absolutePath = __DIR__ . DIRECTORY_SEPARATOR . $relativePath . '.php';
    
    if(file_exists($absolutePath)){
        require_once($absolutePath);
    }
    else {
        throw new Exception("Class {$class} not found in the path: {$absolutePath}");
    }
});