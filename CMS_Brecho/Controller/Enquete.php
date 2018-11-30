<?php

    require_once("Model/Enquete.php");
    require_once("Model/EnqueteDAO.php");


    session_start();

    class EnqueteControl{

        public function inserir(){

            $enquete = new Enquete();
            $enqueteDAO = new EnqueteDAO();
          
            
            $enquete->setPergunta($_POST["pergunta"]);
            $enquete->setIdFuncionario($_SESSION["idFuncionario"]);
            $enquete->setIdTipo($_POST["tipodeAvaliacao"]);
            
            
            $enqueteDAO->inserir($enquete);

        }
        public function obterTodos(){

            $enqueteDAO = new EnqueteDAO();

            $listaEnquetes = array();

            $listaEnquetes = $enqueteDAO->obterTodos();
            
          
            
            foreach ($listaEnquetes as $enquete) {
                $resposta ="";
                $conteudo = '<div id="conteudo" >';
                
                        $pergunta = '
                                <div class="organiza_pergunta">

                                    <div class="pergunta">

                                     Pergunta:  '.$enquete->getPergunta().'
                                    </div>
                                </div>
                        ';
                    
                        $listaEnquetesResposta = array();
                        $listaEnquetesResposta = $enqueteDAO->obterTipo($enquete->getId());
                      
                            //var_dump($listaEnquetesResposta); 
                            foreach ($listaEnquetesResposta as $enqueteResposta) {
                                  
                               
                                
                                $resposta =  $resposta.'<div class="resposta">
                                                    <div class="resposta_enquete">
                                                         '.$enqueteResposta->getResposta().'
                                                    </div>
                                                 </div>';
                                        
                            }
                        
                            $botao = '
                                    <div class="caixa_opcoes">
                                        <img height="60px" src="Imagens/'.($enquete->getSituacao() == 0 ? "check_true.png" : "check_false.png").'" alt="Ativar/Desativar Funcionário" onclick="atualizarSituacao('.$enquete->getId().', '.$enquete->getSituacao().')">

                                        <img height="60px"  width="60px" src="Imagens/excluir.png" alt="Excluir Enquete" style="margin:0px;" onclick="remover('.$enquete->getId().')">

                                        <a href="cadastro_enquete.php?id='.$enquete->getId().'"><img height="58px"  width="58px" src="Imagens/editar.png" alt="Editar Funcionário" ">
                                        </a>


                                    </div>
                                 ';
                        
                    echo(
                        $conteudo . $pergunta . $resposta . $botao . "</div>"
                    
                    );
                   
            }

        }
        
        
        public function obterTipos($id){

            $enqueteDAO = new EnqueteDAO();

            $listaTipos = array();

            $listaTipos = $enqueteDAO->obterTipos($id);
                                    
            echo('<select class="select_avaliacao" id="slt_tipo">');
            echo('<option value=""> -SELECIONE-</option>');
            foreach ($listaTipos as $row) {
                
                echo('<option value="'.$row->getIdTipo().'">'.$row->getEnquete().'</option>');
             
            }
            echo('</select>');
        }


        public function obterUm(){

            $enqueteDAO = new EnqueteDAO();

            echo(json_encode($enqueteDAO->obterUm($_POST["id"])));

        }

        public function remover(){

            $enqueteDAO = new EnqueteDAO();

            $enqueteDAO->remover($_POST["idEnquete"]);

        }
        
        public function atualizar(){

            $enquete = new Enquete();

            $enqueteDAO = new EnqueteDAO();

            $enquete->setPergunta($_POST["pergunta"]); 
            $enquete->setResposta($_POST["idTipo"]);
            $enquete->setId($_POST["id"]);


            $enqueteDAO->atualizar($enquete);

        }


        public function obterAutenticacao(){

            echo($_SESSION["nome"]);

        }
         public function atualizarSituacao(){

            $enqueteDAO = new EnqueteDAO();

            echo($_POST["situacao"]);

            $enqueteDAO->atualizarSituacao($_POST["situacao"], $_POST["id"]);

        }

    }

?>