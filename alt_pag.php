<?php
require("inc/funcoes.php");

$tituloPagina = "Alteração de Pagamento";

$matricula = $bruto = $salario = $mes = $ano = $das = $adicional = $rcs= $unimed = $uniodonto = $id = $devendo = "";

if (isset($_GET['id'])) {
    list($matricula, $bruto, $salario, $mes, $ano, $unimed, $uniodonto, $adicional, $das, $rcs, $id, $devendo) = get_pagamentos(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $mes = filter_input(INPUT_POST, 'mes', FILTER_SANITIZE_STRING);
  $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
  $bruto = filter_input(INPUT_POST, 'bruto',  FILTER_SANITIZE_STRING);
  $unimed = filter_input(INPUT_POST, 'unimed',  FILTER_SANITIZE_STRING);
  $uniodonto = filter_input(INPUT_POST, 'uniodonto',  FILTER_SANITIZE_STRING);
  $das = filter_input(INPUT_POST,'das',  FILTER_SANITIZE_STRING);
  $rcs = filter_input(INPUT_POST,'rcs',  FILTER_SANITIZE_STRING);
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
  $adicional = filter_input(INPUT_POST, 'adicional', FILTER_SANITIZE_STRING);
  $salario = filter_input(INPUT_POST, 'salario',  FILTER_SANITIZE_STRING);
  $devendo = filter_input(INPUT_POST, 'devendo',  FILTER_SANITIZE_STRING);

  if(empty($salario) || empty($bruto) || empty($mes) || empty($ano)){
    mesAlerta("Por favor insira todos os campos");
  }else{
    if(alterarPagamento($bruto, $salario, $mes, $ano, $unimed, $uniodonto, $adicional, $das, $rcs, $id)){
      mesSucesso("Pagamento alterado");
    }else{
      mesFalha("Não foi possível concluir");
    }
  }


}


include("inc/header.php");
?>


<h2>Alteração de Pagamento - Cuidado!</h2>
<form class="form-group" method="post" action="alt_pag.php">
<table>
<tr>
  <th><label for="valor">Matricula:<span class="required"></span></label></th>
  <td><input  class="form-control" type="text" class="form-control" id="matricula" name="matricula" value="<?php echo htmlspecialchars($matricula); ?>"/></td>
  <th><label for="valor">Mês:<span class="required"></span></label></th>
  <td><input  class="form-control" type="text" class="form-control" id="mes" name="mes" value="<?php echo htmlspecialchars($mes); ?>"/></td>
  <th><label for="valor">Ano:<span class="required"></span></label></th>
  <td><input  class="form-control" type="text" class="form-control" id="ano" name="ano" value="<?php echo htmlspecialchars($ano); ?>"/></td>
</tr>
<tr>
  <th><label for="bruto">Bruto:<span class="required"></span></label></th>
  <td><input  class="form-control" type="text" class="form-control" id="bruto" name="bruto" value="<?php echo htmlspecialchars($bruto); ?>"/></td>
  <th><label for="unimed">Unimed:<span class="required"></span></label></th>
  <td><input  class="form-control" type="text" class="form-control" id="unimed" name="unimed" value="<?php echo htmlspecialchars($unimed); ?>"/></td>
  <th><label for="uniodonto">Uniodonto:<span class="required"></span></label></th>
  <td><input  class="form-control" type="text" class="form-control" id="uniodonto" name="uniodonto" value="<?php echo htmlspecialchars($uniodonto); ?>"/></td>
</tr>
<tr>
  <th><label for="adicional">Adicional:<span class="required"></span></label></th>
  <td><input  class="form-control" type="text" class="form-control" id="adicional" name="adicional" value="<?php echo htmlspecialchars($adicional); ?>"/></td>
  <th><label for="das">DAS:<span class="required"></span></label></th>
  <td><input  class="form-control" type="text" class="form-control" id="das" name="das" value="<?php echo htmlspecialchars($das); ?>"/></td>
  <th><label for="rcs">RCS:<span class="required"></span></label></th>
  <td><input  class="form-control" type="text" class="form-control" id="rcs" name="rcs" value="<?php echo htmlspecialchars($rcs); ?>"/></td>
</tr>
<tr>
  <th><label for="salario">Salario:<span class="required"></span></label></th>
  <td><input  class="form-control" type="text" class="form-control" id="salario" name="salario" value="<?php echo htmlspecialchars($salario); ?>"/></td>
  <th><label for="devendo">Devendo:<span class="required"></span></label></th>
  <td><input  class="form-control" type="text" class="form-control" id="devendo" name="devendo" value="<?php echo htmlspecialchars($devendo); ?>"/></td>
  <th><label for="id">ID:<span class="required"></span></label></th>
  <td><input  class="form-control" type="text" class="form-control" id="id" name="id" value="<?php echo htmlspecialchars($id); ?>"/></td>
</tr>
</table>
<abbr title="Alterar Pagamento"><input class="btn btn-primary" type="submit" value="Alterar"/></abbr>

</form>
