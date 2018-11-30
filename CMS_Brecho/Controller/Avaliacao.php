<?php

    require_once("Model/Avaliacao.php");
    require_once("Model/AvaliacaoDAO.php");

    session_start();

    class AvaliacaoControl{

        public function inserir(){

            $avaliacao = new Avaliacao();
            $avaliacaoDAO = new AvaliacaoDAO();

            $avaliacao->setAvaliacao($_POST["avaliacao"]);
            $avaliacao->setIdTipo($_POST["tipodeAvaliacao"]);
            
            $avaliacaoDAO->inserir($avaliacao);

        }

        public function obterTodos(){

            $avaliacaoDAO = new AvaliacaoDAO();

            $listaTipos = array();

            $listaTipos = $avaliacaoDAO->obterTodos();

            echo('<tr id="table_title">');
            echo('<td>Nome</td>');
            echo('<td>Opções</td>');
            echo('</tr>');

            foreach ($listaTipos as $avaliacao) {

                echo('<tr>');
                echo('<td class="column_content">'.$avaliacao->getAvaliacao().'</td>');
                echo('<td class="column_content">');
                echo('<img src="Imagens/excluir.png" alt="Excluir " style="margin:0px;" onclick="remover('.$avaliacao->getId().')">');
                echo('<img src="Imagens/editar.png" alt="Editar Funcionário" onclick="obterUm('.$avaliacao->getId().')">');
                echo('<img src="Imagens/'.($avaliacao->getSituacao() == 0 ? "check_true.png" : "check_false.png").'" alt="Ativar/Desativar Funcionário" onclick="atualizarSituacao('.$avaliacao->getId().', '.$avaliacao->getSituacao().')">');
                echo('</td>');
                echo('</tr>');

            }

        }
        
        
        public function obterTipos(){

            $avaliacaoDAO = new AvaliacaoDAO();

            $listaTipos = array();

            $listaTipos = $avaliacaoDAO->obterTipos();
                                    
            echo('<select class="select_avaliacao" id="slt_tipo">');
            echo('<option value=""> -SELECIONE-</option>');
            foreach ($listaTipos as $row) {
                
                echo('<option value="'.$row->getIdTipo().'">'.$row->getAvaliacao().'</option>');
             
            }
            echo('</select>');
        }
        
        
        
          public function obterUm(){

            $avaliacaoDAO = new AvaliacaoDAO();

            $_SESSION["id"] = $_POST["id"];

            echo(json_encode($avaliacaoDAO->obterUm($_POST["id"])));

        }

        public function atualizar(){

            $avaliacao = new Avaliacao();

            $avaliacaoDAO = new AvaliacaoDAO();

            $avaliacao->setId($_SESSION["id"]);
            $avaliacao->setAvaliacao($_POST["avaliacao"]);

            $avaliacaoDAO->atualizar($avaliacao);

        }

        public function remover(){

            $avaliacaoDAO = new AvaliacaoDAO();

            $avaliacaoDAO->remover($_POST["id"]);

        }

        public function atualizarSituacao(){

            $avaliacaoDAO = new AvaliacaoDAO();
            
            echo($_POST["situacao"]);

            $avaliacaoDAO->atualizarSituacao($_POST["situacao"], $_POST["id"]);

        }


    }

?>
