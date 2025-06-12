<?php

class Manager extends AbstractWorkers implements LeadInterface, WebinarSpeakerInterface
{
    public string $position = "менеджер";
    public int $payWork = 50;
    
    public function info(): string {
        return "$this->name $this->surname, позиция: $this->position";
    }
    public function pay (): string {
        return "зарплата: $this->payWork попугаев";
    }
    public function controlWork (): string {
        return "может управлять или руководить: руководит компанией";
    }
    public function speakerWebinar (): string {
        return "может вести вебинар для коллег: ведет вебинары";
    }
}