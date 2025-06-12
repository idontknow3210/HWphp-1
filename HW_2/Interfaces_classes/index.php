<?php
// php 8.3
declare(strict_types=1);

include "./autoloader.php";
spl_autoload_register("autoloader");




$director = new Director("Ivan", "Ivanov");
$manager = new Manager("Petr", "Petrov");
$programmer = new Programmer("Sergey", "Sergeev");
$tester = new Tester("Ivona", "Ionova");
$workers = [$director, $manager, $programmer, $tester];
 
echo $director->info() . ", " . $director->pay() . ", " . $director->controlWork() . ".<br/>";
echo $manager->info() . ", " . $manager->pay() . ", " . $manager->controlWork() . ", " . $manager->speakerWebinar() . ".<br/>";
echo $programmer->info() . ", " . $programmer->pay() . ", " . $programmer->developer() . ".<br/>";
echo $tester->info() . ", " . $tester->pay() . ", " . $tester->developer() . ".<br/>";
echo "Общее количество сотрудников: " . count($workers) . "<br/>";
echo "Общая сумма зарплат: " . ($director->payWork+$manager->payWork+$programmer->payWork+$tester->payWork) . " попугаев <br/>";
