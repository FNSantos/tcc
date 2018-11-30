<?php

    require_once("ConexaoBanco.php");
    require_once("Avaliacao.php");

    class AvaliacaoDAO{

        public function inserir(Avaliacao $avaliacao){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "INSERT INTO tbl_avaliacao(tipo, situacao, id_tipo) VALUES(?, 0, ?)";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $avaliacao->getAvaliacao());
            
            $stm->bindValue(2, $avaliacao->getIdTipo());

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }

        public function obterUm($id){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_avaliacao WHERE id_tipo_avaliacao = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $id);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            $resultSet = $stm->fetch();

            $conexao = null;

            return $resultSet;

        }

        public function obterTodos(){

            $listaTipos = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_avaliacao";

            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $avaliacao = new Avaliacao();

                $avaliacao->setId($resultSet["id_tipo_avaliacao"]);
                $avaliacao->setAvaliacao($resultSet["tipo"]);
                $avaliacao->setSituacao($resultSet["situacao"]);
                $avaliacao->setIdTipo($resultSet["id_tipo"]);

                $listaTipos[] = $avaliacao;

            }

            $conexao = null;

            return $listaTipos;

        }
        
        
        public function obterTipos(){

            $listaTipos = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_tipo_avaliacao";

            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $avaliacao = new Avaliacao();

                $avaliacao->setIdTipo($resultSet['id_tipo']);
                $avaliacao->setAvaliacao($resultSet['nome']);


                $listaTipos[] = $avaliacao;

            }

            $conexao = null;

            return $listaTipos;

        }
        

        public function atualizar(TipoAvalicao $avaliacao){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "UPDATE tbl_avaliacao SET tipo = ? WHERE id_tipo_avaliacao = ? ";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $avaliacao->getAvaliacao());
            $stm->bindValue(2, $avaliacao->getId());

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }

        public function atualizarSituacao($situacao, $id){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "UPDATE tbl_avaliacao SET situacao = ? WHERE id_tipo_avaliacao = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $situacao);
            $stm->bindValue(2, $id);

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }

        public function remover($id){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "DELETE FROM tbl_avaliacao WHERE id_tipo_avaliacao = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $id);

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }

    }

 ?>
