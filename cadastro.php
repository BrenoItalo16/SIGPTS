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
    require_once 'class/funcionarios.php';
    $f = new Usuario("sigpts","localhost","root","");
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
                    <a href="index.php" class="brand-logo white-text">Cadastro</a>        
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger white-text"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="#!" class="white-text">Cadastro de Pacientes</a></li>
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
                    <li><a href="#!" class="yellow-text"><?php echo($nome); ?></a></li>
                    <li><a href="#!">Cadastro de Pacientes</a></li>
                    <li><a href="relatorio.php">Relatório</a></li>
                    <li><a href="sair.php" class="white-text">Sair</a></li>
                </div>
            </ul>
    </header>

    <div class="container grey lighten-4 z-depth-1 center" style="min-height: 550px">
      <h4 class="container grey-text darken center" style="padding-top:10px;"><strong>Cadastro de Pacientes</strong></h4>
            
   
                <form action="">

                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col l6 s12">
                                    <input id="first_name" type="text" class="validate" maxlength="40" size="40">
                                    <label for="first_name">Nome</label>
                                </div>
                                <div class="input-field col l3 s6">
                                    <input id="cpf" type="text" class="validate" maxlength="14" size="14">
                                    <label for="cpf">CPF</label>
                                    <span class="helper-text" data-error="wrong" data-success="right">Apenas números</span>
                                </div>
                                <div class="input-field col l3 s6">
                                    <input id="rg" type="text" class="validate" maxlength="10" size="10">
                                    <label for="rg">RG</label>
                                    <span class="helper-text" data-error="wrong" data-success="right">Apenas números</span>
                                </div>
                            </div>

                            <!--
                            <div class="row">
                                <div class="input-field col l6 s12">
                                    <input id="municipio" type="text" class="validate">
                                    <label for="municipio">Município</label>
                                </div>
                                <div class="input-field col l3  s12">
                                    <input id="uf" type="text" class="validate" maxlength="2" size="2">
                                    <label for="uf">UF</label>
                                </div>
                                <div class="input-field col l3 s12">
                                    <input id="cep" type="text" class="validate">
                                    <label for="cep">CEP</label>
                                </div>
                            </div>
                            -->
                            
                            <div class="row">
                                <div class="input-field col l10 s12">
                                    <input id="endereco" type="text" class="validate" maxlength="50" size="50">
                                    <label for="endereco">Endereço</label>
                                </div>
                                <div class="input-field col l2 s12">
                                    <input id="numero" type="text" class="validate" maxlength="10" size="10">
                                    <label for="numero">Número</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="input-field col l6 s12">
                                    <input id="bairro" type="text" class="validate" maxlength="30" size="30">
                                    <label for="bairro">Bairro</label>
                                </div>
                                <div class="input-field col l6 s12">
                                    <input id="complemento" type="text" class="validate" maxlength="30" size="30">
                                    <label for="complemento">Complemento</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="input-field col l4 s12">
                                    <input id="nascimento" type="text" class="validate" maxlength="10" size="10">
                                    <label for="nascimento">Data de Nascimento</label>
                                </div>
                                
                            <div class="col l4 s12">                                                
                                <label>Sexo</label>
                                <select class="browser-default">
                                    <option value="" disabled selected>Escolha o Sexo</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Feminino</option>
                                </select>
                            </div>

                            <div>
                                <div class="input-field col l4 s12">
                                    <input id="cns" type="text" class="validate" maxlength="18" size="18">
                                    <label for="cns">CNS</label>
                                </div>
                            </div>
                            
                            <div>
                                <div class="input-field col l12 s12">
                                    <input id="mae" type="text" class="validate" maxlength="40" size="40">
                                    <label for="mae">Nome da Mãe</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="input-field col l1 s1">
                                    <input id="ddd" type="number" class="validate" maxlength="3" size="3">
                                    <label for="ddd">DDD</label>
                                </div>
                                <div class="input-field col l5 s5">
                                    <input id="telefone" type="number" class="validate" maxlength="10" size="10">
                                    <label for="telefone">Telefone</label>
                                </div>
                                <div class="input-field col l1 s1">
                                    <input id="ddd2" type="number" class="validate" maxlength="3" size="3">
                                    <label for="ddd2">DDD</label>
                                </div>
                                <div class="input-field col l5 s5">
                                    <input id="telefone2" type="number" class="validate" maxlength="10" size="10">
                                    <label for="telefone2">Telefone 02</label>
                                </div>
                            </div>

                            <div class="row">
                                <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                    <textarea id="obs" class="materialize-textarea" maxlength="100" size="100"></textarea>
                                    <label for="obs">Observações</label>
                                    </div>
                                </div>
                                </form>
                            </div>



                            
                        </div>
                        <br>
                    </form>
                </div>
                    





            </div>
            <br>

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
        