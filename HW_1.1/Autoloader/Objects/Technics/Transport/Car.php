<?php

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