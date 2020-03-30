<?php

require_once 'Album.php';
require_once 'Musica.php';

$albuns = new SplObjectStorage();

$divide = new Album("Divide");

$albuns->attach($divide);

$scorpion = new Album("Scorpion");

$albuns->attach($scorpion);

#echo "<prev>";
#var_dump($albuns);
#echo "</pre>";

$musicasDivide = new SplFixedArray(2);

$musicasDivide[0] = new Musica("Shape of You");
$musicasDivide[1] = new Musica("Castle on the Hill");


$musicasScorpion = new SplFixedArray(3);

$musicasScorpion[0] = new Musica("Peak");
$musicasScorpion[1] = new Musica("Summer Games");
$musicasScorpion[2] = new Musica("Jaded");

$albuns[$divide] = $musicasDivide;
$albuns[$scorpion] = $musicasScorpion;

foreach($albuns as $album) 
{
    echo "Album: " . $album->getNome() . "<br>";

    foreach($albuns[$album] as $musica) 
    {
        echo "Música: " . $musica->getNome() . "<br>";
    }

    echo "<br>";
}