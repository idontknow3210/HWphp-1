<?php

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