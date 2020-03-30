<?php

class TocadorDeMusica 
{

    private $musicas;

    public function __construct()
    {

        #Essa collection adiciona o array de músicas
        $this->musicas = new SplDoublyLinkedList();
        #Essa collection é a pilha do histórico e 
        #adiciona a música no histórico
        $this->historico = new SplStack();
        #Essa collection é a fila de download das músicas 
        $this->filaDeDownloads = new SplQueue();

        #instância da classe RANKING
        $this->ranking = new Ranking();


        #Retorna a posição inicial
        $this->musicas->rewind();
    }

    public function adicionarMusicas(SplFixedArray $musicas)
    {
        for($musicas->rewind(); $musicas->valid(); $musicas->next())
        {
            $this->musicas->push($musicas->current());
        }

        #Retorna a posição inicial
        $this->musicas->rewind();
    }

    public function tocarMusica()
    {
        if($this->musicas->count() === 0)
        {
            echo "Erro, nenhuma música no tocador";
        }
        else
        {
            $this->historico->push($this->musicas->current());
            $this->musicas->current()->tocar();
        }
    }

    public function tocarUltimaMusicaTocada()
    {
        echo "Tocando do histórico: " . $this->historico->pop() . "<br>";
    }

    public function adicionarMusica($musica)
    {
        $this->musicas->push($musica);
    }

    public function avancarMusica()
    {
        $this->musicas->next();

        if(!$this->musicas->valid())
        {
            $this->musicas->rewind();
        }
    }

    public function voltarMusica()
    {
        $this->musicas->prev();

        if(!$this->musicas->valid())
        {
            $this->musicas->rewind();
        }
    }

    public function exibirMusicas()
    {
        for($this->musicas->rewind(); $this->musicas->valid(); $this->musicas->next())
        {
            echo "Música: " . $this->musicas->current() . "<br>";
        }
    }

    public function exibirQuantidadeMusicas()
    {
        echo "Existem " . $this->musicas->count() . " músicas no tocador.";
    }

    public function adicionarMusicaNoComecoDaPlaylist($musica)
    {
        $this->musicas->unshift($musica);
    }

    public function removerMusicaDoComecoDaPlaylist()
    {
        $this->musicas->shift();
    }

    public function removerMusicaDoFinalDaPlaylist()
    {
        $this->musicas->pop();
    }

    public function baixarMusicas() 
    { 
        if($this->musicas->count() > 0)
        { 
            for($this->musicas->rewind(); $this->musicas->valid(); $this->musicas->next())
            {
                $this->filaDeDownloads->push($this->musicas->current());
            }
            for($this->filaDeDownloads->rewind(); $this->filaDeDownloads->valid(); $this->filaDeDownloads->next()) 
            {
                echo "Baixando: " . $this->filaDeDownloads->current() . "...<br>";
            }
        } 
        else
        { 
            echo "Nenhuma música encontrada para baixar.";
        } 
    }

    public function exibeRanking()
    {
        foreach($this->musicas as $musica)
        {
            #Método "insert()" vem da classe 
            #abstrata SplHeap
            $this->ranking->insert($musica);
        }

        foreach($this->ranking as $musica)
        {
            echo $musica->getNome() . " - " . $musica->getVezesTocada() . "<br>";
        }
    }
}


