<?php

/*
    Автозагрузка use FolderName\ClassName => foldername\ClassName
*/

spl_autoload_register(function ($class) {
    $classParts = explode('\\', $class);
    $namespace = implode('\\', array_slice($classParts, 0, -1));
    $className = end($classParts);
    $path = __DIR__ . DIRECTORY_SEPARATOR . strtolower($namespace) . DIRECTORY_SEPARATOR . $className . '.php'; 
    if (file_exists($path)) {
        require_once $path;
    } else {
        throw new Exception("Class {$class} not found in the path: {$path}");
    }
});