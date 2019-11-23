<?php
require 'database.php';

function update( $idCarro, $marca, $modelo, $cor, $placa, $anoCarro) {
  $con = getConnection();

  // definindo a query SQL para ser disparada para banco
  $query = "update dadoCarro set marca = '{$marca}', modelo = '{$modelo}', cor = '{$cor}', placa = '{$placa}', anoCarro = '{$anoCarro}' where id = {$idCarro}";

  mysqli_query($con, $query);

  if(!$con) {
    mysqli_close($con);
  }
}
}