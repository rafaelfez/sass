<?php

$tituloPagina = "Consulta";
$matricula = $cpf = '';

include("inc/header.php");
?>

<div class="cad-arr">
  <h2 class="bg-info">Consultar</h2>
  <form class="form-group" method="post" action="consultar.php">
    <table>
      <tr>
        <th><label for="matricula">Matrícula:<span class="required">*</span></label></th>
        <td><input type="text" class="form-control" id="matricula" name="matricula" value="<?php echo htmlspecialchars($matricula); ?>"/></td>
      </tr>
      <tr>
        <th><label for="cpf">CPF:<span class="required">*</span></label></th>
        <td><input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo htmlspecialchars($cpf); ?>"/></td>
      </tr>
    </table>
    <abrr title="Consultar Filiado"><input class="btn btn-primary" type="submit" value="Consultar"/></abrr>
    <abrr title="Cancelar consulta"><input class="btn btn-danger" type="button" value="Cancelar"  onclick="javascript: location.href='index.php';"/></abrr>
  </form>
</div>


<?php
include("inc/footer.php");
?>
