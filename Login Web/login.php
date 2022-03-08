<?php
    require_once '_classes/usuarios.php';
    $u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Projeto Login Web </title>
    <link rel="stylesheet" href="_css/estilo.css" />
</head>
<body>
    <div id="corpo-form">
    <h1>Entrar</h1>
    <form method="POST">
        <input type="email" name="email" placeholder="Usuário">
        <input type="password" name="senha" placeholder="Senha">
        <input type="submit" value="ACESSAR">
        <a href="cadastrar.php">Ainda não é inscrito? <strong>Cadastre-se!</strong></a>
    </form>
    <?php
        if(isset($_POST['email'])){
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            //verificar se esta preenchido
            if(!empty($email) && !empty($senha)){
                $u -> conectar("localhost","projeto_login","root","");
                if($u -> $msgErro == ""){ //se esta tudo ok
                    if($u -> logar($email, $senha)){
                        header("location: index.php");
                    }else{
                        ?>
                        <div class = "msg-erro">
                            Email e/ou Senha incorretos!
                        </div>
                        <?php
                    }
                }else{
                    ?>
                    <div class = "msg-erro">
                        <?php echo "Erro: ".$u -> $msgErro; ?>
                    </div> 
                    <?php
                }
            }else{
                ?>
                <div class = "msg-erro">
                    Preencha todos os campos
                </div>
                <?php
            }
        }
    ?>
    </div>
</body>
</html>

