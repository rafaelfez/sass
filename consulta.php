<?php

require 'inc/funcoes.php';

$tituloPagina = "Consulta";
$matricula = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);

  if(empty($matricula)){
     mesErro("Por favor insira a matricula");
   }else{
     if(get_filiado($matricula)){
      header("location: consul.php?matricula=$matricula");
      }else{
       mesErro("Não foi possível concluir");
     }
   }
}

include("inc/header.php");
?>

<div class="cad-arr">
  <h2 class="bg-info">Consultar</h2>
  <form class="form-group" method="post" action="">
    <table>
      <tr>
        <th><label for="matricula">Matrícula:<span class="required"></span></label></th>
        <td><input type="text" class="form-control" id="matricula" name="matricula" required value="<?php echo htmlspecialchars($matricula); ?>"/></td>
      </tr>
    </table>
    </br>
    <abrr title="Consultar Filiado"><input class="btn btn-primary" type="submit" value="Consultar"/></abrr>
    <abrr title="Cancelar Consulta"><input class="btn btn-danger" type="button" value="Cancelar"  onclick="javascript: location.href='index.php';"/></abrr>
  </form>
  <br />
  <br />
  <a href="das.php">DAS</a>
  <br />
  <br />
  <a href="historico.php">Histórico</a>
</div>
