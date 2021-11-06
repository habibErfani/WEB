<?php
require_once ("vendor/autoload.php");

use duncan3dc\Laravel\Blade;
use duncan3dc\Laravel\BladeInstance;


$blade = new BladeInstance(__DIR__."/views", __DIR__."/cache");
echo $blade->render("index",['title' => 'Liste de personnes']);


