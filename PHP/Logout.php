<?php
session_start();
session_destroy();
?>
<?php
session_start();
$logout = "Você foi deslogado com Sucesso!";
$_SESSION['deslogado'] = $logout;
header('location: index.php');
exit;
?>