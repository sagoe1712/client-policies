<?php

use sagoe1712\BiClientPolicies\BiClientPolicies;

include 'vendor/autoload.php';

$clientPoliciesRepo = new \sagoe1712\BiClientPolicies\Repository(
    new sagoe1712\BiClientPolicies\Mapper(
        new \Doctrine\DBAL\Connection([
            'host' => '192.168.33.200',
            'dbname' => 'broker_insight',
            'user' => 'root',
            'password' => ''
        ], new \Doctrine\DBAL\Driver\PDOMySql\Driver()),
        new \sagoe1712\BiClientPolicies\Collection\Factory()
    )
);

$newClientPolicy = $clientPoliciesRepo->getNew(1,1);

$newClientPolicy = $clientPoliciesRepo->save($newClientPolicy);
echo $newClientPolicy->getId();
