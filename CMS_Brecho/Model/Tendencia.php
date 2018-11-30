<?php

  class Tendencia{

    private $idTendencia;
    private $nome;
    private $dtInicio;
    private $dtFinal;
    private $caminho_imagem;
    private $idProduto;

    public function getIdTendencia(){

      return $this->idTendencia;

    }

    public function setIdTendencia($idTendencia){

      $this->idTendencia = $idTendencia;

    }

    public function getNome(){

      return $this->nome;

    }

    public function setIdTendencia($nome){

      $this->nome = $nome;

    }

    public function getDtInicio(){

      return $this->dtInicio;

    }

    public function setDtInicio($dtInicio){

      $this->dtInicio = $dtInicio;

    }

    public function getDtFinal(){

      return $this->dtFinal;

    }

    public function setDtFinal($dtFinal){

      $this->dtFinal = $dtFinal;

    }

    public function getCaminho_imagem(){

      return $this->caminho_imagem;

    }

    public function setCaminhoImagem($caminho_imagem){

      $this->caminho_imagem = $caminho_imagem;

    }

    public function getIdProduto(){

      return $this->idProduto;

    }

    public function setIdProduto($idProduto){

      $this->idProduto = $idProduto;

    }

  }

?>
