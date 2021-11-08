<?php


namespace TpWeb\Modeles;


interface IBDMapper {

    function all(): array;
    function findById(int $id);
    function insert(Personne $personne): Personne;
    function update(Personne $personne): Personne;
    function delete(int $id): bool;
}