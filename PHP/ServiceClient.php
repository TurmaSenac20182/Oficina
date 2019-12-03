<?php
session_start();
include('connection.php');
$conn = connection();

//Declarando as variáveis
$errors = array(
    "usuario_cadastrado" => "Usuário já cadastrado",
    "cpf_cadastrado" => "Cpf já cadastrado",
    "rg_cadastrado" => "Rg já cadastrado"
);

//Declarando para ser usado posteriormente.
$nome = "";
$cpf = "";
$rg = "";

if (isset($_POST['registrar_cliente'])) {
    // ->Receber os dados do formulário<-

    //Dados do Cliente
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
    $rg = mysqli_real_escape_string($conn, $_POST['rg']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telR = mysqli_real_escape_string($conn, $_POST['telefone']);
    $telC = mysqli_real_escape_string($conn, $_POST['celular']);

    //Endereço do cliente
    $cep = mysqli_real_escape_string($conn, $_POST['cep']);
    $estado = mysqli_real_escape_string($conn, $_POST['uf']);
    $cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
    $logradouro = mysqli_real_escape_string($conn, $_POST['logradouro']);
    $numero = mysqli_real_escape_string($conn, $_POST['numero']);
    $complemento = mysqli_real_escape_string($conn, $_POST['complemento']);
    $bairro = mysqli_real_escape_string($conn, $_POST['bairro']);

    //Carro do cliente
    $marca = mysqli_real_escape_string($conn, $_POST['marca']);
    $modelo = mysqli_real_escape_string($conn, $_POST['modelo']);
    $cor = mysqli_real_escape_string($conn, $_POST['cor']);
    $placa = mysqli_real_escape_string($conn, $_POST['placa']);
    $ano = mysqli_real_escape_string($conn, $_POST['ano']);

    //Bloquear que dados vazios sejam inseridos.
     if (empty($nome)) {
        array_push($errors, "");
        return false;
    }
    if (empty($cpf)) {
        array_push($errors, "");
        return false;
    }

    if (empty($rg)) {
        array_push($errors, "");
        return false;
    }
    if (empty($email)) {
        array_push($errors, "");
        return false;
    }
    if (empty($telR)) {
        array_push($errors, "");
        return false;
    }

    if (empty($telC)) {
        array_push($errors, "");
        return false;
    }

    if (empty($cep)) {
        array_push($errors, "");
        return false;
    }

    if (empty($estado)) {
        array_push($errors, "");
        return false;
    }

    if (empty($cidade)) {
        array_push($errors, "");
        return false;
    }

    if (empty($logradouro)) {
        array_push($errors, "");
        return false;
    }

    if (empty($numero)) {
        array_push($errors, "");
        return false;
    }

    if (empty($complemento)) {
        array_push($errors, "");
        return false;
    }

    if (empty($bairro)) {
        array_push($errors, "");
        return false;
    }

    if (empty($marca)) {
        array_push($errors, "");
        return false;
    }

    if (empty($modelo)) {
        array_push($errors, "");
        return false;
    }

    if (empty($cor)) {
        array_push($errors, "");
        return false;
    }

    if (empty($placa)) {
        array_push($errors, "");
        return false;
    }

    if (empty($ano)) {
        array_push($errors, "");
        return false;
    }

    /*function validarCPF($cpf)
  {
    //O primeiro é o padrão de pesquisa ( Oque ele irá pesquisar), o segundo('') é oque ele irá remover, e o terceiro é aonde irá pesquisar
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
    $digitoUm = 0;
    $digitoDois = 0;
    //para pegar os dados do cpf
    //O "$valor" vai servir para o decremento, ou seja, contar de 10 até 0. A "," serve para colocar mais de uma 'variavel' em uma condição e dizer oque quer que ele faça.
    for ($i = 0, $valor = 10; $i <= 8; $i++, $valor--) {
      $digitoUm += $cpf[$i] * $valor;
    }
    for ($i = 0, $valor = 11; $i <= 9; $i++, $valor--) {
      if (str_repeat($i, 11 == $cpf)) {  //"str_repeat" > verificar o valor que será repitido, e a quantidade que será repitida. 'A quantidade do valor do cpf, não poderá ser igual a 11. E não pode ser igual ao CPF'
        return false;
      }
      $digitoDois += $cpf[$i] * $valor;
    }
    //Para saber se o resto da divisão é menor do que dois.
    $calculoUm = (($digitoUm % 11) < 2) ? 0 : 11 - ($digitoUm % 11);
    $calculoDois = (($digitoDois % 11) < 2) ? 0 : 11 - ($digitoDois % 11);
    //Começar a fazer as validações e comparar os números com base no calculo do CPF
    if ($calculoUm <> $cpf[9] || $calculoDois <> $cpf[10]) {
      return false;
    }
    return true;
  }
  if (!validarCPF($cpf)) {
    return false;
  }*/


    //Verificar se o usuário já existe.
    $check_usuario = "select * from cliente where nome='{$nome}' or cpf='{$cpf}' or rg='{$rg}'";

    $result = mysqli_query($conn, $check_usuario);
    $user = mysqli_fetch_assoc($result);

    //Caso ele exista: diga que está uso.
    if ($user) {
        if ($user['nome'] === $nome) {
            array_push($errors, "Usuário já cadastrado");
            $_SESSION["usuario_existente"] = $errors["usuario_cadastrado"];
            return false;
        }
        if ($user['cpf'] === $cpf) {
            array_push($errors, "Cpf já cadastrado");
            $_SESSION["cpf_existente"] = $errors["cpf_cadastrado"];
            return false;
        }

        if ($user['rg'] === $rg) {
            array_push($errors, "Rg já cadastrado");
            $_SESSION["rg_existente"] = $errors["rg_cadastrado"];
            return false;
        }
    }
    //Para não permitir que o formulário seja enviado com erro ou vazio!
    $row = mysqli_num_rows($errors);

    if ($row == false) {
        header("location: FormClient.php");
    }

    //Caso não ocorra nenhum erro, permita que os dados sejam inseridos no banco.
    $usuario_cadastrado = "Cadastro realizado com sucesso!";

    if ($row == 0) {
        
        //Inserção de dados
        $query = "insert into dadoCarro (marca, modelo, cor, placa, anoCarro)
        values('{$marca}','{$modelo}', '{$cor}', '{$placa}', '{$ano}')";
        $result1 = mysqli_query($conn, $query);
        $idCarro = mysqli_insert_id($conn);

        $query2 = "insert into contato (tel1, tel2, email)
        values('{$telR}','{$telC}', '{$email}')";
        $result2 = mysqli_query($conn, $query2);
        $idContato = mysqli_insert_id($conn);

        $query3 = "insert into endereco (logradouro,numero,cep,bairro,cidade,uf,complemento)
        values('{$logradouro}','{$numero}', '{$cep}', '{$bairro}', '{$cidade}', '{$estado}', '{$complemento}')";
        $result3 = mysqli_query($conn, $query3);
        $idEndereco = mysqli_insert_id($conn);

        $query4 = "insert into cliente (nome, cpf, rg, carro_cliente, contato_cliente, endereco_cliente)
        values('{$nome}','{$cpf}', '{$rg}', '{$idCarro}', '{$idContato}', '{$idEndereco}')";
        $result4 = mysqli_query($conn, $query4);

        //Se todos os dados forem inseridos no banco, redirecione para Home.
        if ($result1 && $result2 && $result3 && $result4) {
            header('location: index.html');
            $_SESSION['cadastro_realizado'] = $usuario_cadastrado;
            die;
        //Caso contrário emita um erro.
        } else {
            echo "<script>alert('Falha ao cadastrar! <br> Verifique os dados e tente novamente.');</script>";
            header("location: FormClient.php");
        }
    }
}
