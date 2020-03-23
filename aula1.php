<?php

require_once 'TocadorDeMusica.php';

$musicas = new SplFixedArray(2);

$musicas[0] = "One Dance";
$musicas[1] = "Closer";

$musicas->setSize(4);

$musicas[2] = "Rockstar";
$musicas[3] = "Love Yourself";


//Serve para ver a quantidade de arrays
//echo $musicas->getSize();

$tocador = new TocadorDeMusica();

$tocador->adicionarMusicas($musicas);

#$tocador->tocarMusica();

#$tocador->adicionarMusica("Havana"); 
$tocador->adicionarMusicaNoComecoDaPlaylist("Havana");

$tocador->removerMusicaDoComecoDaPlaylist();

$tocador->removerMusicaDoFinalDaPlaylist();

#$tocador->avancarMusica();

#$tocador->tocarMusica();

$tocador->exibirMusicas();

#$tocador->exibirQuantidadeMusicas();

?>