<?php 

    require_once("Model/Produto.php");
    require_once("Model/Imagem.php");
    require_once("Model/ImagemDAO.php");
    require_once("Model/ProdutoDAO.php");
    require_once("Model/ProdutoDAO.php");
    require_once("Model/Subcategoria.php");
    require_once("Model/SubcategoriaDAO.php");
    
    session_start();

    class ProdutoControl{
        
        public function inserir(){
            
            $produto = new Produto();
            $imagem = new Imagem();
            $produtoDAO = new ProdutoDAO();
            $imagemDAO = new ImagemDAO();
            $subcategoria = new Subcategoria();
            $subcategoriaDAO = new SubcategoriaDAO();
            
            $produto->setNome($_POST["nome"]);
            $produto->setPropostaPreco($_POST["proposta_preco"]);
//            $produto->setPrecoFinal($_POST["preco_final"]);
            $produto->setDescricao($_POST["descricao"]);
            $produto->setIdSubcategoria($_POST["id_subcategoria"]);
            
            $produto->setIdEstilo($_POST["id_estilo"]);
            
            $imagem->setCaminho($_POST["caminho_imagem"]);
            
            $imagem->setIdImagem($imagemDAO->inserir($imagem));
            
            $produto->setIdProduto($produtoDAO->inserir($produto));
            
            $imagemDAO->produtoImagem($imagem, $produto);            
            
            $produtoDAO->inserirFiltro($produto->getIdProduto(), $_POST["marca"]);
            $produtoDAO->inserirFiltro($produto->getIdProduto(), $_POST["tamanho"]);
            $produtoDAO->inserirFiltro($produto->getIdProduto(), $_POST["cor"]);
            
            
//            $produtoDAO->inserirImagem
            
        }
        
        public function atualizar(){
            
            $produto = new Produto();
            
            $produtoDAO = new ProdutoDAO();
            
            $produto->setId($_SESSION["id"]);
            $produto->setNome($_POST["nome"]);
            $produto->setPropostaPreco($_POST["proposta_preco"]);
            $produto->setPrecoFinal($_POST["preco_final"]);            
            $produto->setDescricao($_POST["descricao"]);            
            $produto->setIdSubcategoria($_POST["id_subcategoria"]);            
            $produto->setIdSituacao($_POST["id_situacao"]);            
            
            $produtoDAO->atualizar($produto);
            
        }
        
        public function remover(){
            $produtoDAO = new ProdutoDAO();
            
            $produtoDAO->remover($_POST["id"]);
            
        }
        
        public function obterTodos(){
            
            $produtoDAO = new ProdutoDAO();

            $listaProdutos = array();

            $listaProdutos = $produtoDAO->obterTodos();
                                 
            foreach ($listaProdutos as $produto){
                
                 echo('<div class="line_input" style="height:400px; width:400px;float:left; margin-top:100px; ">
                        <div class="content_input" style="height:50px;width:350px; text-align:center; font-size:25px; color:#000; ">
                            '.$produto->getNome().'
                        </div>
                        <div style="height:300px; width:350px; padding-top:50px; margin:auto; border:1px solid #000;">
                            <img src="UploadImagem/'.$produto->getCaminhoProduto().'" style="height:300px;width:350px;">
                        </div>
                        <div style="height:50px; width:350px; text-align:center; ">
                            R$ '.$produto->getPrecoFinal().'
                        </div>
                        
                        <div id="produtos" class="content_input" style="height:60px; width:300px; background-color:black; overflow-x:auto; text-align:center;" >
                            <img src="Imagens/excluir.png" alt="Excluir" style="margin:0px;height:50px;width:50px;" onclick="remover('.$produto->getIdProduto().')">
                            <img src="Imagens/editar.png" alt="Editar Funcionário" style="height:50px;width:50px;" onclick="obterUm('.$produto->getIdProduto().')">
                                                        
                        </div>
                        
                    </div>');
                    
            }
            
            
        }
       public function obterFiltro(){
            
            $produtoDAO = new ProdutoDAO();
            
            $listaFiltros = array();
            
            $listaFiltros =  $produtoDAO->obterFiltro($_POST["id_tipo_filtro"]);
                      
            echo("<option value='0'>Selecione um Filtro</option>");
            
            foreach($listaFiltros as $filtro){
                
                echo("<option value='".$filtro->getIdProduto()."'>".$filtro->getNome()."</option>");
                
            }
            
        }
        
        public function obterEstilo(){
            
            $produto = new ProdutoDAO();
            
            $listaEstilos = array();
            
            $listaEstilos = $produto->obterEstilo();
            
            echo("<option value='0'>Selecione um Estilo</option>");
            
            foreach($listaEstilos as $produto){
                
                echo("<option value='".$produto->getIdProduto()."'>".$produto->getNome()."</option>");
                
            }
            
        }
        
        public function obterCategoria(){
            
            $produto = new ProdutoDAO();
            
            $listaCategoria = array();
            
            $listaCategoria = $produto->obterCategoria();
            
            echo("<option value='0'>Selecione uma Categoria</option>");
            
            foreach($listaCategoria as $produto){
                
                echo("<option value='".$produto->getIdProduto()."'>".$produto->getNome()."</option>");
                
            }
            
        }
        
        public function obterSubcategoria(){
            
            $produto = new ProdutoDAO();
            
            $listaSubcategoria = array();
            
            $listaSubcategoria = $produto->obterSubcategoria();
            
            echo("<option value='0'>Selecione uma Subcategoria</option>");
            
            foreach($listaSubcategoria as $produto){
                
                echo("<option value='".$produto->getIdProduto()."'>".$produto->getNome()."</option>");
                
            }
            
        }
        
        
        
        public function obterUm(){
            
            echo("!!!!!!!!!!!");
            
            $produtoDAO = new ProdutoDAO();
            
            echo(json_encode($produtoDAO->obterUm($_POST["id"])));
            
        }
        
        
            
            
            
        
    }

    

?>