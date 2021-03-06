<?php
    require_once 'class/usuarios.php';
    $u = new Usuario("sigpts","localhost","root","");
?>

<?php
session_start();
    if (!isset($_SESSION["id_usuario"])){
        Header("Location: index.php");
    }
?>

<?php
    if(isset($_SESSION['id_usuario'])){
        require_once 'class/usuarios.php';
        $u = new Usuario("sigpts","localhost","root","");
    }

?><?php
    $dados = $u->buscarDados($_SESSION['id_usuario']);
    $nome = $dados["nome"];
    $email = $dados["email"];
//    var_dump($nome);

    $Nome = $dados["nome"];
    $primeiroNome = explode(" ", $nome);
     
    $nome = $primeiroNome[0];
    ?><?php
?>

<!DOCTYPE html>
<html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <title>SIGPTS</title>
        <link rel="shortcut icon" href="images/bus.ico" type="image/x-icon">
      <link type="text/css" rel="stylesheet" href="css/estilo.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/costume.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

<body class="grey lighten-2">
    <header>
        <nav class="teal lighten-2 z-depth-0">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="index.php" class="brand-logo white-text">SIGPTS</a>        
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger white-text"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="cadastro.php" class="white-text">Cadastro de Pacientes</a></li>
                        <li><a href="agendar.php" class="white-text">Agendar Passagem</a></li>
                        
                        <?php 
                            if($email == "raylanbsf.hpm@hotmail.com"){
                                echo('<li><a href="signup.php" class="white-text">Cadastrar Usuário</a></li>');
                            } 
                        ?>

                        <li><a href="#!" class="yellow-text"><?php echo($nome); ?></a></li>
                        <li><a href="sair.php" class="white-text"><i class="large material-icons">input</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
            <ul class="sidenav white" id="mobile-demo"><br>
                <div class="row center-align">
                    <li><a href="login.php"><img src="images/user.jpg"alt="" class="circle responsive-img" style="width: 50px;"></a></li>
                    <li><a href="#!"><?php echo($nome); ?></a></li>
                    <li><a href="cadastro.php">Cadastro de Pacientes</a></li>
                    <li><a href="agendar.php">Agendar Passagem</a></li>
                    <li><a href="sair.php" class="white-text"><i class="large material-icons">input</i></a></li>
                </div>
            </ul>
    </header>

    <div class="container grey lighten-4 z-depth-1 center" style="min-height: 550px">
      <h4 class="container grey-text darken center" style="padding-top:10px;"><strong>Lista</strong></h4>
        <br>
    </div>

    <footer id="page-footer" class="col l12 m12 s12 page-footer teal lighten-4 blue-text text-darken-2">
        <div class="teal lighten-5 footer-copyright">
        <div class="container blue-text text-darken-3">
            © DevBit 2020 - Direitos reservados!
            <a class="blue-text text-darken-3 right" href="https://github.com/BrenoItalo16">Desenvolvido por: Breno Italo</a>
        </div>
        </div>
    </footer>

    <!-- Materialize & JQuery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>


</body>
</html>
        