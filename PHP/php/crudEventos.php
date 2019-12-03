<? 
  include 'connection.php';

Create ($data,$evento )

  function create($data, $evento) {
    $conn = getConnection();

    // definindo a query SQL com a chamada(call) da stored procedure
    $query = "INSERT INTO evento ('title', 'start' ) VALUES ('$nome', '$data')";

    mysqli_query($conn, $query);

    if(!$conn) {
      mysqli_close($conn);
    }
  }
  ?>