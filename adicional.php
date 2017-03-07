<?php

require 'inc/funcoes.php';

$tituloPagina = "Adicional";

$afiliado_matricula = $mes = $ano = $adicional = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $afiliado_matricula = filter_input(INPUT_POST, 'Afiliado_matricula', FILTER_SANITIZE_NUMBER_INT);
  $mes = filter_input(INPUT_POST, 'mes', FILTER_SANITIZE_STRING);
  $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_NUMBER_INT);
  $adicional = filter_input(INPUT_POST, 'adicional', FILTER_SANITIZE_STRING);



if(empty($afiliado_matricula)||empty($mes)||empty($ano)||empty($adicional)){
    mesErro("Por favor insira todos os campos");
  }else{
    if(adicional($afiliado_matricula, $mes, $ano, $adicional)){
      mesErro("Adicional cadastrado");
      }else{
      mesErro("Não foi possível concluir");
    }
  }


  /*echo adicional($afiliado_matricula, $mes, $ano, $adicional);*/

}

include("inc/header.php");
?>

<div class="cad-arr">
  <h2 class="bg-info">Adicional</h2>
  <form class="form-group" method="post" action="adicional.php">
    <table>
      <tr>
        <th><label for="Afiliado_matricula">Matrícula:<span class="required">*</span></label></th>
        <td><input type="text" class="form-control" id="Afiliado_matricula" name="Afiliado_matricula" value="<?php echo htmlspecialchars($afiliado_matricula); ?>"/></td>
      </tr>
      <tr>
        <th><label for="mes">Mês:<span class="required">*<span></label></th>
        <td><select class="form-control"  id="mes" name="mes">
          <option value="">Selecione:</option>
          <option value="Janeiro" <?php if($mes == 'Janeiro') echo 'selected'; ?>>Janeiro</option>
          <option value="Fevereiro" <?php if($mes == 'Fevereiro') echo 'selected'; ?>>Fevereiro</option>
          <option value="Março" <?php if($mes == 'Março') echo 'selected'; ?>>Março</option>
          <option value="Abril" <?php if($mes == 'Abril') echo 'selected'; ?>>Abril</option>
          <option value="Maio" <?php if($mes == 'Maio') echo 'selected'; ?>>Maio</option>
          <option value="Junho" <?php if($mes == 'Junho') echo 'selected'; ?>>Junho</option>
          <option value="Julho" <?php if($mes == 'Julho') echo 'selected'; ?>>Julho</option>
          <option value="Agosto" <?php if($mes == 'Agosto') echo 'selected'; ?>>Agosto</option>
          <option value="Setembro" <?php if($mes == 'Setembro') echo 'selected'; ?>>Setembro</option>
          <option value="Outubro" <?php if($mes == 'Outubro') echo 'selected'; ?>>Outubro</option>
          <option value="Novembro" <?php if($mes == 'Novembro') echo 'selected'; ?>>Novembro</option>
          <option value="Dezembro" <?php if($mes == 'Dezembro') echo 'selected'; ?>>Dezembro</option>
        </select></td>
      </tr>
      <tr>
        <th><label for="ano">Ano:<span class="required">*<span></label></th>
        <td><select class="form-control" id="ano" name="ano">
          <option value="2017" <?php if($ano == '2017') echo 'selected'; ?>>2017</option>
          <option value="2018" <?php if($ano == '2018') echo 'selected'; ?>>2018</option>
          <option value="2019" <?php if($ano == '2019') echo 'selected'; ?>>2019</option>
          <option value="2020" <?php if($ano == '2020') echo 'selected'; ?>>2020</option>
        </select></td>
      </tr>
      <tr>
        <th><label for="adicional">Adicional (R$):<span class="required">*</span></label></th>
        <td><input type="text" class="form-control" id="adicional" name="adicional" value="<?php echo htmlspecialchars($adicional); ?>"/></td>
      </tr>
    </table>
    <br/>
    <abrr title="Concluir Adicional"><input class="btn btn-primary" type="submit" value="Concluir" /></abrr>
    <abrr title="Cancelar Adicional"><input class="btn btn-danger" type="button" value="Cancelar"  onclick="javascript: location.href='index.php';"/></abrr>
  </form>
</div>


<?php
include("inc/footer.php");
?>
