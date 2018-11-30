<?php

  require_once("ConexaoBanco.php");
  require_once("Tendencia.php");

  class TendenciaDAO{

    public function inserir(Tendencia $tendencia){

      $conexao = ConexaoBanco::obterConexao();

      $SQL = "INSERT INTO tbl_tendencia(nome, data_inicio, data_fim, caminho_imagem, id_produto)
      VALUES (?, ?, ?, ?, ?)";

      $stm = $conexao->prepare($SQL);

      $stm->bindValue(1, $tendencia->getNome());
      $stm->bindValue(2, $tendencia->getDtInicio());
      $stm->bindValue(3, $tendencia->getDtFinal());
      $stm->bindValue(4, $tendencia->getCaminho_imagem());
      $stm->bindValue(5, $tendencia->getIdProduto());

      $envio = $stm->execute();

      $conexao = null;

      if($envio){

          return true;

      } else {

          return false;

      }

    }

    public function obterUm($idTendencia){

      $conexao = ConexaoBanco::obterConexao();

      $SQL = "SELECT * FROM tbl_tendencia WHERE id_tendencia = ?";

      $stm = $conexao->prepare($SQL);

      $stm->bindParam(1, $idTendencia);

      $stm->execute();

      $stm->setFetchMode(PDO::FETCH_ASSOC);

      $resultSet = $stm->fetch();

      $conexao = null;

      return $resultSet;


    }

    public function obterTodos(){

      $listaTendecias = array();

      $conexao = ConexaoBanco::obterConexao();

      $SQL = "SELECT * FROM tbl_tendencia";

      $stm = $conexao->prepare($SQL);

      $stm->execute();

      $stm->setFetchMode(PDO::FETCH_ASSOC);

      while($resultSet = $stm->fetch()){

          $tendencia = new Tendencia();

          $tendencia->setIdTendencia($resultSet["id_tendencia"]);
          $tendencia->setNome($resultSet["nome"]);
          $tendencia->setDtInicio($resultSet["data_inicio"]);
          $tendencia->setDtFinal($resultSet["data_fim"]);
          $tendencia->setCaminhoImagem($resultSet["caminho_imagem"]);
          $tendencia->setIdProduto($resultSet["id_produto"]);

          $listaTendecias[] = $tendencia;

      }

      $conexao = null;

      return $listaTendecias;

    }

    public function obterProdutos(){

      $conexao = ConexaoBanco::obterConexao();

      $listaProdutos = array();

      $SQL = "SELECT nome FROM tbl_produto";

      $stm = $conexao->prepare($SQL);

      $stm->execute();

      $stm->setFetchMode(PDO::FETCH_ASSOC);

      while($resultSet = $stm->fetch()){

          $tendencia = new Tendencia();

          $tendencia->setIdProduto($resultSet["idProduto"]);
          $tendencia->setNome($resultSet["nome"]);


          $listaProdutos[] = $tendencia;

      }

      $conexao = null;

      return $listaProdutos;

    }

    public function atualizar(Tendencia $tendencia){

      $conexao = ConexaoBanco::obterConexao();

      $SQL = "UPDATE tbl_tendencia SET nome = ?, data_inicio = , data_fim = ?, caminho_imagem = ?, id_produto = ? WHERE id_tendencia = ? ";

      $stm = $conexao->prepare($SQL);

      $stm->bindValue(1, $tendencia->getNome());
      $stm->bindValue(2, $tendencia->getDtInicio());
      $stm->bindValue(3, $tendencia->getDtFinal());
      $stm->bindValue(4, $tendencia->getCaminho_imagem());
      $stm->bindValue(5, $tendencia->getIdProduto());

      $envio = $stm->execute();

      $conexao = null;

      if($envio){

          return true;

      } else {

          return false;

      }

    }

    public function remover($idTendencia){

      $conexao = ConexaoBanco::obterConexao();

      $SQL = "DELETE FROM tbl_tendencia WHERE id_tendencia = ?";

      $stm = $conexao->prepare($SQL);

      $stm->bindParam(1, $idTendencia);

      $envio = $stm->execute();

      $conexao = null;

      if($envio){

          return true;

      } else {

          return false;

      }

    }

  }

?>
