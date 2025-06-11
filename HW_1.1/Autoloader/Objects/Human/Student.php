<?php
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