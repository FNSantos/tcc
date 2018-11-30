<?php

  require_once("model/Tendencia.php");
  require_once("model/TendenciaDAO.php");

  session_start();

  class TendenciaControl{

    public function inserir(){

      $tendencia = new Tendencia();
      $tendenciaDAO = new TendenciaDAO();

      $tendencia->setNome($_POST["nome"]);

      $dt = explode("/",$data_inicio);
      $data_inicio = $dt[2]."-".$dt[1]."-".$dt[0];

      $tendencia->setDtInicio($_POST["data_inicio"]);
      $tendencia->setDtFinal($_POST["data_fim"]);
      $tendencia->setCaminhoImagem($_POST["caminho_imagem"]);
      $tendencia->setIdProduto($_POST["id_produto"]);

      $tendenciaDAO->inserir($tendencia);

    }

    public function obterProdutos(){

      $tendencia = new TendenciaDAO();

      $listaProdutos = array();

      $listaProdutos = $tendenciaDAO->obterProdutos();

      echo("<option value='0'>Selecione um Filtro</option>");

      foreach($listaFiltros as $filtro){

          echo("<option value='".$tendencia->getIdProduto()."'>".$tendencia->getNome()."</option>");

      }


  }
}

?>
