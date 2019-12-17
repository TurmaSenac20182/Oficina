<?php
include('connection.php');
$conn = connection();

//Declarando as variáveis
$errors = array(
    "usuario_existente" => "Este usuário já existe!",
    "senhas_diferentes" => "As senhas não correspondem",
);

//Declarando para ser usado posteriormente.
$usuario = "";
$senha = "";

if (isset($_POST['registrar_funcionario'])) {
    // ->Receber os dados do formulário<-

    $nome_funcionario = mysqli_real_escape_string($conn, $_POST['nome_funcionario']);
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $senha2 = mysqli_real_escape_string($conn, $_POST['senha2']);


    //Bloquear que dados vazios sejam inseridos.
    if (empty($nome_funcionario)) {
        array_push($errors, "");
        return false;
    }

    if (empty($usuario)) {
        array_push($errors, "");
        return false;
    }

    if (empty($senha)) {
        array_push($errors, "");
        return false;
    }

    if ($senha != $senha2) {
        array_push($errors, "As senhas não correspondem");
        $_SESSION["senhas_diferentes"] = $errors["senhas_diferentes"];
        return false;
    }

    //Verificar se já existe.
    $check = "select *from funcionario where usuario = '{$usuario}'";

    $result = mysqli_query($conn, $check);
    $user = mysqli_fetch_assoc($result);

    //Caso ele exista: diga que está uso.
    if ($user) {
        if ($user['usuario'] === $usuario) {
            array_push($errors, "Este usuário já existe!");
            $_SESSION["usuario_existente"] = $errors["usuario_existente"];
            return false;
        }
    }
    //Para não permitir que o formulário seja enviado com erro ou vazio!
    $row = mysqli_num_rows($errors);

    if ($row == false) {
        header("location: Register.php");
    }

    //Caso não ocorra nenhum erro, permita que os dados sejam inseridos no banco.

    $funcionario_cadastrado = "Funcionário cadastrado com sucesso!";
    $senha_cript = password_hash($senha, PASSWORD_DEFAULT);

    if ($row == 0) {
        //Inserção de dados

        function insertFuncionario($nome_funcionario, $usuario, $senha_cript)
        {
            $conn = connection();

            $query = "insert into funcionario (nomeFuncionario, usuario, senha)
            values('{$nome_funcionario}','{$usuario}', '{$senha_cript}')";

            if (mysqli_query($conn, $query)) {
                return  true;
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }

        if (insertFuncionario($nome_funcionario, $usuario, $senha_cript)) {
        }

        header('location: index.php');
        $_SESSION['funcionario_cadastrado'] = $funcionario_cadastrado;
        die;
    }
}
