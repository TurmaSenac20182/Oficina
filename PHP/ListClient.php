<!doctype html>
<html lang="pt-br">

<head>
    <?php require "function.php";
    $dados = retriveAllCli() ?>
    <meta charset="utf-8">
    <title>Marzo mecânica</title>

    <!--===============================================================================================-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/ListClientPage.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--===============================================================================================-->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><img src="images/LogoB2.png" width="60px" height="45px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="FormClient.php"><i class="fas fa-user-plus fa-md"></i> Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="FormOs.php"><i class="fas fa-paste fa-md"></i> Novo Serviço</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fab fa-searchengin fa-md"></i> Consultas</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <!--  <a class="dropdown-item" href="lista-cliente">Clientes</a> -->
                        <a class="dropdown-item" href="ListOs.php">Ordens de serviço</a>
                        
                    </div>
                </li>

            </ul>
            <form  class="form-inline my-2 my-lg-0" action="FindClient.php" method="POST" onsubmit="return false;">
                    <input class="form-control mr-sm-2" name="campo" id="campo" type="search" placeholder="Pesquisar" aria-label="Search">
                </form>
        </div>
    </nav>


    <div class="limiter" id="resultado">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100">
                    <table>
                        <thead>
                            <tr class="table100-head">
                                <th class="column1">ID</th>
                                <th class="column2">NOME</th>
                                <th class="column3">CPF</th>
                                <th class="column4">TELEFONE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dados as $lista) { ?>
                                <tr>
                                    <td class="column1"><button class="columnButton"><?= $lista['idCliente'] ?></button></td>
                                    <td class="column1"><button class="columnButton"><?= $lista['nome'] ?></button></td>
                                    <td class="column1"><button class="columnButton"><?= $lista['cpf'] ?></button></td>
                                    <td class="column1"><button class="columnButton"><?= $lista['cel'] ?></button></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="jquery/jquery-3.2.1.min.js"></script>
    <script src="jquery/validate.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</body>

</html>