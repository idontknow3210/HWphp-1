<?php

class CustomException extends Exception
{
  protected string $type;
  public function __construct($message, $code = 0, Throwable $previous = null) {
    $this->type = gettype($message);

    parent::__construct('', $code, $previous);
  }

  public function __toString(): string
  {
    $type = match ($this->type) {
      'double', 'integer' => 'число',
      'string' => 'строку',
      'bool' => 'булево значение',
      'array' => 'массив',
      default => 'объект',
    };

    return 'Тип перехваченной переменной: ' . $type . PHP_EOL;
  }
}