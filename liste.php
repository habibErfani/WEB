<?php

require_once 'vendor/autoload.php';

use TpWeb\Modeles\BDMapper;
$mapper = new BDMapper();

$personnes = $mapper->all();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des personnes</title>
</head>
<body>
<h1>Liste des personnes</h1>
<ul>
    <?php foreach ($personnes as $personne) { ?>
        <li>
            <?php echo sprintf("%s", $personne); ?>
        </li>
    <?php } ?>
</ul>
</body>
</html>

