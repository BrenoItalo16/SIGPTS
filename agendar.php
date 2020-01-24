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
                        <li><a href="#!" class="white-text">Relatório</a></li>
                        
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
                    <li><a href="relatorio.php">Relatório</a></li>
                    <li><a href="sair.php" class="white-text"><i class="large material-icons">input</i></a></li>
                </div>
            </ul>
    </header>

    <div class="container grey lighten-4 z-depth-1 center" style="min-height: 550px">
            <!-- <h4 class=" grey-text darken center" style="padding-top:10px;"><strong>Cadastro de Pacientes</strong></h4> -->

                    <div class="row">

                        <form  method="POST" class="col s12" enctype="multipart/form-data">
                        <h4 class="blue-grey-text">Agendar Passagem</h4>
                            <div>
                            <div class="row">
                                <div class="input-field col l6 m6 s6">
                                    <input id="vagas" name="vaga" type="text" class="validate" maxlength="40" size="40">
                                    <label for="vagas">Quantidade de Vagas</label>
                                </div>
                                <div class="input-field col l6 m6 s6">
                                    <input id="datav" name="datav" type="text" class="validate" maxlength="14" size="14">
                                    <label for="datav">Data da Viagem</label>
                                </div>
                            </div>

                            <div class="col s12 m12 l5">
                                <div class="row card-panel grey lighten-4">
                                    <label class="col s4 m4 l4">
                                        <input name="vinda" value="Ida" type="checkbox" />
                                        <span>Ida</span>
                                    </label>
                                    <div class="col"></div>
                                    <label class="col s4 m4 l4">
                                        <input name="ida" value="Vinda" type="checkbox" />
                                        <span>Vinda</span>
                                    </label>
                                </div>    
                            </div>
                            <div class="col s1 m1 l1"></div>

                            <div class="col s12 m12 l6">
                                <div class="row card-panel grey lighten-4">
                                    <label class="col s3 m3 l3">
                                        <input name="cidade[]" value="Natal" type="radio" />
                                        <span>Natal</span>
                                    </label>
                                    <div class="col"></div>
                                    <label class="col s3 m3 l3">
                                        <input name="cidade[]" value="Mossoró" type="radio" />
                                        <span>Mossoró</span>
                                    </label>
                                    </label>
                                    <div class="col"></div>
                                    <label class="col s3 m3 l3">
                                        <input name="cidade[]" value="Ipanguaçu" type="radio" />
                                        <span>Ipanguaçu</span>
                                    </label>
                                </div>    
                            </div>

                            <div class="row">
                                <div class="input-field col l12 s12">
                                    <input id="parada" name="parada" type="text" class="validate" maxlength="50" size="50">
                                    <label for="parada">Parada do Ônibus</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col l10 s12">
                                    <input id="local" name="local" type="text" class="validate" maxlength="50" size="50">
                                    <label for="local">Local da Consulta</label>
                                </div>

                                <div class="input-field col l2 s12">
                                    <input id="horaconsulta" name="horaconsulta" type="text" class="validate" maxlength="50" size="50">
                                    <label for="horaconsulta">Hora da Consulta</label>
                                </div>
                            </div>
                            
                            


                                
                                <?php
                                if(isset($_POST['acao']) && $_POST['acao'] == "cadastrar"){

                                    if(!empty($_POST['group1'])){
                                        $sex = $_POST['group1'];
                                        foreach($sex as $value){
                                            $_POST['sexo'] = $value;   
                                        } //foreach
                                    } //empty    
                                } //isset
                                ?>
                            </div>
                            </div>                           
                            
                            </div>
                            <br>
                            
                            <div class="fixed-action-btn">
                                <button class="btn waves-effect waves-light" type="submit" name="acao" value="cadastrar">Cadastrar Paciente
                                    <i class="large material-icons right">send</i>
                                </button>
                            </div>
                                

                                
                            <br>
                            <br>
                        </form>
                        <!--Final do Form-->
                    </div>

            </div>
            <br>

            <?php
                //clicou no
                date_default_timezone_set('America/Fortaleza');
                $_POST['dataa'] = date("d.m.y");
                $_POST['hora'] = date('H:i:s');
                
                if(isset($_POST['nome'])){
                    $nome = addslashes($_POST['nome']);
                    $cpf = addslashes($_POST['cpf']);
                    $rg = addslashes($_POST['rg']);
                    $endereco = addslashes($_POST['endereco']);
                    $numero = addslashes($_POST['numero']);
                    $bairro = addslashes($_POST['bairro']);
                    $complemento = addslashes($_POST['complemento']);
                    $nascimento = addslashes($_POST['nascimento']);
                    $sexo = addslashes($_POST['sexo']);
                    $cns = addslashes($_POST['cns']);
                    $mae = addslashes($_POST['mae']);
                    $ddd = addslashes($_POST['ddd']);
                    $telefone = addslashes($_POST['telefone']);
                    $dd = addslashes($_POST['dd']);
                    $telefonee = addslashes($_POST['telefonee']);
                    $obs = addslashes($_POST['obs']);
                    $dataa = addslashes($_POST['dataa']);
                    $hora = addslashes($_POST['hora']);

                    //Verificar se esta preenchido
                    if(!empty($nome)&& !empty($cpf)){
                    //  $u->conectar("epiz_24468694_projeto_login","sql101.epizy.com","epiz_24468694","iJMh79rcSR3XQD"); //Para uso na núvem
                        $u->conectar("sigpts","localhost","root","");  //Para uso na máquina
                        if($p->msgErro == ""){ //Se esta tudo ok
                            $p->cadastrarPaciente($nome, $cpf, $rg, $endereco, $numero, $bairro,$complemento, $nascimento, $sexo, $cns, $mae, $ddd, $telefone, $dd, $telefonee, $obs, $dataa, $hora);  
                            ?>
                                <div class="msg-erro">
                                    Paciente Cadastrado com Sucesso!
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
                                Os Campos Nome e CPF são obrigatórios!
                            </div>
                        <?php
                    }
                }
            ?>

    <footer class="col l12 m12 s12 page-footer teal lighten-4 blue-text text-darken-2">
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
        