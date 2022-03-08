<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="_css/estilo.css"/>
</head>
<body>
    <div id="corpo-form">
        <h1>FUNCIONOU!!!!!!</h1>
        <a href="sair.php">Sair!</a></br>
        <a href="contato.php">Contato</a>
    </div>
</body>
</html>

