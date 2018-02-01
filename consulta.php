<?php

require 'inc/funcoes.php';

$tituloPagina = "Consulta";
$matricula = $message = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
}


include("inc/header.php");
?>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><big>Consulta de Filiado</big></h2>
  </div>
  <div class="panel-body">

    <?php
  try{
    if(isset($_POST["consultar"])){
  if(empty($matricula)){
     $message = mesAlerta("Por favor insira a matrícula.");
   }else{
     if(get_filiado($matricula)){
      header("location: consul.php?matricula=$matricula");
      }else{
       $message =mesErro("Matrícula não encontrada. Por favor, verifique o número e tente novamente.");
     }
   }
 }
 } catch(Exception $message){
  echo "Erro ao efetuar consultaregistro.";
  echo $message->
    getMessage(); exit;} if(isset($message)){ echo $message; } ?>

    <form class="form-horizontal" data-toggle="validator" role="form" method="post" action="consulta.php">

      <div class="form-group has-feedback">
        <label for="matricula" class="col-sm-2 control-label">Matrícula:<span class="required">*</span></label>
        <div class="col-sm-2">
          <input type="text" required class="form-control form-control-success" id="matricula" name="matricula" data-error="Por favor, informe um número de matrícula correto." pattern="[0-9]{8}$" value="<?php echo htmlspecialchars($matricula); ?>"/> <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <abrr title="Consultar Filiado"><input class="btn btn-primary" type="submit" name="consultar" value="Consultar"/></abrr>
          <abrr title="Cancelar"><input class="btn btn-danger" type="button" value="Cancelar" onclick="javascript: location.href='index.php';"/></abrr>
        </div>
      </div>
      
    </form>
  </div>
</div>
<?php include("inc/footer.php"); ?>
