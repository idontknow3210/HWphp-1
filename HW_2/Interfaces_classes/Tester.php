<?php

class Tester extends AbstractWorkers implements ApplicationCreatorInterface
{
    public string $position = "тестировщик";
    public int $payWork = 40;
    
    public function info(): string {
        return "$this->name $this->surname, позиция: $this->position";
    }
    public function pay (): string {
        return "зарплата: $this->payWork попугаев";
    }
    public function developer (): string {
        return "может заниматься разработкой приложения: тестирует код";
    }
}