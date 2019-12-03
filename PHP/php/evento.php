<?php
        include "connection.php";
    
    $consulta = $conn->query("SELECT * FROM evento;"); 
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
        //echo "Nome: {$linha['nome']} - E-mail: {$linha['email']}<br />";
        $vetor[] = $linha;
     }
    //Passando vetor em forma de json
    echo json_encode($vetor);
    
?>