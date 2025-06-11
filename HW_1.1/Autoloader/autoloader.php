<?php

function autoloader (string $class_name) {
    if($class_name === "Student") {
        include "./Objects/Human/" . $class_name . ".php";
    } elseif ($class_name === "Car"){
        include "./Objects/Technics/Transport/"  . $class_name . ".php";
    } else {
        include "./Objects/Technics/"  . $class_name . ".php";
    }
}