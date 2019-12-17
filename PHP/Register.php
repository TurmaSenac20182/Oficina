<?php
session_start();
include('ValidateFuncionario.php');
    /*
    if (!isset($_SESSION["usuario"]) && !isset($_SESSION["senha"])) {
        header("Location: index.php");
        }*/
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Marzo mecânica</title>
    <!--===============================================================================================-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--===============================================================================================-->
    <script src="jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/Register.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--===============================================================================================-->

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home.php"><img src="images/LogoB2.png" width="60px" height="45px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="formulario-cliente"><i class="fas fa-user-plus fa-md"></i> Cliente</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="FormOs.php"><i class="fas fa-paste fa-md"></i> Novo Serviço</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fab fa-searchengin fa-md"></i> Consultas</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="ListClient.php">Clientes</a>
                        <a class="dropdown-item" href="ListOs.php">Ordens de serviço</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="ContainerClass">
        <div class="container-fluid">

            <p class="TittleForm">Cadastro de Funcionarios</p>

            <?php if (isset($_SESSION["usuario_existente"])) : ?>
                <?php $erro_cadastro = $_SESSION["usuario_existente"]; ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center;">
                    <strong><?php echo $erro_cadastro; ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php session_destroy(); ?>
                </div>
            <?php endif ?>

            <form action="Register.php" method="POST">
                <fieldset class="col-md-12 FieldsetTittle">
                    <legend class="LegendTittle">Dados do Funcionário</legend>
                    <!--<input type="text" class="SeparationForm" value="Dados do Cliente" readonly>-->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="IDNome">Nome Completo</label>
                            <input type="text" class="form-control" name="nome_funcionario" id="IDNome" required maxlength="100">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="IDUsuario">Usuário</label>
                            <input type="text" class="form-control" name="usuario" id="IDUsuario" required maxlength="50">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="IDSenha">Senha</label>
                            <input type="password" class="form-control" name="senha" id="IDSenha" required maxlength="15">
                        </div>
                    </div>
                </fieldset>

                <div class="ClassButton">
                    <button type="submit" name="registrar_funcionario" class="btn btn-dark form-button">Cadastrar</button>
                    <button type="reset" class="btn btn-info form-button">Limpar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="js/ValidateCPF.js"></script>
    <script src="js/MaskCepTel.js"></script>
    <script src="js/OnlyNumbers.js"></script>
    <script src="js/ViaCep.js"></script>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>