<?php

$musicas = new SplFixedArray(2);

$musicas[0] = "One Dance";
$musicas[1] = "Closer";

$musicas->setSize(4);

$musicas[2] = "Rockstar";
$musicas[3] = "Love Yourself";

echo $musicas->getSize();

?>