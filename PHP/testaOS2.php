<?php 
    require 'function.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idOS = $_POST['idOS'];
        $idCli = $_POST['funcionario'];
        $idCarro = $_POST['funcionario'];
        $funcionario = $_POST['funcionario'];
        $maoDeObra = $_POST['maoDeObra'];
        $valorServico = $_POST['valorServico'];
        $saida = $_POST['dataSaida'];
        $total = $_POST['valorTotal'];
        $desc = $_POST['descricao'];

        $dados = tryFimOS($idOS, $idCli, $idCarro, $funcionario, $maoDeObra, $valorServico, $saida, $total, $desc);
    }
