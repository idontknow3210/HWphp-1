<?php
declare(strict_types=1);
namespace src;

class Person
{
    private string $login;
    private string $password;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function __get($property): string|null
    {
        return ($this->$property ?? null) . PHP_EOL;
    }

    public function __set($property, $value): void
    {
        if (property_exists($this, $property)) {
            $this->$property = $value . PHP_EOL;
        } else {
            echo "Ошибка! Нет свойства: $property" . PHP_EOL;
        }
    }

    public function __sleep(): array
    {
        return ['login', 'password'];
    }

    public function __wakeup(): void
    {
        $this->login = ucfirst($this->login);
    }

    public function __toString(): string
    {
        return "$this->login $this->password" . PHP_EOL;
    }
}