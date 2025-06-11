<?php
// PHP-8.3

declare(strict_types=1);

// require_once("./Objects/Human/human.php");
// require_once("./Objects/Technics/tv.php");
// require_once("./Objects/Technics/Transport/car.php");

include "./autoloader.php";

spl_autoload_register("autoloader");

$student = new Student("Ivan", "Ivanov", 34);
$car = new Car("BMV X5 I", 260000, 2003);
$tv = new TV("Realme TV 55 (RMV2001)", 2021);

var_dump($student, $car, $tv);

// $student->searchProperty($car, $tv);
// $car->searchOwnerCar($student);
// $tv->searchOwnerTV($student);

