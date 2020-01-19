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
                        <li><a href="#!" class="white-text">Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>
            <ul class="sidenav white" id="mobile-demo"><br>
                <div class="row center-align">
                    <li><a href="login.php"><img src="images/user.jpg"alt="" class="circle responsive-img" style="width: 50px;"></a></li>
                    <li><a href="#!">User</a></li>
                    <li><a href="cadastro.php">Cadastro de Pacientes</a></li>
                    <li><a href="#!">Relatório</a></li>
                    <li><a href="#!">Sair</a></li>
                </div>
            </ul>
    </header>

    <div class="container grey lighten-4 z-depth-1 center" style="min-height: 550px">
      <h4 class="container grey-text darken center" style="padding-top:10px;"><strong>Cadastro de Pacientes</strong></h4>
            
        <div class="row">
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-image">
                        <img src="images/barra.png">
                        <span class="card-title">Cadastrar Paciente</span>
                        <a href="cadastro.php" class="btn-floating halfway-fab waves-effect waves-light blue"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <i class="material-icons">info_outline</i>
                        <p>É necessário conter todos os dados do paciente para poder cadastrá-lo.</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card">
                    <div class= "card-image">
                        <img src="images/barra.png">
                        <span class="card-title">Editar Paciente</span>
                        <a class="btn-floating halfway-fab waves-effect waves-light orange"><i class="material-icons">edit</i></a>
                    </div>
                    <div class="card-content">
                        <i class="material-icons">info_outline</i>
                        <p>Cuidado ao editar um paciente pois os dados anteriores serão perdidos.</p>
                    </div>
                </div>
            </div>
        </div>
            
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

</body>
</html>
        