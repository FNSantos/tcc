let rota = "../router.php"

let modo = ""

function inserir(){

  $.post(rota, {

    classe:"Tendencia",
    acao:"inserir",
    nome:$("#txtnome").val(),
    dtInicio:$("#txtDtInicio").val(),
    dtFinal:$("#txtDtFinal").val(),
    caminho_imagem:$("#foto").val(),
    idProduto:$("#combo_produtos").val(),

  }).done(function(dados){

    //alert(dados);


  })

}

function obterProdutos(){

    $.post(rota, {

        classe:"Tendencia",
        acao:"obterProdutos"

    }).done(function(dados){


        $("#combo_produtos").html(dados);

    });

}

$(document).ready(function(){
   // alert(dados);

   obterProdutos();
  $("#btn_salvar").click(function(){
    // alert(dados);
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
