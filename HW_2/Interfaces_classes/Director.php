<?php

class Director extends AbstractWorkers implements LeadInterface
{
    public string $position = "директор";
    public int $payWork = 60;
    public function info(): string {
        return "$this->name $this->surname, позиция: $this->position";
    }
    public function pay(): string {
        return "зарплата: $this->payWork попугаев";
    }
    public function controlWork (): string {
        return "может управлять или руководить: руководит компанией";
    }
}