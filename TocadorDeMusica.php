<?php

class TocadorDeMusica {

    private $musicas;

    public function __construct(){
        $this->musicas = new SplDoublyLinkedList();
        $this->historico = new SplStack();

        #Retorna a posição inicial
        $this->musicas->rewind();
    }

    public function adicionarMusicas(SplFixedArray $musicas){
        for($musicas->rewind(); $musicas->valid(); $musicas->next()){
            $this->musicas->push($musicas->current());
        }

        #Retorna a posição inicial
        $this->musicas->rewind();
    }

    public function tocarMusica(){
        if($this->musicas->count() === 0){
            echo "Erro, nenhuma música no tocador";
        }else{
            echo "Tocando música: " . $this->musicas->current() . "<br>";
            $this->historico->push($this->musicas->current());
        }
    }

    public function tocarUltimaMusicaTocada(){
        echo "Tocando do histórico: " . $this->historico->pop() . "<br>";
    }

    public function adicionarMusica($musica){
        $this->musicas->push($musica);
    }

    public function avancarMusica(){
        $this->musicas->next();

        if(!$this->musicas->valid()){
            $this->musicas->rewind();
        }
    }

    public function voltarMusica(){
        $this->musicas->prev();

        if(!$this->musicas->valid()){
            $this->musicas->rewind();
        }
    }

    public function exibirMusicas(){
        for($this->musicas->rewind(); $this->musicas->valid(); $this->musicas->next()){
            echo "Música: " . $this->musicas->current() . "<br>";
        }
    }

    public function exibirQuantidadeMusicas(){
        echo "Existem " . $this->musicas->count() . " músicas no tocador.";
    }

    public function adicionarMusicaNoComecoDaPlaylist($musica){
        $this->musicas->unshift($musica);
    }

    public function removerMusicaDoComecoDaPlaylist(){
        $this->musicas->shift();
    }

    public function removerMusicaDoFinalDaPlaylist(){
        $this->musicas->pop();
    }
}

?>