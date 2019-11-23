<?php
require 'database.php';

create($marca, $modelo, $cor, $placa, $anoCarro) {   

    $query = "insert into dadoCarro(marca, modelo, cor, placa, anoCarro) values(?, ?, ?, ?, ?)";
    mysqli_query($con, $query);
    if(!$con) {
      mysqli_close($con);
    }
  }