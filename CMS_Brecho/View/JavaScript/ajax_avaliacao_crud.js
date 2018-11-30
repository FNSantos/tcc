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

        classe:"Avaliacao",
        acao:"inserir",
        avaliacao:$("#txt_avaliacao").val(),
        tipodeAvaliacao:tipoAva

    }).done(function(dados){

        // alert(dados);

        $("#txt_nome").val("");

        obterTodos();

    });

}

function obterTodos(){

    $.post(rota, {

        classe:"Avaliacao",
        acao:"obterTodos"

    }).done(function(dados){

        $("#list_levels").html(dados);

    });

}

function obterUm(idTipo){

    // alert("!!!!!!!!!!!");

    $.post(rota, {

        classe:"Avaliacao",
        acao:"obterUm",
        id:idTipo
    }).done(function(dados){

        // alert(dados);

        let nivel = JSON.parse(dados);

        $("#txt_nome").val(nivel["nome"]);

        $("#btn_cancelar").css({"display":"block"});

        modo = "atualizar";

        $("#btn_salvar").html("Atualizar");

    })

}


function obterTipos(){

    $.post(rota, {

        classe:"Avaliacao",
        acao:"obterTipos"

    }).done(function(dados){

        $(".select_avaliacao").html(dados);

    });

}


function atualizar(){

    $.post(rota, {

        classe:"Avaliacao",
        acao:"atualizar",
        nome:$("#txt_nome").val()

    }).done(function(dados){

        // alert(dados);

        obterTodos();

        $("#txt_nome").val("");

        $("#btn_cancelar").css({"display":"none"});

        $("#btn_salvar").html("Inserir");

        modo = "inserir"

    });

}

function atualizarSituacao(id, situacao){

    $.post(rota, {

        classe:"Avaliacao",
        acao:"atualizarSituacao",
        id:id,
        situacao: (situacao == 1 ? 0 : 1)

    }).done(function(dados){

        // alert(dados);

        obterTodos();

    });

}

function remover(idTipo){

    $.post(rota, {

        classe:"Avaliacao",
        acao:"remover",
        id: idTipo

    }).done(function(dados){

        obterTodos();

    });

}

$(document).ready(function(){
    
    obterTipos();
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