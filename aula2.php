<?php

require_once 'TocadorDeMusica.php';

$musicas = new SplFixedArray(4);

$musicas[0] = "One Dance";
$musicas[1] = "Closer";
$musicas[2] = "Rockstar";
$musicas[3] = "Love Yourself";

$tocador = new TocadorDeMusica();

$tocador->adicionarMusicas($musicas);

$tocador->tocarMusica();

$tocador->avancarMusica();

$tocador->tocarMusica();

$tocador->avancarMusica();

$tocador->tocarMusica();

$tocador->avancarMusica();

$tocador->tocarMusica();

$tocador->tocarUltimaMusicaTocada();

?>