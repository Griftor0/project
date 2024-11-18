<?php

function printArray($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function tt($array){
    printArray($array);
}

function tte($array){
    printArray($array);
    exit;
}
