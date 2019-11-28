<?php
  #### ********************************************* ####
  #### ARQUIVO RESPONSÁVEL POR SERVIR AS REQUISIÇÕES ####
  #### ********************************************* ####
  #### *************WEBSERVICE PHP****************** ####
  #### ********************************************* ####
  #### ********************************************* ####
  
  ## Imports
  require('./funcoes.php');
  require('../http_response.php');
  ## Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  /*
  * INSERT REQUEST
  */
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto = json_decode(file_get_contents('php://input'), true);
    if(setProduto($produto['nm_produto'], $produto['qnt_produto'], $produto['preco_produto'], $produto['img_produto'])) {
      echo json_response(200, 'working');
    } else {
      echo json_response(500, 'Server Error! Please Try Again!');
    }
  /*
  * GET REQUEST
  */
  } else if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['id'])) {
      echo json_encode(getProdutoById($_GET['id']));
    } else {
      echo json_encode(getProdutos());
    }
  /*
  * UPDATE REQUEST
  */
  } else if($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $produto = json_decode(file_get_contents('php://input'), true);
    if(updateProduto($produto['id'], $produto['nm_produto'], $produto['qnt_produto'], $produto['preco_produto'], $produto['img_produto'])) {
      echo json_response(200, 'working');
    } else {
      echo json_response(500, 'Server Error! Please Try Again!');
    }
  /*
  * DELETE REQUEST
  */
  } else if($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = json_decode(file_get_contents('php://input'), true);
    if(deleteProduto($id['id'])) {
      echo json_response(200, 'working');
    } else {
      echo json_response(500, 'Server Error! Please Try Again!');
    }
  }