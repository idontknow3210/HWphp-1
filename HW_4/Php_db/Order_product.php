<?php
declare(strict_types=1);

class Order_product extends BaseTable
{
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, 'order_product', array('order_id', 'product_id', 'price', 'count', 'note'));
    }
 }
