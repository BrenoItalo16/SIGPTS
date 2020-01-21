<?php
Class Funcionario{
    private $pdo;
    public $msgErro = ""; //tudo ok
    public function __construct($nome, $host, $usuario, $senha){
        global $pdo;
        try{
            $this->pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e){
            $msgErro = $e->getMessage();
        }
    }
    
    public function cadastrar($nome, $email, $loginn, $senha){
        global $pdo;
        //Verificar se já existe e-mail cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuario WHERE  email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false; //Já está cadastrada
        } else{ //caso não, cadastrar
            $sql = $pdo->prepare("INSERT INTO usuario (nome, email, loginn, senha) VALUES (:n, :e, :l, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":l", $loginn);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            return true; //tudo ok!
        }
    }
    
    //Buscar dados do DB em forma de array
    public function buscarDados($id){
        $cmd = $this->pdo->prepare("SELECT * FROM usuario where id_usuario = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        $dados = $cmd->fetch();
        return $dados;
    }
    
    //Salva o score da sessão no DB
    public function salvarTema($tema){
        $sql = $this->pdo->prepare("UPDATE usuario set tema = :t where id_usuario = :u");
        $sql->bindValue(":t",$_SESSION['tema']);
        $sql->bindValue(":u", $_SESSION['id_usuario']);
        $sql->execute();
        return $tema;
    }
}
?>