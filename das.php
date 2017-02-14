<?php

require 'inc/funcoes.php';

$tituloPagina = "DAS";

$das1 = '';

include("inc/header.php");
?>

<div class="cad-arr">
  <h2 class="bg-info">DAS</h2>
  <form class="form-group" method="post" action="das.php">
    <table>
      <tr>
        <th><label for="das">DAS do Sindicato:<span class="required"></span></label></th>
        <td><input type="text" class="form-control" id="das" name="das" disabled="disabled" value="<?php echo get_das(); ?>"/></td>
      </tr>
    </table>
    <br />
  </form>
</div>
<div class="form-container">
  <table border=5>
      <tr>
        <th>DAS</th>
        <th>Salario</th>
        <th>Matricula</th>
        <th>Mes</th>
        <th>Ano</th>
      </tr>
  <ul class="items">
    <?php
    foreach(get_pagamentos() as $item){
      echo "<tr><td>" . $item['das'] . "</td>" . "<td>" . $item['salario'] . "</td>" . "<td>" . $item['Afiliado_matricula'] . "</td>" . "<td>" . $item['mes'] . "</td>" . "<td>" . $item['ano'] . "</td></tr>";
      }
    ?>
  </ul>
</div>


<?php
include("inc/footer.php");
?>
