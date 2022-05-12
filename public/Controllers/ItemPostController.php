<?php

namespace App\Controllers;

use Doctrine\DBAL\Connection;
use Psr\Http\Message\ServerRequestInterface;

class ItemPostController
{
    private Connection $connexion;
    public function __construct(Connection $connexion)
    {
        $this->connexion=$connexion;
    }

    /**
     * @throws \Doctrine\DBAL\Exception
     */
    public function ajoutItems(ServerRequestInterface $request): mixed
    {
        $body = $request->getParsedBody();
        $first = $body['Id'];
        $second = $body['Desctription'];
        $result = $this->connexion->prepare("insert into items values (  $first, '$second' )");
        $result->executeQuery();
        return $body;
    }
}
