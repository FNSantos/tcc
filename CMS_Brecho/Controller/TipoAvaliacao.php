<?php

    require_once("Model/TipoAvaliacao.php");
    require_once("Model/TipoAvaliacaoDAO.php");

    session_start();

    class TipoAvaliacaoControl{

        public function inserir(){

            $tipoAvaliacao = new TipoAvaliacao();
            $tipoAvaliacaoDAO = new TipoAvaliacaoDAO();

            $tipoAvaliacao->setNome($_POST["nome"]);

            // echo($_POST["nome"]);

            $tipoAvaliacaoDAO->inserir($tipoAvaliacao);

        }

        public function obterTodos(){

            $tipoAvaliacaoDAO = new TipoAvaliacaoDAO();

            $listaTipoAvaliacaos = array();

            $listaTipoAvaliacaos = $tipoAvaliacaoDAO->obterTodos();

            echo('<tr id="table_title">');
            echo('<td>Nome</td>');
            echo('<td>Opções</td>');
            echo('</tr>');

            foreach ($listaTipoAvaliacaos as $tipoAvaliacao) {

                echo('<tr>');
                echo('<td class="column_content">'.$tipoAvaliacao->getNome().'</td>');
                echo('<td class="column_content">');
                echo('<img src="Imagens/excluir.png" alt="Excluir Funcionário" style="margin:0px;" onclick="remover('.$tipoAvaliacao->getId().')">');
                echo('<img src="Imagens/editar.png" alt="Editar Funcionário" onclick="obterUm('.$tipoAvaliacao->getId().')">');
                
                echo('</td>');
                echo('</tr>');

            }

        }

        public function obterUm(){

            $tipoAvaliacaoDAO = new TipoAvaliacaoDAO();

            $_SESSION["id"] = $_POST["id"];

            echo(json_encode($tipoAvaliacaoDAO->obterUm($_POST["id"])));

        }

        public function atualizar(){

            $tipoAvaliacao = new TipoAvaliacao();

            $tipoAvaliacaoDAO = new TipoAvaliacaoDAO();

            $tipoAvaliacao->setId($_SESSION["id"]);
            $tipoAvaliacao->setNome($_POST["nome"]);

            $tipoAvaliacaoDAO->atualizar($tipoAvaliacao);

        }

        public function remover(){

            $tipoAvaliacaoDAO = new TipoAvaliacaoDAO();

            $tipoAvaliacaoDAO->remover($_POST["id"]);

        }

    }

?>
