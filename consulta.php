<?php

require 'inc/funcoes.php';

$tituloPagina = "Consulta";
$afiliado_matricula = $cpf = '';

/*if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $afiliado_matricula = filter_input(INPUT_POST, 'Afiliado_matricula', FILTER_SANITIZE_NUMBER_INT);
}
*/
include("inc/header.php");
?>

<div class="cad-arr">
  <h2 class="bg-info">Consultar</h2>
  <form class="form-group" method="post" action="consultar.php">
    <table>
      <tr>
        <th><label for="matricula">Matrícula:<span class="required"></span></label></th>
        <td><input type="text" class="form-control" id="matricula" name="matricula" value="<?php echo htmlspecialchars($afiliado_matricula); ?>"/></td>
      </tr>
      <!--
      <tr>
        <th><label for="cpf">CPF:<span class="required">*</span></label></th>
        <td><input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo htmlspecialchars($cpf); ?>"/></td>
      </tr>
    -->
    </table>
    <br />
    <abrr title="Consultar Filiado"><input class="btn btn-primary" type="submit" value="Consultar"/></abrr>
    <abrr title="Cancelar Consulta"><input class="btn btn-danger" type="button" value="Cancelar"  onclick="javascript: location.href='index.php';"/></abrr>
  </form>
  <a href="das.php">DAS</a>
</div>
<!--<div class="form-container">
<!--<table border=5>
      <tr>
        <th>Matricula</th>
        <th>Salario</th>
        <th>Mês</th>
        <th>Ano</th>
      </tr>
  <ul class="items">
    <?php
    foreach(get_pagamentos() as $item){
      /*echo "<tr><td>" . $item['Afiliado_matricula'] . "</td>" . "<td>" . $item['salario'] . "</td>" . "<td>" . $item['mes'] . "</td>" . "<td>" . $item['ano'] . "</td></tr>";
      */
      echo "<li><a href='pagamento.php?id=" .$item['idPagamento'] . "'>". "Matricula: " . $item['Afiliado_matricula'] . "  -  Salário: " . $item['salario'] . "  -  Mês: " .$item['mes'] . "  -  Ano: " .$item['ano'] . "</a>";
      echo "</li>";
      /*echo "Salario " . $item['idPagamento'];*/
    }
    ?>
  </ul>
</div>
-->
