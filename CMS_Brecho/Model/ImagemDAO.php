<?php

    require_once("ConexaoBanco.php");
    require_once("Imagem.php");
    require_once("Produto.php");

    class ImagemDAO{

        public function inserir(Imagem $imagem){
            
            $conexao = ConexaoBanco::obterConexao();

            $SQL = "INSERT INTO tbl_imagem( titulo, caminho_imagem, descricao) VALUES(' ', ?, ' ')";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $imagem->getCaminho());

            $envio = $stm->execute();

            if($envio){

                $SQL = "SELECT LAST_INSERT_ID()";

                $stm = $conexao->prepare($SQL);

                $stm->setFetchMode(PDO::FETCH_ASSOC);

                $stm->execute();

                $resultSet = $stm->fetch();

                $conexao = null;
                
                return $resultSet["LAST_INSERT_ID()"];

            }

        }
        
        public function produtoImagem($imagem, $produto){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "insert into tbl_produto_imagem(id_produto, id_imagem, principal) VALUES(?, ?, 1) ";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $produto->getIdProduto());
            $stm->bindValue(2, $imagem->getIdImagem());

            $envio = $stm->execute();
                        
            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }


           
        }

        public function inserirEstado(Imagem $imagem){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_estado WHERE id_estado = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $imagem->getIdEstado());

            $stm->execute();

            if($stm->rowCount() <= 0){

                $SQL = "INSERT INTO tbl_estado(id_estado, nome) VALUES(?, ?)";

                $stm = $conexao->prepare($SQL);

                $stm->bindValue(1, $imagem->getIdEstado());
                $stm->bindValue(2, $imagem->getEstado());

                $stm->execute();

                $conexao = null;

            }

        }
        
        public function atualizarEstado(Imagem $imagem){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "UPDATE tbl_estado SET(id_estado, nome) VALUES(?, ?) WHERE id_estado = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $imagem->getIdEstado());
            $stm->bindValue(2, $imagem->getEstado());
            $stm->bindValue(3, $imagem->getIdEstado());

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }

        public function inserirCidade(Imagem $imagem){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_cidade WHERE id_cidade = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $imagem->getIdCidade());

            $stm->execute();

            echo("!!!Fora".$stm->rowCount());

            if($stm->rowCount() <= 0){

                echo("!!!Dentro");

                $SQL = "INSERT INTO tbl_cidade(nome, id_estado) VALUES(?, ?)";

                $stm = $conexao->prepare($SQL);

                $stm->bindValue(1, $imagem->getCidade());
                $stm->bindValue(2, $imagem->getIdEstado());

                $stm->execute();

                $SQL = "SELECT LAST_INSERT_ID()";

                $stm = $conexao->prepare($SQL);

                $stm->execute();

                $stm->setFetchMode(PDO::FETCH_ASSOC);

                $resultSet = $stm->fetch();

                $conexao = null;

                return $resultSet["LAST_INSERT_ID()"];

            }

        }
        public function atualizarCidade(Imagem $imagem){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_cidade WHERE id_cidade = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $imagem->getIdCidade());

            $stm->execute();

            echo("!!!Fora".$stm->rowCount());

            if($stm->rowCount() <= 0){

                $SQL = "UPDATE tbl_cidade set(nome, id_estado) VALUES(?, ?)";

                $stm = $conexao->prepare($SQL);

                $stm->bindValue(1, $imagem->getCidade());
                $stm->bindValue(2, $imagem->getIdEstado());

                $stm->execute();

                $SQL = "SELECT LAST_INSERT_ID()";

                $stm = $conexao->prepare($SQL);

                $stm->execute();

                $stm->setFetchMode(PDO::FETCH_ASSOC);

                $resultSet = $stm->fetch();

                $conexao = null;

                return $resultSet["LAST_INSERT_ID()"];

            }

        }

    }

 ?>
