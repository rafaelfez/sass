<?php

require 'inc/funcoes.php';

$tituloPagina = "Alteração de Encargos";

$afiliado_matricula = $mes = $ano = $decimoterceiro = $refeicao = $ferias = $id = '';

if (isset($_GET['id'])) {
    list($afiliado_matricula, $mes, $ano, $decimoterceiro, $refeicao, $ferias, $id) = get_encargos(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $afiliado_matricula = filter_input(INPUT_POST, 'Afiliado_matricula', FILTER_SANITIZE_NUMBER_INT);
  $mes = filter_input(INPUT_POST, 'mes', FILTER_SANITIZE_STRING);
  $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_NUMBER_INT);
  $decimoterceiro = filter_input(INPUT_POST, 'decimoterceiro', FILTER_SANITIZE_STRING);
  $refeicao = filter_input(INPUT_POST, 'refeicao', FILTER_SANITIZE_STRING);
  $ferias = filter_input(INPUT_POST, 'ferias', FILTER_SANITIZE_STRING);
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);



if(empty($afiliado_matricula)||empty($mes)||empty($ano)||empty($decimoterceiro)||empty($refeicao)||empty($ferias)){
    mesAlerta("Por favor insira todos os campos");
  }else{
    if(alterarEncargo($afiliado_matricula, $mes, $ano, $decimoterceiro, $refeicao, $ferias, $id)){
      mesSucesso("Encargos sociais alterados");
    }else{
      mesFalha("Não foi possível concluir");
    }
  }
}

include("inc/header.php");
?>

<div class="cad-arr">
  <h2 class="bg-info"> Alterar Encargos Sociais</h2>
  <form class="form-group" data-toggle="validator" method="post" action="alt_enc.php">
    <table>
      <tr>
        <th><label for="Afiliado_matricula">Matrícula:<span class="required">*</span></label></th>
        <td><input type="text" class="form-control" id="Afiliado_matricula" name="Afiliado_matricula" required value="<?php echo htmlspecialchars($afiliado_matricula); ?>"/>
          <div class="help-block with-errors"></div>
        </td>
      </tr>
      <tr>
        <th><label for="mes">Mês:<span class="required">*<span></label></th>
        <td><select class="form-control"  id="mes" name="mes" required>
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
        </select>
          <div class="help-block with-errors"></div>
        </td>
      </tr>
      <tr>
        <th><label for="ano">Ano:<span class="required">*<span></label></th>
        <td><select class="form-control" id="ano" name="ano" required>
          <option value="2017" <?php if($ano == '2017') echo 'selected'; ?>>2017</option>
          <option value="2018" <?php if($ano == '2018') echo 'selected'; ?>>2018</option>
          <option value="2019" <?php if($ano == '2019') echo 'selected'; ?>>2019</option>
          <option value="2020" <?php if($ano == '2020') echo 'selected'; ?>>2020</option>
        </select>
          <div class="help-block with-errors"></div>
        </td>
      </tr>
      <tr>
        <th><label for="decimoterceiro">13º Salário (R$):<span class="required">*</span></label></th>
        <td><input type="text" class="form-control" id="decimoterceiro" name="decimoterceiro" required value="<?php echo htmlspecialchars($decimoterceiro); ?>"/>
          <div class="help-block with-errors"></div>
        </td>
      </tr>
      <tr>
        <th><label for="refeicao">Vale Refeição (R$):<span class="required">*</span></label></th>
        <td><input type="text" class="form-control" id="refeicao" name="refeicao" required value="<?php echo htmlspecialchars($refeicao); ?>"/>
          <div class="help-block with-errors"></div>
        </td>
      </tr>
      <tr>
        <th><label for="ferias">Férias (R$):<span class="required">*</span></label></th>
        <td><input type="text" class="form-control" id="ferias" name="ferias" required value="<?php echo htmlspecialchars($ferias); ?>"/>
          <div class="help-block with-errors"></div>
        </td>
      </tr>
      <tr>
        <th><label for="id">ID:<span class="required">*</span></label></th>
        <td><input type="text" class="form-control" id="id" name="id" readonly="true" required value="<?php echo htmlspecialchars($id); ?>"/>
          <div class="help-block with-errors"></div>
        </td>
      </tr>
    </table>
    <br/>
    <abrr title="Concluir registro de encargos"><input class="btn btn-primary" type="submit" value="Concluir" /></abrr>
    <abrr title="Cancelar"><input class="btn btn-danger" type="button" value="Cancelar"  onclick="javascript: location.href='index.php';"/></abrr>
  </form>
</div>


<?php
include("inc/footer.php");
?>
