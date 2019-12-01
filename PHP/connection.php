<?php
define("SERVER", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "oficina");
define("PORT", 3306);

function connection()
{
    $conn = new mysqli(SERVER, USER, PASS, DB, PORT);
    mysqli_set_charset($conn, "utf8");
    return $conn;
    
    if (mysqli_connect_error()) {
        printf("Falha na conexão: %s\n", mysqli_connect_error());
        exit();
    }
}
