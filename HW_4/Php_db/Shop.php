<?php
declare(strict_types=1);

class Shop extends BaseTable
{
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, 'shop', array('name', 'address', 'note'));
    }
}
