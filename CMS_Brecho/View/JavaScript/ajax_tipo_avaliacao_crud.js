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

    $.post(rota, {

        classe:"TipoAvaliacao",
        acao:"inserir",
        nome:$("#txt_nome").val()

    }).done(function(dados){

        // alert(dados);

        $("#txt_nome").val("");

        obterTodos();

    });

}

function obterTodos(){

    $.post(rota, {

        classe:"TipoAvaliacao",
        acao:"obterTodos"

    }).done(function(dados){

        $("#list_levels").html(dados);

    });

}



function obterUm(idTipoAvaliacao){

    // alert("!!!!!!!!!!!");

    $.post(rota, {

        classe:"TipoAvaliacao",
        acao:"obterUm",
        id:idTipoAvaliacao

    }).done(function(dados){

        // alert(dados);

        let TipoAvaliacao = JSON.parse(dados);

        $("#txt_nome").val(nivel["nome"]);

        $("#btn_cancelar").css({"display":"block"});

        modo = "atualizar";

        $("#btn_salvar").html("Atualizar");

    })

}

function atualizar(){

    $.post(rota, {

        classe:"TipoAvaliacao",
        acao:"atualizar",
        tipo:$("#txt_nome").val()

    }).done(function(dados){

        // alert(dados);

        obterTodos();

        $("#txt_nome").val("");

        $("#btn_cancelar").css({"display":"none"});

        $("#btn_salvar").html("Inserir");

        modo = "inserir"

    });

}


function remover(idTipoAvaliacao){

    $.post(rota, {

        classe:"TipoAvaliacao",
        acao:"remover",
        id: idTipoAvaliacao

    }).done(function(dados){

        obterTodos();

    });

}

$(document).ready(function(){
    
    
    obterAutenticacao();

    obterTodos();

    $("#btn_salvar").click(function(){

        if(modo == "atualizar"){

            atualizar();

        } else {

            inserir();

        }

    });

    $("#btn_cancelar").click(function(){

        if(modo == "atualizar"){

            modo = "";
            $("#btn_salvar").html("Inserir");
            $("#btn_cancelar").css({"display":"none"});
            $("#txt_nome").val("");

        }

    });

});