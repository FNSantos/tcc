
<?php

    require_once("ConexaoBanco.php");
    require_once("Enquete.php");

    class EnqueteDAO{

        public function inserir(Enquete $enquete){
            
            $conexao = ConexaoBanco::obterConexao();

            $SQL = "INSERT INTO tbl_enquete(pergunta, data_criacao, situacao, id_funcionario, id_tipo_avaliacao, id_idioma) VALUES(?, ?, 0, ?, ?, 1)";

            $stm = $conexao->prepare($SQL);
            
            $stm->bindValue(1, $enquete->getPergunta());
            $stm->bindValue(2,  date("Y-m-d H:i:s"));
            $stm->bindValue(3, $enquete->getIdFuncionario());
            $stm->bindValue(4, $enquete->getIdTipo());

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

            $SQL = "SELECT * FROM tbl_enquete WHERE id_enquete = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $id);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            $resultSet = $stm->fetch();

            $conexao = null;

            return $resultSet;

        }

        public function obterTodos(){

            $listaEnquetes = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_enquete";

            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $enquete = new Enquete();

                $enquete->setId($resultSet["id_enquete"]);
                $enquete->setPergunta($resultSet["pergunta"]);
                $enquete->setSituacao($resultSet["situacao"]);
                $enquete->setIdTipo($resultSet["id_tipo"]);

                $listaEnquetes[] = $enquete;

            }

            $conexao = null;

            return $listaEnquetes;

        }
        
                
        public function obterTipo($id){

            $listaTipos = array();

            $conexao = ConexaoBanco::obterConexao();

            
            
            $SQL = "select avaliacao.tipo, avaliacao.id_tipo 
                    from tbl_enquete 
                    inner join tbl_avaliacao as avaliacao 
                    on tbl_enquete.id_tipo = avaliacao.id_tipo
                    where id_enquete = ? ";
            
           

            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $id);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

                    
             while ($resultSet = $stm->fetch()){
                
                $enquete = new Enquete();
                
                $enquete->setIdTipo($resultSet['id_tipo']);
                $enquete->setResposta($resultSet['tipo']);
                 
                
                $listaTipos[] = $enquete;
                
                
            }

            $conexao = null;

            return $listaTipos;

        }






        

        public function atualizar(Enquete $enquete){

            $conexao = ConexaoBanco::obterConexao();
            
             //$SQL = "UPDATE tbl_enquete SET pergunta = '".$enquete->getPergunta()."' , id_tipo = ".$enquete->getResposta()." WHERE id_enquete = ".$enquete->getId();
            
           

            $SQL = "UPDATE tbl_enquete SET pergunta = ? , id_tipo = ? WHERE id_enquete = ? ";
            
            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $enquete->getPergunta());
            $stm->bindValue(2, $enquete->getResposta());
            $stm->bindValue(3, $enquete->getId());

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

            $SQL = "UPDATE tbl_enquete SET situacao = ? WHERE id_enquete = ?";

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

            $SQL = "DELETE FROM tbl_enquete WHERE id_enquete = ?";

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
