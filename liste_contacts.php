<?php
require_once ("vendor/autoload.php");

use duncan3dc\Laravel\Blade;
use duncan3dc\Laravel\BladeInstance;

$blade = new BladeInstance(__DIR__."/views", __DIR__."/cache");

$donnees_json = <<<EOD
[ {
"nom": "Duchmol",
"prenom": "Robert",
"telephone": "00 00 00 00 01"
}, {
"nom": "Martin",
"prenom": "Gérard",
"telephone": "00 00 00 00 02"
}, {
"nom": "Laporte",
"prenom": "Julie",
"telephone": "00 00 00 00 03"
}
]
EOD;

$contacts = json_decode($donnees_json);

echo $blade->render("main", ['title' => 'Liste des personnes',"contacts" => $contacts]);
