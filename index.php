<?php
 require "character.php";
 require "Hero.php";
 require "Orc.php";

 $Hero = new Hero(2000, 0, "blaster", 250, "cap", 600);
 $Orc = new Orc(500, 0);


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
<?php while ($Hero->get_health() >= 0) {
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
                <?php
        }?>
            <p>Rage : <?= $Hero->get_rage() ?></p>
            <p>Santé : <?= $Hero->get_health() ?> </p>
            <p>Orc Santé : <?= $Orc->get_health() ?> </p>
        </div>

    <?php
}
 ?>
</body>
</html>
