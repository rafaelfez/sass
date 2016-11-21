<?php

$tituloPagina = "Consulta";
$matricula = $cpf = '';

include("inc/header.php");
?>

<div class="consulta">
  <h2>Consultar</h2>
  <form class="form-alt" method="post" action="consultar.php">
    <table>
      <tr>
        <th><label for="matricula">Matrícula<span class="required">*</span></label></th>
        <td><input type="text" id="matricula" name="matricula" value="<?php echo htmlspecialchars($matricula); ?>"/></td>
      </tr>
      <tr>
        <th><label for="cpf">CPF<span class="required">*</span></label></th>
        <td><input type="text" id="cpf" name="cpf" value="<?php echo htmlspecialchars($cpf); ?>"/></td>
      </tr>
    </table>
    <input class="button button--primary button--topic-php" type="submit" value="Consultar" />
    <input class="button button--primary button--topic-php" type="submit" value="Cancelar" />
  </form>
</div>


<?php
include("inc/footer.php");
?>
