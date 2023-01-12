<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table('items')]
class Items
{
    #[Id]
    #[Column, GeneratedValue]
    private int $id;

    #[Column]
    private string $description;

    #[Column]
    private string $ville;

    #[Column]
    private int $quanity;

    #[Column(name: 'Price',type: Types::DECIMAL, precision: 10, scale: 2)]
    private float $price;

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getVille(): string
    {
        return $this->ville;
    }

    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }

    public function getQuanity(): int
    {
        return $this->quanity;
    }

    public function setQuanity(int $quanity): void
    {
        $this->quanity = $quanity;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
    
}
