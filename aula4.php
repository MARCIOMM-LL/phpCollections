<?php

require 'Ranking.php';
require 'TocadorDeMusica.php';
require 'Musica.php';

$musicas = new SplFixedArray(4);

$musicas[0] = new Musica("Onde Dance");
$musicas[1] = new Musica("Closer");
$musicas[2] = new Musica("rockstar");
$musicas[3] = new Musica("Love Yourself");

$tocador = new TocadorDeMusica();

$tocador->adicionarMusicas($musicas);

$tocador->tocarMusica();
$tocador->tocarMusica();
$tocador->tocarMusica();
$tocador->tocarMusica();

$tocador->avancarMusica();

$tocador->tocarMusica();
$tocador->tocarMusica();

$tocador->avancarMusica();

$tocador->tocarMusica();
$tocador->tocarMusica();
$tocador->tocarMusica();

$tocador->avancarMusica();

$tocador->tocarMusica();

$tocador->exibeRanking();