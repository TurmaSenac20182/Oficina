<?php
session_start();
include('ValidateClient.php');

if (!isset($_SESSION["usuario"]) && !isset($_SESSION["senha"])) {
    header("Location: index.php");
}
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
    <link rel="stylesheet" type="text/css" href="css/ClientPage.css" />
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
            <p class="TittleForm">Perfil do Cliente</p>
            <form action="FormClient2.php" method="POST">
                <fieldset class="col-md-12 FieldsetTittle">
                    <legend class="LegendTittle">Dados do Cliente</legend>
                    <!--<input type="text" class="SeparationForm" value="Dados do Cliente" readonly>-->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="IDNome">Nome Completo</label>
                            <input type="text" class="form-control" name="nome" id="IDNome" required maxlength="100">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="IDCpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="IDCpf" required onkeypress="mascara(this, '###.###.###-##')" onkeyup="OnlyNumbersCpfRG(this);" maxlength="14">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="IDRg">RG</label>
                            <input type="text" class="form-control" name="rg" id="IDRg" required onkeypress="mascara(this, '##.###.###-#')" onkeyup="OnlyNumbersCpfRG(this);" maxlength="12">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="IDEmail">Email</label>
                            <input type="email" class="form-control" name="email" required id="IDEmail" maxlength="50">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="IDResidencial">Telefone Residencial</label>
                            <input type="text" class="form-control" name="telefone" required id="IDResidencial" onkeypress="mascara(this, '## ####-####')" onkeyup="OnlyNumbersTel(this);" maxlength="12">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="IDCelular">Telefone Celular</label>
                            <input type="text" class="form-control" name="celular" required id="IDCelular" onkeypress="mascara(this, '## #####-####')" onkeyup="OnlyNumbersTel(this);" maxlength="13">
                        </div>
                    </div>
                </fieldset>
                <fieldset class="col-md-12 FieldsetTittle">
                    <legend class="LegendTittle">Endereço do Cliente</legend>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="cep">CEP</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cep" name="cep" onkeypress="mascara(this, '#####-###')" maxlength="9" pattern="\d{5}-?\d{3}" onkeyup="OnlyNumbers(this);">
                                <button type="button" class="button-cep" onclick="pesquisacep(cep.value);"><i class="fas fa-map-marked-alt fa-lg"></i></button>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="uf">Estado</label>
                            <select name="uf" id="uf" class="form-control" required>
                                <option selected>Selecione</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                                <option value="ET">Estrangeiro</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" maxlength="50" required name="cidade" id="cidade">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="rua">Logradouro</label>
                            <input type="text" class="form-control" maxlength="100" required name="logradouro" id="rua">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" maxlength="10" required name="numero" onkeyup="OnlyNumbers(this);" id="numero">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" maxlength="100" required name="complemento" id="complemento">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" maxlength="50" required name="bairro" id="bairro">
                        </div>
                    </div>
                </fieldset>

                <div id="elemento">
                    <fieldset class="col-md-12 FieldsetTittle">
                        <legend class="LegendTittle">Veículo do Cliente</legend>

                        <!--<div class="form-group col-md-12">
                            <button type="button" class="button-add" required onclick="duplicarCampos();"><i class="fas fa-plus-circle fa-lg"></i></button>
                        </div> -->

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="IDMarca">Marca</label>
                                <input type="text" class="form-control" required maxlength="30" name="marca" id="IDMarca">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="IDCarro">Modelo</label>
                                <input type="text" class="form-control" required maxlength="30" name="modelo" id="IDNome">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="IDCor">Cor</label>
                                <input type="text" class="form-control" required maxlength="30" name="cor" id="IDCor">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="IDPlaca">Placa</label>
                                <input type="text" class="form-control" required maxlength="7" name="placa" id="IDPlaca">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="IDAno">Ano</label>
                                <input type="text" class="form-control" required id="IDAno" name="ano" maxlength="4" onkeyup="OnlyNumbers(this);">
                            </div>
                        </div>
                    </fieldset>
                </div>

                <div id="destino"></div>

                <div class="ClassButton">
                    <button type="submit" name="registrar_cliente" class="btn btn-dark form-button btn-block">Alterar</button>
                    <!--<button type="reset" class="btn btn-info form-button">Limpar</button>-->
                </div>
            </form>
        </div>
    </div>

    <script src="js/AddCar.js"></script>
    <script src="js/ValidateCPF.js"></script>
    <script src="js/MaskCepTel.js"></script>
    <script src="js/OnlyNumbers.js"></script>
    <script src="js/ViaCep.js"></script>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>