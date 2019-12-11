<?php
include_once("connection.php");
$conn = connection();


function retorna($cpf, $conn){
	$sql = "SELECT * FROM VIEW_LISTA WHERE CPF = '$cpf' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	if($result->num_rows){
		$row = mysqli_fetch_assoc($result);
		$dados['idCliente'] = $row['IDCliente'];
		$dados['cpf'] = $row['CPF'];
		$dados['cliente'] = $row['Cliente'];
		$dados['placa'] = $row['Placa'];
	}else{
		$dados['cliente'] = 'Cliente não encontrado';
	}
	return json_encode($dados);
}

if(isset($_GET['cpf'])){
	echo retorna($_GET['cpf'], $conn);
}
?>