  
<?php
  require('./crud.php');
  function setProduto($nm_produto, $qnt_produto, $preco_produto, $img_produto) {
    if(fnCreateProduto($nm_produto, $qnt_produto, $preco_produto, $img_produto)) {
      return true;
    }
    return false;
  }
  function updateProduto($id, $nm_produto, $qnt_produto, $preco_produto, $img_produto) {
    if(fnUpdateProduto($id, $nm_produto, $qnt_produto, $preco_produto, $img_produto)) {
      return true;
    }
    return false;
  }
  function getProdutos() {
    if($produtos = fnListProdutos()) {
      return $produtos;
    }
    return array();
  }
  function getProdutoById($id) {
    if($produto = fnFindProdutoById($id)) {
      return $produto;
    }
    return array();
  }
  function deleteProduto($id) {
    if(fnDeleteProduto($id)) {
      return true;
    }
    return false;
  }