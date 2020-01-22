<?php
    session_start();
    if (!isset($_SESSION["id_usuario"])){
        Header("Location: login.php");
    }

    require_once 'class/usuarios.php';
    $u = new Usuario("sigpts","localhost","root","");

    $dados = $u->buscarDados($_SESSION['id_usuario']);
    $nome = $dados["nome"];
    $email = $dados["email"];
    if($email != "raylanbsf.hpm@hotmail.com"){
        Header("Location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cadastro</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="shortcut icon" href="images/bus.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/estilo.css">
    </head>
<body>
    <header>
        <nav class="white lighten-2 z-depth-1">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="index.php" class="brand-logo deep-purple-text text-lighten-1" style="padding-left: 60px;">DevBit</a>
                    <img src="images/devbit_logo_purple.png" style="heigth: 50px; width: 50px; margin: 7px;" alt="devbit">
                    <ul class="right hide-on-med-and-down">
                        <li><a href="#!" class="deep-purple-text text-lighten-1">Sistema Integrado de Gerenciamento de Pacientes</a></li>
                        <li><a href="sair.php" class="deep-purple-text text-lighten-1"><i class="large material-icons">input</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <div id="corpo-form">
        <h1>Cadastrar</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="nome" placeholder="Nome" maxlength="30">
            <input type="email" name="email" placeholder="E-mail" maxlength="40">
            <input type="text" name="loginn" placeholder="Login" maxlength="30">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confirmSenha" placeholder="Confirmar Senha" maxlength="15">
            <input type="submit" value="Cadastrar">
            <a href="login.php">Já é inscrito? <strong>Acesse!</strong></a>
        </form>
    </div>

<?php
    //clicou no botão
    if(isset($_POST['nome'])){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $loginn = addslashes($_POST['loginn']);
        $senha = addslashes($_POST['senha']);
        $confirmSenha = addslashes($_POST['confirmSenha']);

        //Verificar se esta preenchido
        if(!empty($nome)&& !empty($email)&& !empty($loginn)&& !empty($senha)&& !empty($confirmSenha)){
        //  $u->conectar("epiz_24468694_projeto_login","sql101.epizy.com","epiz_24468694","iJMh79rcSR3XQD"); //Para uso na núvem
            $u->conectar("sigpts","localhost","root","");  //Para uso na máquina
                if($u->msgErro == ""){ //Se esta tudo ok
                    if($senha == $confirmSenha){
                        if($u->cadastrar($nome, $email, $loginn, $senha)){
                            ?>
                            <div id="msg-sucesso">
                                Cadastrado com sucesso! Acesse para entar!
                            </div>
                            <?php
                                $u->logar($email, $loginn, $senha);
                                Header("Location: index.php");

                            //Se o usuário se cadastrar com sucesso ele dever entrar no jogo imediatamente    
                            Header("Location: index.php");
                        }
                         else{
                            ?>
                            <div class="msg-erro">
                                Email já cadastrado!
                            </div>
                            <?php
                        }
                    } else{
                        ?>
                        <div class="msg-erro">
                            Os campos SENHA e CONFIRMAR SENHA não correspondem!
                        </div>
                        <?php
                    }

                } else{
                    ?>
                    <div class="msg-erro">
                        <?php echo "Erro: ".$u->msgErro;?>
                    </div>
                    <?php
                }
        } else{
            ?>
            <div class="msg-erro">
                Preencha todos os campos!
            </div>
            <?php
        }
    }
    
?>
</body>
</html>