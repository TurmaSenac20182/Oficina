<?php
include_once("connection.php");
    function retorna($cpf, $conn){
        $result_cliente = "selese CPF, Cliente, Placa from VIEW_LISTA where CPF = '$cpf' LIMIT 1";
        $resultado_cliente = mysqli_query($conn, $result_cliente);

        if($resultado_cliente->num_rows){
            $row_cliente = mysqli_fetch_assoc($resultado_cliente);
            $valores['cliente'] = $row_cliente['Cliente'];
            $valores['placa'] = $row_cliente['Placa'];
        }else{
            $valores['cliente'] = 'Cliente não encontrado';
        }
        return json_encode($valores);
    }
    
    if(isset($_GET['cpf'])){
        echo retorna($_GET['cpf'], $conn);
    }
