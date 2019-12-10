<?php
    require 'connection.php';

    function retriveAllCli() {
        $con = connection();
        $query = 'select c.idCliente, c.nome, c.cpf, t.cel from cliente as c join contato as t on c.idCliente = idContato';
        $resultado = mysqli_query($con, $query);
        
        $dados = array();

        while($registro = mysqli_fetch_assoc($resultado)) {
           array_push($dados, $registro);
        }
        return $dados;
    }

    function retriveAllOs() {
        $con = connection();
        $query = "select idordemServico, funcionario from ordemservico;";
        $resultado = mysqli_query($con, $query);

        $dados = array();

        while($registro = mysqli_fetch_assoc($resultado)) {
           array_push($dados, $registro);
        }
        return $dados;
    }

    function retriveSingleCli($id) {
        $con = connection();
        $query = "select * from cliente where id = $id";
        mysqli_query($con, $query);
        
        $dados = array();

        while($registro = mysqli_fetch_assoc($resultado)) {
           array_push($dados, $registro);
        }
        return $dados;
    }
    
    function retriveSingleOs($id) {
        $con = connection();
        $query = "select * from ordemservico where id = $id";
        mysqli_query($con, $query);

        $dados = array();

        while($registro = mysqli_fetch_assoc($resultado)) {
           array_push($dados, $registro);
        }
        return $dados;
    }

    function updateCli($id, $nome, $cpf, $rg, $carro, $contato, $endereco) {
        $con = connection();
        $query = "update cliente set nome = '$nome', cpf = '$cpf', rg = '$rg', carro_cliente = $carro, contato_cliente = $contato, endereco_cliente = $endereco where id = $id";
        mysql_query($con, $query);

        return $query;
    }    

    function updateOs($id, $cliente, $carro, $servico, $funcionario, $entrada, $saida, $maoDeObra, $total) {
        $con = connection();
        $query = "update ordemservico set cliente_ordemServ = $cliente, carro_ordemServ = $carro, servico_ordemServ = $servico, funcionario = '$funcionario', dataEntrada = '$entrada', dataSaida = '$saida', maoDeObra = $maoDeObra, valorTotal = $total where id = $id";
        mysql_query($con, $query);

        return $query;
    }  
