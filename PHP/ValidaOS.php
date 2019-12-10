<?php
include('connection.php');
$conn = connection();

//Declarando as variáveis
$errors = array(
    "servico_existente" => "Esta ordem de serviço já foi gerada!"
);

//Declarando para ser usado posteriormente.
$trabalho = "";
$descricao = "";

if (isset($_POST['registrar_os'])) {
    // ->Receber os dados do formulário<-

    //Dados do Cliente
    $funcionario = mysqli_real_escape_string($conn, $_POST['funcionario']);
    $trabalho = mysqli_real_escape_string($conn, $_POST['maoDeObra']);
    $valorServico = mysqli_real_escape_string($conn, $_POST['valorServico']);
    $dataEntrada = mysqli_real_escape_string($conn, $_POST['dataEntrada']);
    $dataSaida = mysqli_real_escape_string($conn, $_POST['dataSaida']);
    $valorTotal = mysqli_real_escape_string($conn, $_POST['valorTotal']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
    

    //Bloquear que dados vazios sejam inseridos.
    if (empty($funcionario)) {
        array_push($errors, "");
        return false;
    }
    if (empty($trabalho)) {
        array_push($errors, "");
        return false;
    }

    if (empty($valorServico)) {
        array_push($errors, "");
        return false;
    }
 
    if (empty($dataEntrada)) {
        array_push($errors, "");
        return false;
    }

    if (empty($dataSaida)) {
        array_push($errors, "");
        return false;
    } 

    if (empty($valorTotal)) {
        array_push($errors, "");
        return false;
    }

    if (empty($descricao)) {
        array_push($errors, "");
        return false;
    }


    //Verificar se já existe.
    $check = "select descricao, maoDeObra from servico where descricao = '{$descricao}' or maoDeObra ='{$trabalho}'";

    $result = mysqli_query($conn, $check);
    $user = mysqli_fetch_assoc($result);

    //Caso ele exista: diga que está uso.
    if ($user) {
        if (($user['descricao'] === $descricao) || ($user['maoDeObra'] === $trabalho)) {
            array_push($errors, "Esta ordem de serviço já foi gerada!");
            $_SESSION["servico_existente"] = $errors["servico_existente"];
            return false;
        }
    }
    //Para não permitir que o formulário seja enviado com erro ou vazio!
    $row = mysqli_num_rows($errors);

    if ($row == false) {
        header("location: FormOs.php");
    } 

    //Caso não ocorra nenhum erro, permita que os dados sejam inseridos no banco.

    $servico_cadastrado = "Ordem de Serviço cadastrada com sucesso!";

    if ($row == 0) {

        //Inserção de dados

        function insertServico($descricao, $trabalho, $valorServico)
        {
            $conn = connection();

            $query = "insert into servico (descricao, maoDeObra, valor)
            values('{$descricao}','{$trabalho}', '{$valorServico}')";

            if (mysqli_query($conn, $query)) {
                $_SESSION['idServico'] = mysqli_insert_id($conn);
                return  true;
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }

        function insertOS($funcionario, $dataEntrada, $dataSaida, $valorTotal)
        {
            $conn = connection();
            $idServico = $_SESSION['idServico'];

            $query2 = "insert into ordemServico (funcionario, dataEntrada, dataSaida, valorTotal, servico_ordemServ)
            values('{$funcionario}', '{$dataEntrada}', '{$dataSaida}', '{$valorTotal}', '{$idServico}')";

            if (mysqli_query($conn, $query2)) {
                return  true;
            } else {
                echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);

            unset($idServico);
        }

        if (insertServico($descricao, $trabalho, $valorServico)) { }
        if (insertOS($funcionario, $dataEntrada, $dataSaida, $valorTotal)) { }
    
        header('location: index.php');
        $_SESSION['os_realizada'] = $servico_cadastrado;
        die;

    }
}