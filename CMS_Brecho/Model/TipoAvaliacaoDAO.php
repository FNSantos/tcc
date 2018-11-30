<?php

    require_once("ConexaoBanco.php");
    require_once("TipoAvaliacao.php");

    class TipoAvaliacaoDAO{

        public function inserir(TipoAvaliacao $tipoAvaliacao){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "INSERT INTO tbl_tipo_avaliacao(nome) VALUES(?)";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $tipoAvaliacao->getNome());

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

            $SQL = "SELECT * FROM tbl_tipo_avaliacao WHERE id_tipo = ?";

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

            $SQL = "SELECT * FROM tbl_tipo_avaliacao";

            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $tipoAvaliacao = new TipoAvaliacao();

                $tipoAvaliacao->setId($resultSet["id_tipo"]);
                $tipoAvaliacao->setNome($resultSet["nome"]);


                $listaTipos[] = $tipoAvaliacao;

            }

            $conexao = null;

            return $listaTipos;

        }

        public function atualizar(TipoAvaliacao $tipoAvaliacao){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "UPDATE tbl_tipo_avaliacao SET nome = ? WHERE id_tipo = ? ";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $tipoAvaliacao->getNome());
            $stm->bindValue(2, $tipoAvaliacao->getId());

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

            $SQL = "UPDATE tbl_tipo_avaliacao SET situacao = ? WHERE id_tipo = ?";

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

            $SQL = "DELETE FROM tbl_tipo_avaliacao WHERE id_tipo = ?";

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
