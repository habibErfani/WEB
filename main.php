<?php
require_once ("vendor/autoload.php");

use TpWeb\Modeles\Personne;
use TpWeb\Utils\GenerateData;


$bd = new \TpWeb\Modeles\BDMapper();
$data = $bd->all();
foreach ($data as $datum) {
    printf("%s\n", $datum);
}