<?php
  require_once('../connection.php');
  function fnCreateProduto($nm_produto, $qnt_produto, $preco_produto, $img_produto) {
    $link = getConnection();
    $query = "insert into tb_produto values(null, '{$nm_produto}', '{$qnt_produto}', '{$preco_produto}', '{$img_produto}')";
    if(!mysqli_query($link, $query)) {
      throw new \Exception("Error ao gravar", 1);
      return false;
    }
    return true;
  }
  function fnListProdutos() {
    $link = getConnection();
    $query = "select * from tb_produto";
    $rs = mysqli_query($link, $query);
    $viagens = array();
    while($row = mysqli_fetch_assoc($rs)) {
      array_push($viagens, $row);
    }
    return $viagens;
  }
  function fnFindProdutoById($id){
    $link = getConnection();
    $query = "select * from tb_produto where id = {$id}";
    $rs = mysqli_query($link, $query);
    return mysqli_fetch_assoc($rs);
  }
  
  function fnUpdateProduto($id, $nm_produto, $qnt_produto, $preco_produto, $img_produto) {
    $link = getConnection();
    $query = "update tb_produto set nm_produto = '{$nm_produto}', qnt_produto = '{$qnt_produto}', preco_produto = '{$preco_produto}', img_produto = '{$img_produto}' where id = {$id}";
    mysqli_query($link, $query);
    if(!mysqli_query($link, $query)) {
      throw new \Exception("Error ao atualizar", 1);
      return false;
    }
    return true;
  }
  function fnDeleteViagem($id){
    $link = getConnection();
    $query = "delete from tb_produto where id = {$id}";
    mysqli_query($link, $query);
    if(!mysqli_query($link, $query)) {
      throw new \Exception("Error ao excluir", 1);
      return false;
    }
    return true;
  }