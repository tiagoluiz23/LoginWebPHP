<?php
    require_once '_classes/usuarios.php';
    $u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="_css/estilo.css"/>
</head>
<body>
    <div id="corpo-form">
        <h1>Contato</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="*Nome Completo" maxlenght="30">
            <input type="text" name="email" placeholder="*Email" maxlenght="40">
            <input type="text" name="mensagem" placeholder="Mensagem" maxlenght="50">
            <input type="submit" Value="Enviar">
        </form>    
        <?php
            if(isset($_POST['nome'])){
                $nome = addslashes($_POST['nome']);
                $email = addslashes($_POST['email']);
                $msg = addslashes($_POST['mensagem']);
                //verificar se esta preenchido
                if(!empty($nome) && !empty($email)){
                    $u -> conectar("localhost","projeto_login","root","");
                    if($u -> cadContato($nome, $email, $msg)){
                        ?>
                        <div id = "msg-sucesso">
                            <a href="index.php">Seu contato foi salvo! Entraremos em Contato!</a> 
                        </div>                            
                        <?php
                    }  
                }else{
                    ?>
                    <div class = "msg-erro">
                        Preencha os Campos Obrigatórios!
                    </div>
                    <?php
                }
            }
        ?>
    </div>
</body>
</html>