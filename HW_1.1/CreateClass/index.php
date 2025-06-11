<?php
declare(strict_types=1);

class Student
{
    public string $name;
    public string $secondName;
    public int $age;
    public int $number_class = 1;
    public function searchProperty(mixed ...$property) {
        var_dump(...$property);
    }
    public function __construct(string $name, string $secondName, int $age) {
        $this->name = $name;
        $this->secondName = $secondName;
        $this->age = $age;
    }
    
}
class Car
{
    public string $model;
    public int $mileage;
    public int $year_of_release;
    public int $number_class = 2;
    public function searchOwnerCar (Student $owner) {
        var_dump($owner);
    }
    public function __construct(string $model, int $mileage, int $year_of_release) {
        $this->model = $model;
        $this->mileage = $mileage;
        $this->year_of_release = $year_of_release;
    }

}

class TV 
{
    public string $model;
    public int $year_of_release;
    public int $number_class = 3;
    public function searchOwnerTV (Student $owner) {
        var_dump($owner);
    }
    public function __construct(string $model, int $year_of_release) {
        $this->model = $model;
        $this->year_of_release = $year_of_release;
    }
}

$student = new Student("Ivan", "Ivanov", 34);
$car = new Car("BMV X5 I", 260000, 2003);
$tv = new TV("Realme TV 55 (RMV2001)", 2021);

var_dump($student, $car, $tv);

$student->searchProperty($car, $tv);
$car->searchOwnerCar($student);
$tv->searchOwnerTV($student);

