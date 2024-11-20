<?php

function printArray($array) : void{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function tt($array) : void{
    printArray($array);
}

function tte($array) : void{
    printArray($array);
    exit;
}
