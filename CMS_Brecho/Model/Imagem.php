<?php

    class Imagem{

        private $idImagem;
        private $idProduto;
        private $nome;
        private $caminho;
        private $idLigacao;

        public function setIdImagem($idImagem){

            $this->idImagem = $idImagem;

        }

        public function getIdImagem(){

            return $this->idImagem;

        }
        public function setIdProduto($idProduto){

            $this->idProduto = $idProduto;

        }

        public function getIdProduto(){

            return $this->idProduto;

        }
         public function setNome($nome){

            $this->nome = $nome;

        }

        public function getNome(){

            return $this->nome;

        }
         public function setCaminho($caminho){

            $this->caminho = $caminho;

        }

        public function getCaminho(){

            return $this->caminho;

        } 
        public function setIdLigacao($idLigacao){

            $this->idLigacao = $idLigacao;

        }

        public function getIdLigacao(){

            return $this->idLigacao;

        }
    }
    ?>