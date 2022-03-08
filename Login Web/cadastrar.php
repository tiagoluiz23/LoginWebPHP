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
    <title>Projeto Login</title>
    <link rel="stylesheet" href="_css/estilo.css"/>
</head>
<body>
    <div id="corpo-form-cad">
        <h1>Cadastrar</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlenght="30">
            <input type="text" name="telefone" placeholder="Telefone"  maxlenght="30">
            <input type="email" name="email" placeholder="Usuário"  maxlenght="40">
            <input type="password" name="senha" placeholder="Senha" maxlenght="15">
            <input type="password" name="confSenha" placeholder="Confirmar Senha"  maxlenght="15">
            <input type="submit" value="Cadastrar">
        </form>
    <?php
        if(isset($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $confirmarSenha = addslashes($_POST['confSenha']);
            //verificar se esta preenchido
            if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){
                $u -> conectar("localhost","projeto_login","root","");
                if($u -> $msgErro == ""){ //se esta tudo ok
                    if($senha == $confirmarSenha){
                        if($u -> cadastrar($nome, $telefone, $email, $senha)){
                            ?>
                            <div id = "msg-sucesso">
                                <a href="login.php">Cadastrado com Sucesso! Acessar para Entrar!</a> 
                            </div>                            
                            <?php
                        }else{
                            ?>
                            <div class = "msg-erro">
                                Email já cadastrado!
                            </div>
                            <?php
                        }
                    }else{
                        ?>
                        <div class = "msg-erro">
                            Senha e confirmar senha não correspondem!
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
                    Preencha todos os Campos!
                </div>
                <?php
            }
        }
    ?>
    </div>
</body>
</html>