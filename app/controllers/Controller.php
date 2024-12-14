<?php

namespace App\Controllers;

class Controller{
    protected function view(string $view){
        $view = str_replace('.', '/', $view);
        $viewFolderPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR;
        if (file_exists($viewFolderPath . $view . ".php")) {
            include $viewFolderPath . 'layout.php';
        } 
        else {
            throw new \Exception("View {$view} not found in the path: {$viewFolderPath}");
        }
    }
}