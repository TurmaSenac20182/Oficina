<?php
SESSION_start();
include('connection.php');
$conn = connection();

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
    header("location: index.php");
    exit;
}

$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$email = mysqli_real_escape_string($conn, $_POST['usuario']);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$query = "select *from funcionario where login='{$usuario}' or email='{$email}'";
$result = mysqli_query($conn, $query);

$error = "Login ou Senha incorretos!";

if ($result) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($senha, $row['senha'])) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $row['senha'];

        $_SESSION['idUsuario'] = $row['idFuncionario'];

        header('Location: home.php');
        exit;
        
    } else {
        unset($_SESSION['usuario']);
        unset($_SESSION['email']);
        unset($_SESSION['senha']);

        $_SESSION["invalido"] = $error;
        header("location: index.php");
    }
}
