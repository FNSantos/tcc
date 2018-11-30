<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>CMS Bernadete | Lista Produto</title>
        <link type="text/css" rel="stylesheet" href="CSS/style.css">
        <link type="text/css" rel="stylesheet" href="CSS/style_cadastro_postagem_blog.css">
        <script src="JavaScript/jquery-3.3.1.js" charset="utf-8"></script>
        <script src="JavaScript/ajax_produto_crud.js" charset="utf-8"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                obterTodos();
            });            
        </script>
        <style>
            
            .box_itens{
                height: 300px;
                width: 300px;
                border: 1px solid #000;
                float:left;
                background-color: aliceblue;
    
            }
            .icones{
                height: 50px;
                width: 50px;
                margin-left: 35px;
                float: left;
                margin-top: 80%;
            }
            .line_input:hover{
                cursor: pointer;
            }
        
        </style>
    </head>
    <body>
        
        <?php require_once("cabecalho.php")?>
        <div id="main" >
            <div id="main_content">
                <?php require_once("menu.php") ?>
                <div class="title_content" style="float:none; padding-top:150px;">
                        Lista Produtos
                    </div>
                <div id="content" style="min-height:auto;">
                    
                    <!-- CONTEUDO: O conteudo esta sendo listado atravez da resposta que o js tem da controler-->
                    
                </div>
            </div>
        </div>
        <?php require_once("rodape.php") ?>
    </body>
</html>
