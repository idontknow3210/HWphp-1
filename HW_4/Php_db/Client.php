<?php
declare(strict_types=1);

class Client extends BaseTable
{
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, 'client', array('name', 'phone', 'birthday', 'note'));
    }
 }
