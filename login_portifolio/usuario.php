<?php

class Usuario
{
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try{
            $pdo = new PDO('mysql:dbname='.$nome, $usuario, $senha);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrar($nome, $telefone, $email, $senha)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT usuario_id FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount()>0)
        {
            return false; //email já cadastrado
        }
        else
        {

        $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
        $sql->bindValue(":n",$nome);
        $sql->bindValue(":t",$telefone);
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        return true; //tudo ok
        }
    }

    public function logar($email, $senha)
    {
        global $pdo;

        //verificar se o email e a senha estão cadastrados, se sim
        $sql = $pdo->prepare("SELECT usuario_id FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount()>0){

            //entrar no sistema
            $dado = $sql->fetch();
            session_start();
            $_SESSION['usuario_id'] = $dado['usuario_id'];
            return true;//usuário cadastrado
        }
        else{
            return false; //não foi possível logar
        }
    }
}

?>