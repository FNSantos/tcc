<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>CMS Bernadete | Cadastro de Enquetes </title>
        <link type="text/css" rel="stylesheet" href="CSS/style.css">
        <link type="text/css" rel="stylesheet" href="CSS/style_enquete.css"> <script src="JavaScript/jquery-3.3.1.js" charset="utf-8"></script>

        <script src="JavaScript/ajax_enquete_crud.js"></script>
        
    </head>
    <body>
        <?php require_once("cabecalho.php")?>
        <div id="main">
            <div id="main_content">
                <?php require_once("menu.php") ?>
                <div id="content" style="overflow: ">                    
                    <div class="title_content" style="float:none;" >
                        Enquete
                    </div>
                    
                     <a href="cadastro_enquete.php">
                        <button id="btn_cadastrar" class="buttons" >Cadastrar</button>
                    </a>
                    <div id="content_enquete" style="height:400px; width:400px;">
                    
                    </div>
                    
                    
                    <!--div id="conteudo">
                        <div class="organiza_pergunta">
                            <div class="pergunta">
                                 De pernas de fora! Qual look de famosa você mais gostou?
                            </div>
                        </div>
                        
                        <div class="resposta">
                            <div class="resposta_enquete">
                                <input type="radio" id="check_enquete" name="feature"
                                value="" />
                                Carolina Dieckman
                            </div>
                            
                             <div class="resposta_enquete">
                                <input type="radio" id="check_enquete" name="feature"
                                value="" />
                                 Juliana Paes
                            </div>
                            
                             <div class="resposta_enquete">
                                <input type="radio" id="check_enquete" name="feature"
                                value="" />
                                Giovana Antonelli
                            </div>
                            
                        </div>
                        
                        <div class="caixa_opcoes">
                        
                        </div>

                    </div>
                    
                     <div id="conteudo">
                        <div class="organiza_pergunta">
                            <div class="pergunta">
                                 De pernas de fora! Qual look de famosa você mais gostou?
                            </div>
                        </div>
                        
                        <div class="resposta">
                            <div class="resposta_enquete">
                                <input type="radio" id="check_enquete" name="feature"
                                value="" />
                                Carolina Dieckman
                            </div>
                            
                             <div class="resposta_enquete">
                                <input type="radio" id="check_enquete" name="feature"
                                value="" />
                                 Juliana Paes
                            </div>
                            
                             <div class="resposta_enquete">
                                <input type="radio" id="check_enquete" name="feature"
                                value="" />
                                Giovana Antonelli
                            </div>
                            
                        </div>
                        
                        <div class="caixa_opcoes">
                        
                        </div>

                    </div-->
                    
                </div>
            </div>
        </div>
        <?php require_once("rodape.php") ?>
    </body>
</html>
