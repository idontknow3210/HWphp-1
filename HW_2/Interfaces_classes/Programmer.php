<?php

class Programmer extends AbstractWorkers implements ApplicationCreatorInterface
{
    public string $position = "программист";
    public int $payWork = 45;
    
    public function info(): string {
        return "$this->name $this->surname, позиция: $this->position";
    }
    public function pay (): string {
        return "зарплата: $this->payWork попугаев";
    }
    public function developer (): string {
        return "может заниматься разработкой приложения: пишет код";
    }
}