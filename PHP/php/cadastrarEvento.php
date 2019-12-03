<?php 

include "connection.php";
                            
        $evento = $_POST["nome"];
        $data = $_POST["data"];        
        

        Create ($data,$evento){

            // definindo a query SQL com a chamada(call) da stored procedure
            $query = "insert into evento(title, data) values ('{$evento}', '{$data}')";
        
            mysqli_query($conn, $query);
        
            if(!$conn) {
              mysqli_close($conn);
            }
          }
?>