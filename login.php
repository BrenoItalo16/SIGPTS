<?php
session_start();
if(isset($_SESSION['id_usuario'])){
    session_destroy();
    Header("Location: login.php");
}
?>

<?php
    require_once 'class/usuarios.php';
    $u = new Usuario("sigpts","localhost","root","");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
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
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <div class="container">
        <div id="corpo-form">
            <h1>Entrar</h1>
            <form method="POST">
                <input type="text" name="loginn" placeholder="Insira seu login">
                <input type="password" name="senha" placeholder="Insira a Senha">
                <input type="submit" value="Acessar">
            </form>
        </div>
    </div>
<?php
    if(isset($_POST['loginn'])){
        $loginn = addslashes($_POST['loginn']);
        $senha = addslashes($_POST['senha']);

        //Verificar se esta preenchidos
            if(!empty($loginn) && !empty($senha)){
            //  $u->conectar("epiz_24468694_projeto_login","sql101.epizy.com","epiz_24468694","iJMh79rcSR3XQD");  //Para o host
                $u->conectar("sigpts","localhost","root","");  //Para a máquina
                if($u->msgErro == ""){
                    if($u->logar($loginn, $senha)){
                        Header("Location: index.php");
                    } else{
                        ?>
                        <div class="msg-erro">
                            Login e/ou senha estão incorretos!
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