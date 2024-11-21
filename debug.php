<?php

function printArray($array) : void {
    $trace = debug_backtrace();
    $caller = $trace[1];
    echo '<pre>';
    echo "Called in {$caller['file']} on line {$caller['line']}\n";
    print_r($array);
    echo '</pre>';
    echo '<hr>';
}

function tt($array) : void {
    printArray($array);
}

function tte($array) : void {
    printArray($array); 
    exit;
}
