<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: index.php");
        exit;
    }
?>
FUNCIONOU TROUXA!!!!!!
<a href="sair.php">Sair!</a>
