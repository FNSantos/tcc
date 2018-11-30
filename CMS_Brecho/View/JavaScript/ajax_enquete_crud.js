let rota = "../router.php"

let modo = ""

function obterAutenticacao(){

    $.post(rota, {

        classe:"funcionario",
        acao:"obterAutenticacao"

    }).done(function(dados){

        if(dados == ""){

            document.location.href = "http://localhost/CMS_Brecho/";

        }

    });

}

function inserir(){
    
    tipoAva = $('#slt_tipo option:selected').val();

    $.post(rota, {

        classe:"Enquete",
        acao:"inserir",
        pergunta:$("#txt_pergunta").val(),
        tipodeAvaliacao:tipoAva
        
    }).done(function(dados){

        alert("SUCESSO");

        obterTodos();

        window.location.href="adm_enquete.php"; 
    });

}

function obterTodos(){

    $.post(rota, {

        classe:"Enquete",
        acao:"obterTodos"

    }).done(function(dados){

        $("#content_enquete").html(dados);

    });

}

function obterUm(idEnquete){

    $.post(rota, {

        classe:"Enquete",
        acao:"obterUm",
        id:$("#id_enquete").val()

    }).done(function(dados){

        let enquete = JSON.parse(dados);

        $("#txt_pergunta").val(enquete["pergunta"]);
        
            $('select#slt_tipo').find('option').each(function() {
            if($(this).val() == enquete["id_tipo"]){
                $(this).attr('selected', true);
            }
        });
      
        modo = "atualizar";
    });

}


function atualizarSituacao(id, situacao){

    $.post(rota, {

        classe:"Enquete",
        acao:"atualizarSituacao",
        id:id,
        situacao: (situacao == 1 ? 0 : 1)

    }).done(function(dados){

        // alert(dados);

        obterTodos();

    });

}


function atualizar(idEnquete){

    resposta = $("#slt_tipo").val();
 
   
      
    $.post(rota, {

        classe:"Enquete",
        acao:"atualizar",
        pergunta:$("#txt_pergunta").val(),
        idTipo:resposta,
        id:$("#id_enquete").val()
      

    }).done(function(dados){
       // alert(dados);
        obterTodos();
        modo = "inserir";
        
        window.location.href="adm_enquete.php";
    });

}

function obterTipos(id){

    $.post(rota, {

        classe:"Avaliacao",
        acao:"obterTipos",
        id:id
        

    }).done(function(dados){
      
        $(".select_avaliacao").html(dados);

    });

}


function remover(idEnquete){

    $.post(rota, {

        classe:"Enquete",
        acao:"remover",
        idEnquete: idEnquete

    }).done(function(dados){

        obterTodos();

    });

}

$(document).ready(function(){

    obterTipos();
    obterTodos();

    $("#btn_salvar").click(function(){

        if(modo == "atualizar"){

            atualizar();

        } else {

            inserir();

        }

    });

});
