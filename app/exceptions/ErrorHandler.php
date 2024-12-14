<?php

namespace App\Exceptions;

class ErrorHandler {  
    public static function show404() : void {
        http_response_code(404);
        echo "Page not found.";
        exit;
    }
}