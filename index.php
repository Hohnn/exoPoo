<?php
require "character.php";
require "Hero.php";
require "Orc.php";

$Hero = new Hero(2000, 3000, 0, 30, "espadon", 400, 600, "armure de plaque", 800, 1500);
$Mage = new Hero(1000, 1500, 0, 20, "baton flamme froide", 600, 800, "robe noire", 500, 700);
$Assasin = new Hero(800, 1300, 0, 20, "dague empoisonnée", 600, 800, "cape", 300, 400);
$Dev = new Hero(1500, 1800, 0, 40, "ordinateur vieillissant", 400, 700, "câble RJ-45", 300, 500);

$Orc = new Orc(1000, 1300, 0, 20, "ongles", 200, 400);
$Uruk = new Hero(1500, 2000, 0, 20, "ongles", 200, 400, "piques", 700, 1000);
$Coronuviras = new Hero(2000, 3000, 0, 20, "masse", 700, 1000, "peau de chauve-souris", 500, 700);
$Bug = new Hero(1, 9999, 0, 5, "AirèmeTiréEfEToile", 500, 800, "erreur système", 10, 600);


var_dump($Hero);
var_dump($Orc);

$round = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .log {
            border: 2px solid gray;
            padding: 1rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
<?php while ($Hero->get_health() > 0) {
        $Orc->attack();
        $Hero->attacked($Orc->get_damage());
        $round++; 
        if ($Hero->get_rage() >= 100) {
            if ($Orc->attacked($Hero->get_weaponDamage()) <= 0) {
                break;
            }
            $Hero->set_rage(0);
        }
        ?>
        <div class="log">
            <h3>Round <?= $round ?></h3>
            <p>Orc dégâts : <?= $Orc->get_damage() ?></p>
        <?php if ($Orc->get_damage() < $Hero->get_shieldValue()) { ?>
            <p>Dégâts absorbé par l'armure : <?= $Orc->get_damage() ?></p>
            <p>Dégâts non absorbé par l'armure : 0 </p> <?php 
        } else { ?>
            <p>Dégâts absorbé par l'armure : <?= $Hero->get_shieldValue() ?></p>
            <p>Dégâts non absorbé par l'armure : <?= $Orc->get_damage() - $Hero->get_shieldValue() ?> </p>
        <?php } ?>
            <p>Rage : <?= $Hero->get_rage() ?></p>
            <p>Santé : <?= $Hero->get_health() ?></p>
            <p>Orc Santé : <?= $Orc->get_health() ?></p>
        </div>

    <?php
}
?>
</body>
</html>
