<?php

namespace classes;

class Debugger{
    private static function printArray($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    public static function tt($array){
        self::printArray($array);
    }

    public static function tte($array){
        self::printArray($array);
        exit;
    }
}