<?php session_start();
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);

?>
<header>
    <div id="header_content">
        <div id="icon">
            <img src="Imagens/logo_brecho.png" alt="Logo do Brechó Bernadete">
        </div>
        <div id="title_cms">
            <span class="title_font">
                CMS - Brechó Bernadete
            </span>
        </div>
        <div id="login">
            <div id="login_text">
                Bem vindo <br>
                <?=$_SESSION["nome"]?>
            </div>
            <a href="../index.php">
                <div id="logout_icon">
                    <img src="Imagens/icone_desconectar.png" alt="Desconectar do CMS">
                </div>
            </a>
        </div>
    </div>
</header>
<?php
	

?>
