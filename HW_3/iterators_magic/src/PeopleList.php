<?php
declare(strict_types=1);
namespace src;

use Iterator;

class PeopleList implements Iterator
{
    private array $people = [];
    private int $position = 0;

    public function __construct(array $people)
    {
        $this->people = $people;
    }

    public function current(): Person 
    {
        return $this->people[$this->position];
    }

    public function key(): int 
    {
        return $this->position;
    }

    public function next(): void 
    {
        ++$this->position;
    }

    public function rewind(): void 
    {
        $this->position = 0;
    }

    public function valid(): bool 
    {
        return isset($this->people[$this->position]);
    }
}