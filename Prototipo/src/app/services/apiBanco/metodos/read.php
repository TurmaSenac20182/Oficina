<?php
/**
 * Returns the list of policies.
 */
require 'database.php';

$dadoscarro = [];
$sql = "SELECT id FROM dadoCarro";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $dadoCarro[$i]['id']    = $row['id'];
    $dadoCarro[$i]['modelo'] = $row['modelo'];
    $dadoCarro[$i]['cor'] = $row['cor'];
    $dadoCarro[$i]['placa'] = $row['placa'];
    $dadoCarro[$i]['anoCarro'] = $row['anoCarro'];
    $i++;
  }

  echo json_encode($dadoCarro);
}
else
{
  http_response_code(404);
}