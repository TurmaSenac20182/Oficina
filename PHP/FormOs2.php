<?php
session_start();
include('ValidaOS.php');

$dados = getIDS();
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["senha"])) {
    header("Location: index.php");
}

    $isClose = verifClose();

    if($isClose) {
        $req = "readonly";
        $btnT = "Ordem já finalizada";
        $btn = "disabled";
    } else {
        $req = "";
        $btnT = "Finalizar";
        $btn = "";
    }
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Marzo mecânica</title>
    <script src="jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/OsPage.css" />
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
                        <a class="dropdown-item" href="ListClient.php">Clientes</a>
                        <a class="dropdown-item" href="ListOs.php">Ordens de serviço</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="ContainerClass">
        <div class="container-fluid">
            <p class="TittleForm">Finalizar ordem de serviço</p>
            <?php foreach ($dados as $os) { ?>
                <form action="testaOS2.php" method="POST">
                    <fieldset class="col-md-12 FieldsetTittle">
                        <legend class="LegendTittle">Ordem de Serviço</legend>
                        <div class="form-group">
                            <div class="form-row">
                                <input type="hidden" name="idCliente">
                                <input type="hidden" name="idCarro">
                                <input type="hidden" name="idOS" value="<?= $os['idOS'] ?>">

                                <div class="form-group col-md-4">
                                    <label for="IDCpf">CPF</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="IDCpf" name="cpf" value="<?= $os['CPF_Cliente'] ?>" required onkeypress="mascara(this, '###.###.###-##')" readonly onkeyup="OnlyNumbersCpfRG(this);" maxlength="14">
                                        <button type="button" id="btn-cpf" disabled class="button-cep"><i class="fas fa-search-plus fa-lg"></i></button>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="IDCliente">Cliente</label>
                                    <input type="text" class="form-control" readonly name="cliente" id="IDCliente" value="<?= $os['Nome_Cliente'] ?>" maxlength="15" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="IDVeiculo">Veículo</label>
                                    <input type="text" class="form-control" readonly name="placa" id="IDVeiculo" value="<?= $os['Placa_Veiculo'] ?>" maxlength="50" required>
                                </div>


                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="IDFuncionaro">Nome do Funcionário</label>
                                    <input type="text" class="form-control" name="funcionario" <?=$req?> id="IDFuncionaro" value="<?=$os['Funcionário']?>" required maxlength="100">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="IDMaoDeObra">Trabalho Realizado</label>
                                    <input type="text" class="form-control" readonly name="maoDeObra" id="IDMaoDeObra" value="<?= $os['Mão_de_Obra'] ?>" required maxlength="100">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="IDValorServico">Valor do Serviço</label>
                                    <input type="text" class="form-control" name="valorServico" <?=$req?> id="IDValorServico" value="<?= $os['Valor_do_Servico'] ?>" required maxlength="100" onkeyup="OnlyNumbers(this);">
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="IDDataEntrada">Data de Entrada</label>
                                    <input type="date" class="form-control" readonly name="dataEntrada" value="<?= $os['Data_de_Entrada'] ?>" readonly required id="IDDataEntrada">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="IDDataSaida">Data de Saída</label>
                                    <input type="date" class="form-control" name="dataSaida" <?=$req?> value="<?= $os['Data_de_Entrada'] ?>" required id="IDDataSaida">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="IDValorTotal">Valor Total</label>
                                    <input type="text" class="form-control" name="valorTotal" <?=$req?> value="<?= $os['Valor_do_Servico'] ?>" required id="IDValorTotal" maxlength="100" onkeyup="OnlyNumbers(this);">
                                </div>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="IDDescricao">Descrição do Serviço</label>
                                <textarea class="form-control" name="descricao" id="IDDescricao" <?=$req?> required rows="5"><?= $os['Descrição'] ?></textarea>
                            </div>
                        </div>
        </div>
        </fieldset>

        <div class="ClassButton">
            <button type="submit" <?=$btn?> name="registrar_os" class="btn btn-dark form-button btn-block"><?=$btnT?></button>
            <!--<button type="reset" class="btn btn-info form-button">Limpar</button>-->
        </div>
        </form>
    <?php  } ?>
    </div>
    </div>




    <script src="jquery/SearchClient.js"></script>

    <script src="jquery/validate.js"></script>

    <script src="js/MaskCepTel.js"></script>

    <script src="js/OnlyNumbers.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>