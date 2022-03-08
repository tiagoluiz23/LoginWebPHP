<?php
    class Usuario{
        //variaveis
        private $pdo;
        public $msgErro = "";
        //metodos
        public function conectar($host, $nome, $usuario, $senha){
            global $pdo;
            global $msgErro;
            try{
                $pdo = new PDO("mysql:host=".$host.";dbname=".$nome, $usuario, $senha);
            }catch(PDOException $e){
                $msgErro = $e -> getMessage();
            }    
        }

        public function cadastrar($nome, $telefone, $email, $senha){
            global $pdo;
            //verificar se o usuario ja esta cadastrado
            $sql = $pdo -> prepare("SELECT id FROM usuarios WHERE email = :e");
            $sql -> bindValue(":e", $email);
            $sql -> execute();
            if($sql -> rowCount() > 0){
                return false; //ja tem cadastrado
            }else{
                //Caso não , então vai cadastrar
                $sql = $pdo -> prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
                $sql -> bindValue(":n", $nome);
                $sql -> bindValue(":t", $telefone);
                $sql -> bindValue(":e", $email);
                $sql -> bindValue(":s", md5($senha));
                $sql -> execute();
                return true;
            }  
        }

        public function logar($email, $senha){
            global $pdo;
            //Verificar se email e senha estao cadastrados, se sim
            $sql = $pdo -> prepare("SELECT id FROM usuarios WHERE email = :e AND senha = :s");
            $sql -> bindValue(":e", $email);
            $sql -> bindValue(":s", md5($senha));
            $sql -> execute();
            if($sql -> rowCount() > 0){
                //entrar no sistema(sessao)
                $dado = $sql -> fetch();
                session_start();
                $_SESSION['id'] = $dado['id'];
                return true;
            }else{
                return false;
            }
        }

        public function cadContato($nome, $email, $msg){
            global $pdo;
            $sql = $pdo -> prepare("INSERT INTO contatos (nome, email, mensagem) VALUES (:n, :e, :m)");
            $sql -> bindValue(":n", $nome);
            $sql -> bindValue(":e", $email);
            $sql -> bindValue(":m", $msg);
            $sql -> execute(); 
            return true;
        }
    }
?>