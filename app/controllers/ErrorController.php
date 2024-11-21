<?php

namespace App\Controllers;

class ErrorController {
    public function notFound() : void {
        http_response_code(404);
        echo "Page not found.";
        exit;
    }
}