<?php

function autoloader (string $class_name) {
    
        include $class_name . ".php";
    
}