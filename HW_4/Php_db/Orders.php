<?php
declare(strict_types=1);

class Orders extends BaseTable
{
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, 'orders', array('created_at', 'shop_id', 'client_id', 'note'));
    }
 }
