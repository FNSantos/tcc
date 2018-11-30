<?php

    class Enquete{

        private $id;
        private $pergunta;
        private $dtCriacao;
        private $Situacao;
        private $idFuncionario;
        private $idTipo;
        private $resposta;
        
        
         public function setId($id){

            $this->id = $id;

        }

        public function getId(){

            return $this->id;

        }

        public function setPergunta($pergunta){

            $this->pergunta = $pergunta;

        }

        public function getPergunta(){

            return $this->pergunta;

        }

        public function setDtCriacao($dtCriacao){

            $this->dtCriacao = $dtCriacao;

        }

        public function getDtCriacao(){

            return $this->dtCriacao;

        }

        public function setSituacao($situacao){

            $this->situacao = $situacao;

        }

        public function getSituacao(){

            return $this->situacao;

        }
        
        public function setIdFuncionario($idFuncionario){

            $this->idFuncionario = $idFuncionario;

        }

        public function getIdFuncionario(){

            return $this->idFuncionario;

        }
        
        public function setIdTipo($idTipo){

            $this->idTipo = $idTipo;

        }

        public function getIdTipo(){

            return $this->idTipo;

        } 
        public function setResposta($resposta){

            $this->resposta = $resposta;

        }

        public function getResposta(){

            return $this->resposta;

        }
    }
        
?>
