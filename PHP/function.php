<?php
    require 'connection.php';

    function retriveAllCli() {
        $con = connection();
        $query = 'select IDCliente, IDCarro, Cliente, CPF, Celular from VIEW_LISTA join contato as c where IDCliente = c.idContato';
        $resultado = mysqli_query($con, $query);
        
        $dados = array();

        while($registro = mysqli_fetch_assoc($resultado)) {
           array_push($dados, $registro);
        }
        return $dados;
    }

    function retriveAllOs() {
        $con = connection();
        $query = "select idOS, idCliente, idCarro, Funcionário, Nome_Cliente, Data_de_Entrada from VIEW_OS";
        $resultado = mysqli_query($con, $query);

        $dados = array();

        while($registro = mysqli_fetch_assoc($resultado)) {
           array_push($dados, $registro);
        }
        return $dados;
    }

    function retriveSingleCliPOS($id) {
        $con = connection();
        $query = "select IDCliente, Cliente, CPF, RG, Telefone, Celular, Email, CEP, Logradouro, Bairro, Numero, cidade, Estado, Complemento, Marca, Modelo, Cor, Placa, Ano from VIEW_LISTA where IDCliente = $id";
        $resultado = mysqli_query($con, $query);
        
        $dados = array();

        while($registro = mysqli_fetch_assoc($resultado)) {
           array_push($dados, $registro);
        }
        return $dados;
    }
    
    function retriveSingleOsPOS($id) {
        $con = connection();
        $query = "select idOS, idCliente, Nome_Cliente, CPF_Cliente, Placa_Veiculo, Funcionário, Mão_de_Obra, Data_de_Entrada, Data_de_Saida, Valor_do_Servico, Valor_Total, Descrição from VIEW_OS where idOS = $id";
        $resultado = mysqli_query($con, $query);

        $dados = array();

        while($registro = mysqli_fetch_assoc($resultado)) {
           array_push($dados, $registro);
        }
        return $dados;
    }

    function updateCli($id, $nome, $cpf, $rg, $carro, $contato, $endereco) {
        $con = connection();
        $query = "update cliente set nome = '$nome', cpf = '$cpf', rg = '$rg', carro_cliente = $carro, contato_cliente = $contato, endereco_cliente = $endereco where id = $id";
        mysqli_query($con, $query);

        return $query;
    }    

    function updateOsTRY($idOS, $funcionario, $maoDeObra, $valorServico, $saida, $total, $desc) {
        $con = connection();
        $query = "update ordemservico as o join cliente as c on o.cliente_ordemServ = c.idCliente set servico_ordemServ = $servico, funcionario = '$funcionario', dataSaida = '$saida', maoDeObra = $maoDeObra, valorTotal, des = $total where id = $idOS";
        mysqli_query($con, $query);

        return $query;
    }  

    function getIDSOS() {
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $idOS = $_GET['O'];
            $idCliente = $_GET['C'];
            $idCarro = $_GET['D'];

            $OS = retriveSingleOsPOS($idOS);

            return $OS;
        }
    }
    
    function getIDSCli() {
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $idCliente = $_GET['C'];
            $idCarro = $_GET['D'];

            $cli = retriveSingleCliPOS($idCliente);

            return $cli;
        }
    }

    function tryFimOS($idOS, $funcionario, $maoDeObra, $valorServico, $saida, $total, $desc) {
        $upOS = updateOsTRY($idOS, $funcionario, $maoDeObra, $valorServico, $saida, $total, $desc);
        
        $error = mysqli_error($upOS);

        $linhas = mysqli_num_rows($error);

        if($linhas == 0) {
            updateButtonTrue();
            return true;
        } else {
            return $error;
        }
    }

    function updateButtonTrue($idOS) {
        $con = connection();
        $query = "update ordemServico set finalizada = 1 where idordemServico = $idOS";

        $result = mysqli_query($con, $query);
        
        $erros = mysqli_error($result);

        if($erros >= 1) {
            $msg = "Error na finalização da ordem. Erro:" . $erros;
            return $msg;
        } else {
            return true;
        }
    }

    function verifClose() {
        $con = connection();
        $query = "select finalizada from ordemservico";
        $result = mysqli_query($con, $query);

        if($result === 1) {
            return true;
        } else {
            return false;
        }
    }   
