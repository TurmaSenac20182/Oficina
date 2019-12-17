<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Marzo mecânica</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/Login.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
                <?php if (isset($_SESSION["deslogado"])) : ?>
                    <?php $deslogado = $_SESSION["deslogado"]; ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center; margin-top: 10px;">
                        <strong><?php echo $deslogado; ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php unset($_SESSION["deslogado"]); ?>
                    </div>
                <?php endif ?>
                <form action="login.php" class="login100-form validate-form flex-sb flex-w" method="POST">
                    <span class="login100-form-title p-b-32">
                        Acesso de Funcionários
                    </span>

                    <span class="txt1 p-b-11">
                        Usuário
                    </span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate="Login é Obrigatório">
                        <input class="input100" type="text" name="usuario">
                        <span class="focus-input100"></span>
                    </div>

                    <span class="txt1 p-b-11">
                        Senha
                    </span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate="Senha é Obrigatória">
                        <input class="input100" type="password" name="senha">
                        <span class="focus-input100"></span>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn btn-block">
                            Entrar
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <script src="js/ValidateLogin.js"></script>
    <!--===============================================================================================-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--===============================================================================================-->


</body>

</html>