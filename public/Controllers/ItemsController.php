<?php

namespace App\Controllers;

use Doctrine\DBAL\Connection;
use Psr\Http\Message\ServerRequestInterface;

class ItemsController
{
    private Connection $connexion;
    public function __construct(Connection $connexion)
    {
        $this->connexion=$connexion;
    }
    /**
     * @throws \Doctrine\DBAL\Exception
     */
    public function items(): mixed
    {
        $rs = $this->connexion->prepare("select * from items");
        $result = $rs->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function delete(ServerRequestInterface $request): mixed
    {
        $body = $request->getParsedBody();
        $id = $body;
        $result = $this->connexion->prepare("delete from items where Id=$id");
        $result->executeQuery();
        return $this->items();
    }
}
