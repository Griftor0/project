<?php

namespace App\Controllers;

use App\Controllers\ErrorController;

class Controller{
    protected function render(string $view){
        $viewFolderPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR;
        $viewFilePath = $viewFolderPath . $view . ".php";
        if (file_exists($viewFilePath)) {
            include $viewFolderPath . 'header.php';            
            include $viewFilePath;
            include $viewFolderPath . 'footer.php';
        } 
        else {
            $errorController = new ErrorController;
            $errorController->notFound();
        }
    }
}