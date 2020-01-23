<?php
Class Paciente{
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
    
    public function cadastrarPaciente($nome, $cpf, $rg, $endereco, $numero, $bairro, $complemento, $nascimento, $sexo, $cns, $mae, $ddd, $telefone, $dd, $telefonee, $obs, $dataa, $hora){
        global $pdo;
        //Verificar se já existe e-mail cadastrado
        $sql = $pdo->prepare("SELECT cpf FROM paciente WHERE  cpf = :c");
        $sql->bindValue(":c",$cpf);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false; //Já está cadastrada
        } else{ //caso não, cadastrar
            $sql = $pdo->prepare("INSERT INTO paciente (nome, cpf, rg, endereco, numero, bairro, complemento, nascimento, sexo, cns, mae, ddd, telefone, dd, telefonee, obs, dataa, hora)
                                               VALUES (:n, :c, :r, :e, :nu, :b, :co, :na, :s, :cn, :m, :d1, :t1, :d2, :t2, :o, :da, :hr)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":c", $cpf);
            $sql->bindValue(":r", $rg);
            $sql->bindValue(":e", $endereco);
            $sql->bindValue(":nu", $numero);
            $sql->bindValue(":b", $bairro);
            $sql->bindValue(":co", $complemento);
            $sql->bindValue(":na", $nascimento);
            $sql->bindValue(":s", $sexo);
            $sql->bindValue(":cn", $cns);
            $sql->bindValue(":m", $mae);
            $sql->bindValue(":d1", $ddd);
            $sql->bindValue(":t1", $telefone);
            $sql->bindValue(":d2", $dd);
            $sql->bindValue(":t2", $telefonee);
            $sql->bindValue(":o", $obs);
            $sql->bindValue(":da", $dataa);
            $sql->bindValue(":hr", $hora);
            $sql->execute();
            return true; //tudo ok!
        }
    }
    
    //Buscar dados do DB em forma de array
    public function buscarDadosPaciente($cpf){
        $cmd = $this->pdo->prepare("SELECT * FROM paciente where cpf = :c");
        $cmd->bindValue(":c", $cpf);
        $cmd->execute();
        $pacnt = $cmd->fetch();
        return $pacnt;
    }
}
?>