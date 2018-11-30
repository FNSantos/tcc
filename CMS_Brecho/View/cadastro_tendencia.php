<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>CMS Bernadete | Comunidade</title>
        <link type="text/css" rel="stylesheet" href="CSS/style.css">
        <link type="text/css" rel="stylesheet" href="CSS/style_cadastro_tendencia.css">
        <script src="JavaScript/jquery-3.3.1.js"></script>
        <script src="JavaScript/ajax_tendencia_crud.js"></script>
    </head>
    <body>
        <?php require_once("cabecalho.php")?>
        <div id="main">
            <div id="main_content">
                <?php require_once("menu.php") ?>
                <div id="content_tendencia">
                    <div id="titulo_tendencia">Cadastro de tendencias</div>

                    <div id="dados">

                      <div id="campo_nome">
                        <div class="titulos">
                          Nome:
                        </div>
                        <input type="text" name="txtNome" id="caixa_txt_nome">
                      </div>

                      <div id="campo_dtInicio">
                        <div class="titulos">
                          Data de inicio:
                        </div>
                        <input type="datetime-local" name="txtDtInicio" id="caixa_txt_dtI">
                      </div>

                      <div id="campo_dtFinal">
                        <div class="titulos">
                          Data do fim:
                        </div>
                        <input type="datetime-local" name="txtDtFinal" id="caixa_txt_diF">
                      </div>

                      <div id="select_produto">
                        <div class="titulos">
                          Produtos:
                        </div>
                        <select name="combo_produtos" id="combo_produtos">
                        </select>
                      </div>

                    </div>

                    <div id="img">

                      <div id="caixa_img">

                      </div>

                      <div id="campo_img">
                        <form name="frmfotos" method="post" action="upload.php" enctype="multipart/form-data" id="frmfotos">
                            <div id="caixa_foto">Foto:<input type="file" name="flefoto" id="foto"></div>
                            <br><br>
                        </form>
                      </div>

                      <div id="botoes">
                        <input type="submit" name="btn_salvar" id="btn_salvar" value="Salvar">
                        <input type="button" name="btn_cancelar" id="btn_cancel" value="Cancelar">
                      </div>

                    </div>


                </div>
            </div>
        </div>
        <?php require_once("rodape.php") ?>
    </body>
</html>
