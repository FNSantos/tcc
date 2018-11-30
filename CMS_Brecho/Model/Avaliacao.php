<?php

    class Avaliacao{

        private $id;
        private $avaliacao;
        private $situacao;
        private $idTipo;

        public function setId($id){

            $this->id = $id;

        }

        public function getId(){

            return $this->id;

        }

        public function setAvaliacao($avaliacao){

            $this->avaliacao = $avaliacao;

        }

        public function getAvaliacao(){

            return $this->avaliacao;

        }
        
        
        public function setIdTipo($idTipo){

            $this->idTipo = $idTipo;

        }

        public function getIdTipo(){

            return $this->idTipo;

        }

        

        public function setSituacao($situacao){

            $this->situacao = $situacao;

        }

        public function getSituacao(){

            return $this->situacao;

        }

    }

 ?>
