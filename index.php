<?php
session_start();
    if (!isset($_SESSION["id_usuario"])){
        Header("Location: login.php");
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
                        <li><a href="relatorio.php" class="white-text">Relatório</a></li>
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
                    <li><a href="relatorio.php">Relatório</a></li>
                    <li><a href="sair.php">Sair</a></li>
                </div>
            </ul>
    </header>

    <div class="container grey lighten-4 z-depth-1 center" style="min-height: 550px">
      <h4 class="container grey-text darken center" style="padding-top:10px;"><strong>Busca</strong></h4>
        <br>




        <?php
         require_once 'class/pacientes.php';
         $p = new Paciente("sigpts","localhost","root","");
         if (isset($_POST['cpf'])){
            $paciente = $p->buscarDadosPaciente($_POST['cpf']);
            }        
         
        ?>

            <div class="row">
                <div class="col s12 m6">
                    <form  method="POST" class="col s12">                        
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                                <span class="card-title">Inserir Paciente</span>
                                <div class="row">
                                    <div class="input-field col l12 s12">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input id="cpf" name="cpf" type="text" class="validate" maxlength="14" size="14" style="color: white;">
                                        <label for="cpf">
                                            <?php
                                                if (isset($_POST['cpf'])){
                                                    if($paciente["cpf"] == $_POST['cpf']){
                                                        echo $paciente['nome'];
                                                    } else{
                                                        echo "Paciente não cadastrado";
                                                    }
                                                }else{
                                                    echo "CPF";
                                                }
                                            ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="">

                            <?php
                                if (isset($_POST['cpf'])){
                                    if($paciente["cpf"] == $_POST['cpf']){
                                        echo '<a href="relatorio.php" class="btn waves-effect green waves-light"">Inserir na Lista
                                              <i class="large material-icons right">send</i>
                                              </a>';
                                    } else{
                                        echo '<button href="cadastro.php" class="btn waves-effect blue waves-light"">Cadastrar Paciente
                                              <i class="large material-icons right">add</i>
                                              </button>';
                                    }
                                }else{
                                    echo '<button href="cadastro.php" class="btn waves-effect waves-light"" 
                                          type="submit" name="acao" value="cadastrar">Buscar
                                          <i class="large material-icons right">send</i>
                                          </button>';
                                }
                            ?>

                        <!--    <button class="btn waves-effect waves-light" type="submit" name="acao" value="cadastrar">
                                    <i class="large material-icons right">send</i>
                                </button>
                        -->    </div>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
                



                
                    <?php
             //         $paciente = $p->buscarDadosPaciente();
             //             var_dump($paciente["cns"]);
                    ?>
                
                <!--
                <div class="col s12 m6">
                    <form  method="POST" class="col s12" enctype="multipart/form-data" action="busca">
                        <div class="card purple darken-2">
                            <div class="card-content white-text">
                                <span class="card-title">Agendar Passagem</span>
                                <div class="row">
                                    <div class="input-field col l12 s12">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input id="cpfb" type="text" class="validate" maxlength="14" size="14" style="color: white;">
                                        <label for="cpfb">CPF</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn waves-effect waves-light" type="submit" name="buscar" value="buscar">Buscar
                                    <i class="large material-icons right">search</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div> -->

    </div>

<?php
    if(isset($_POST['cpf'])){
        $cpf = addslashes($_POST['cpf']);

        echo $cpf;



        //Verificar se esta preenchido
        if(!empty($cpf)){
        //  $u->conectar("epiz_24468694_projeto_login","sql101.epizy.com","epiz_24468694","iJMh79rcSR3XQD"); //Para uso na núvem
            $u->conectar("sigpts","localhost","root","");  //Para uso na máquina
            if($p->msgErro == ""){ //Se esta tudo ok
                $p->buscarDadosPaciente($cpf);  
                ?>
                    <div class="msg-erro">
                        Conexão Bem Sucedida!
                    </div>
                <?php

            } else{
                ?>
                    <div class="msg-erro">
                        Erro de Acesso ao Banco de Dados!
                    </div>
                <?php
            } 
        }else{
            ?>
                <div class="msg-erro">
                    O Campo CPF é obrigatórios!
                </div>
            <?php
        }
    }
?>

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
        