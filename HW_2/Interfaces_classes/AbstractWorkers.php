<?php

abstract class AbstractWorkers 
{
    protected string $name;
    protected string $surname;
    public function __construct(string $name, string $surname) {
        $this->name = $name;
        $this->surname = $surname;
    }
    abstract function info (): string;
}