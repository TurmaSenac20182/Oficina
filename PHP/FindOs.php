<?php

$conn = connection();
$campo = "%" . $_POST['campo'] . "%";
$campo2 = "%" . $_POST['campo'] . "%";
$campo3 = "%" . $_POST['campo'] . "%";
$campo4 = "%" . $_POST['campo'] . "%";

$query = $link->prepare("select E, C, Cliente, Erro, Solução, Data, Sistema from VIEW_LISTA_ERROS where Erro like ? OR Sistema like ? OR Cliente like ? OR Solução like ?");
$query->bind_param('ssss', $campo, $campo2, $campo3,$campo4);
$query->execute();
$query->bind_result($idErros, $idCliente, $cliente, $erro, $solucao, $data, $sistema);
