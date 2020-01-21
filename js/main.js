//Inicializadores do Materialize
$(document).ready(function(){
    $('.modal').modal();
  });

$(document).ready(function(){
    $('.sidenav').sidenav();
  });

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });

  $(document).ready(function(){
    $('.tabs').tabs();
  });

  $(document).ready(function(){
    $('select').formSelect();
  });

  $(document).ready(function() {
    M.updateTextFields();
  });

  $(document).ready(function () { 
    var $seuCampoCpf = $("#cpf");
    $seuCampoCpf.mask('000.000.000-00', {reverse: true});
  });
      
  $(document).ready(function () { 
    var $seuCampoRg = $("#rg");
    $seuCampoRg.mask('00.000.000', {reverse: true});
  });
      
  $(document).ready(function () { 
    var $seuCampoCep = $("#cep");
    $seuCampoCep.mask('00.000-000', {reverse: true});
  });
      
  $(document).ready(function () { 
    var $seuCampoNascimento = $("#nascimento");
    $seuCampoNascimento.mask('00/00/0000', {reverse: true});
  });
      
  $(document).ready(function () { 
    var $seuCampoCns = $("#cns");
    $seuCampoCns.mask('000.0000.0000.0000', {reverse: true});
  });
      
  $(document).ready(function () { 
    var $seuCampoDatainicial = $("#datainicial");
    $seuCampoDatainicial.mask('00/00/0000', {reverse: true});
  });
      
  $(document).ready(function () { 
    var $seuCampoDatafinal = $("#datafinal");
    $seuCampoDatafinal.mask('00/00/0000', {reverse: true});
  });
      
  $(document).ready(function () { 
    var $seuCampoDataconsulta = $("#dataconsulta");
    $seuCampoDataconsulta.mask('00/00/0000', {reverse: true});
  });