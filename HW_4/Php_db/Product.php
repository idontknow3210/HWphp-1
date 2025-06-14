<?php
declare(strict_types=1);

class Product extends BaseTable
{
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, 'product', array('name', 'shop_id', 'price', 'count', 'note'));
    }
 }
