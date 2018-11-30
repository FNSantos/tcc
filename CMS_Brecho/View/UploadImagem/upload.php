<?php 


    require_once("../../Model/ConexaoBanco.php");

    if(isset($_POST)){

        /* UPLOAD DE ARQUIVOS */
        //pegando o nome do arquivo a ser enviado para o servidor
        $arquivo = $_FILES['flefoto']['name'];

        //Pega o tamanho do arquivo
        $tamanho_arquivo = $_FILES['flefoto']['size'];

        //Transforma de bytes para kbytes (/1024) e arredonda o resultado do calculo tranzendo apenas a parte inteira
        $tamanho_arquivo =round($tamanho_arquivo/1024);

        //Pega a extensão do arquivo (strrchr)
        $ext_arquivo = strrchr($arquivo,".");

        //Pega apenas o nome do arquivo, sem a extensão 
        $nome_arquivo = pathinfo($arquivo,PATHINFO_FILENAME);

        /*  Criptografa   */
        $nome_arquivo = md5(uniqid(time()).$nome_arquivo);
        
        //Guarda o diretório que será feito o upload do arquivo
        $diretorio_arquivo = "arquivos/";

        //Vetor de dados contendo todas as extensões válidas para o upload de arquivo
        $arquivos_permitidos = array(".jpg",".png",".jpeg");

        //Verifica se a extensão do arquivo é permitida dentro do vetor de extensões válidas

        if(in_array($ext_arquivo,$arquivos_permitidos))
        {

            //Valida o tamanho do arquivo a ser enviado para o servidor    
           if($tamanho_arquivo<=2000)
           {
               $arquivo_tmp = $_FILES['flefoto']['tmp_name'];
               $foto = $diretorio_arquivo . $nome_arquivo . $ext_arquivo;


               if (move_uploaded_file($arquivo_tmp,$foto)){
                                  
                   
                   echo("<img height='400' width='400' src='UploadImagem/".$foto."'>");
                   
                   echo("<input id='caminho_foto' type='hidden' value='".$foto."'>");
                   

               }else{
                   echo("Não foi possível enviar o arquivo para o servidor");
               }


           }else{
               echo("Tamanho de arquivo inválido!");
           }

        }else{
            echo("Extensão Inválida!");
        }


    }
    
?>