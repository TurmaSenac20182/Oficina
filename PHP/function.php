<?php
    require 'connection.php';

    function retriveAllCli() {
        $con = connection();
        $query = 'select idCliente, nome, cpf, contato_cliente from cliente';
        mysqli_query($con, $query);
        
        return $query;
    }

    function retriveAllOs() {
        $con = connection();
        $query = "select idordemServico, funcionario, cliente_ordemservico from ordemservico";
        mysqli_query($con, $query);
        
        return $query;
    }

    function retriveSingleCli($id) {
        $con = connection();
        $query = "select * from cliente where id = $id";
        mysql_query($con, $query);

        return $query;
    }
    
    function retriveSingleOs($id) {
        $con = connection();
        $query = "select * from ordemservico where id = $id";
        mysql_query($con, $query);

        return $query;
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

