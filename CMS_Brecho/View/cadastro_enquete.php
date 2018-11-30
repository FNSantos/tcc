<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>CMS Bernadete | Cadastro de Funcionário</title>
        <link type="text/css" rel="stylesheet" href="CSS/style.css">
        <link type="text/css" rel="stylesheet" href="CSS/style_enquete.css">
       
        <script src="JavaScript/jquery-3.3.1.js" charset="utf-8"></script>
        <script src="JavaScript/ajax_enquete_crud.js"></script>
        
        <script>
            $(document).ready(function(){
                numero = 0;
                numero = $("#id_enquete").val();
                
                console.log(numero);
                if(numero != 0){
                     obterUm();
                }else{
                    
                }
                
            });
        </script>
    </head>
    <body>
        <input id="id_enquete" type="hidden" value="<?php echo @$_GET['id'];?>">
        <?php require_once("cabecalho.php")?>
        <div id="main" style="height:2000px;">
            <div id="main_content">
                <?php require_once("menu.php") ?>
                <div id="content">
                    <div class="title_content" style="float:none;">
                        Cadastro Enquete
                    </div>
           
                    <div class="line_input" style="height:350px;width:300px;">
                        <div class="caixa_pergunta" style="height:350px;" >
                            <div class="title_input" style="width:300px;" >
                                Digite uma pergunta:
                            </div>
                            <textarea name="slt_pergunta" id="txt_pergunta" class="input_textarea" style="resize: none; width: 500px;font-size:24px;float:left;
                            height: 200px;" ></textarea>

                            <div class="title_input" style="font-family:Arial;font-size:16pt;">
                                Escolha um tipo de Avaliação
                            </div>

                            
                        </div>
                        <div class="select_avaliacao" id="slt_tipo2" >
                          
                        </div>
                        
                        <div class="line_input" style="width:550px;" >
                         <button name="btn_salvar" id="btn_salvar" class="buttons" >Salvar</button>
                        
                        </div>
                    </div>
                    
               
                    
                   
                </div>
            </div>
        </div>
        <?php require_once("rodape.php") ?>
    </body>
</html>
