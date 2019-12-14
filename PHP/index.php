<?php session_start();?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Marzo mecânica</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <form action="login.php" class="login100-form validate-form flex-sb flex-w" method="POST">
                    <span class="login100-form-title p-b-32">
                        Acesso de Funcionários
                    </span>

                    <span class="txt1 p-b-11">
                        Usuário ou Email
                    </span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate="Login é Obrigatório">
                        <input class="input100" type="text" name="funcionario">
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



    <!--===============================================================================================-->
    <script src="jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/ValidateLogin.js"></script>

</body>

</html>