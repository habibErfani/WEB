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
    /**
     * @return list<array<string,mixed>>
     */
    public function items(): array
    {
        $rs = $this->connexion->prepare("select * from items");
        $result = $rs->executeQuery();
        return $result->fetchAllAssociative();
    }
    /**
     * @return list<array<string,mixed>>
     */
    public function delete(ServerRequestInterface $request, array $args)//: array
    {
/*
        $securityId = $request->getHeaderLine('SecurityKey');
        if ($securityId!= 51){
            throw new  \Exception('mauvais clé');
            
        }
*/
        $id = $args['Id'];
        $result = $this->connexion->prepare("delete from items where Id = $id");
        $result->executeQuery();
        return $this->items();
    }
}
