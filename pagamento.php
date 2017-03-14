<?php

require 'inc/funcoes.php';

$tituloPagina = "Pagamento de Convênios";

$afiliado_matricula = $bruto = $mes = $ano = $unimed = $uniodonto = $plano = $valor = $taxa_rcs = $rcs = $das = $descontounimed = $descontouniodonto = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $afiliado_matricula = filter_input(INPUT_POST, 'Afiliado_matricula', FILTER_SANITIZE_NUMBER_INT);
  $mes = filter_input(INPUT_POST, 'mes', FILTER_SANITIZE_STRING);
  $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
  $bruto = filter_input(INPUT_POST, 'bruto',  FILTER_SANITIZE_STRING);
  $taxa_rcs = filter_input(INPUT_POST,'taxa_rcs', FILTER_SANITIZE_NUMBER_INT);
  $unimed = filter_input(INPUT_POST, 'unimed',  FILTER_SANITIZE_STRING);
  $uniodonto = filter_input(INPUT_POST, 'uniodonto',  FILTER_SANITIZE_STRING);
  $das = filter_input(INPUT_POST,'das',  FILTER_SANITIZE_STRING);
  $rcs = filter_input(INPUT_POST,'rcs',  FILTER_SANITIZE_STRING);
  $descontounimed = filter_input(INPUT_POST, 'descontounimed', FILTER_SANITIZE_STRING);
  $descontouniodonto = filter_input(INPUT_POST, 'descontouniodonto', FILTER_SANITIZE_STRING);



 if(empty($afiliado_matricula)||empty($mes)||empty($ano)||empty($bruto)){
    mesErro("Por favor insira todos os campos");
  }else{
    if(pagamento($afiliado_matricula, $taxa_rcs, $bruto, $unimed, $uniodonto, $rcs, $das, $mes, $ano, $descontounimed, $descontouniodonto)){
    mesErro("Pagamento realizado");
    }else{
      mesErro("Não foi possível concluir");
    }
  }

}

include("inc/header.php");
?>

<div class="cad-arr">
  <h2 class="bg-info">Pagamento de Convênios</h2>
  <form class="form-group" data-toggle="validator" method="post" action="pagamento.php">
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
  <!--  <input class="button button--primary button--topic-php" type="submit" value="Avançar" />
  </form>
  <form class="pagamento2" method="post" action="pagamento.php">-->

      <tr>
        <th><label for="bruto">Salário (R$):<span class="required">*</span></label></th>
        <td><input type="text" class="form-control" id="bruto" name="bruto" required value="<?php echo htmlspecialchars($bruto); ?>"/>
          <div class="help-block with-errors"></div>
        </td>
      </tr>
      <tr>
        <th><label for="unimed">Unimed (R$):<span class="required">*</span></label></th>
        <td><input type="text" class="form-control" id="unimed" name="unimed" required value="<?php echo htmlspecialchars($unimed); ?>"/>
          <div class="help-block with-errors"></div>
        </td>
        <th><label for="descontounimed">Desconto<span class="required">*<span></label></th>
         <td><select class="form-control" id="descontounimed" name="descontounimed" required>
           <option value="">Selecione um</option>
           <option value="DAS" <?php if($descontounimed == 'DAS') echo 'selected'; ?>>DAS</option>
           <option value="RCS" <?php if($descontounimed == 'RCS') echo 'selected'; ?>>RCS</option>
           <div class="help-block with-errors"></div>
         </td>
      </tr>
      <tr>
        <th><label for="uniodonto">Uniodonto (R$):<span class="required">*</span></label></th>
        <td><input type="text" class="form-control" id="uniodonto" name="uniodonto" required value="<?php echo htmlspecialchars($uniodonto); ?>"/>
          <div class="help-block with-errors"></div>
        </td>
        <th><label for="descontouniodonto">Desconto<span class="required">*<span></label></th>
          <td><select class="form-control" id="descontouniodonto" name="descontouniodonto" required>
            <option value="">Selecione um</option>
            <option value="DAS" <?php if($descontouniodonto == 'DAS') echo 'selected'; ?>>DAS</option>
            <option value="RCS" <?php if($descontouniodonto == 'RCS') echo 'selected'; ?>>RCS</option>
            <div class="help-block with-errors"></div>
          </td>
      </tr>
      </table>
      <!--
    <h2 class="bg-info">Dependentes</h2>
    <table>
    <tr>
      <th><label for="dependente">Dependente:<span class="required">*<span></label></th>
      <td><select class="form-control" id="dependente" name="dependente">
        <option value="">Selecione:</option>
        <?php
        foreach(get_dependente() as $dependente){
          echo "<option value=" . $dependente['nome'] . " >" . $dependente['nome'] . "</option>";
          /*if($dependente['nome'] == $dependente['nome']){
            echo 'selected';
          }*/
        }
        ?>
      </select></td>
    </tr>
    <tr>
      <th><label for="plano">Plano:<span class="required">*<span></label></th>
      <td><select class="form-control" id="plano" name="desconto">
        <option value="">Selecione:</option>
        <?php
        foreach(get_convenio() as $plano){
          echo "<option value=" . $plano['nome'] . " >" . $plano['nome'] . "</option>";
        }
        ?>
      </select></td>
    </tr>
    <tr>
      <th><label for="desconto">Desconto:<span class="required">*<span></label></th>
      <td><select class="form-control" id="desconto" name="desconto">
        <option value="">Selecione:</option>
        <option value="DAS" <?php if($desconto == 'DAS') echo 'selected'; ?>>DAS</option>
        <option value="RCS" <?php if($desconto == 'RCS') echo 'selected'; ?>>RCS</option>
      </select></td>
    </tr>
    <tr>
      <th><label for="valor">Valor:<span class="required">*</span></label></th>
      <td><input  class="form-control" type="text" class="form-control" id="valor" name="valor" value="<?php echo htmlspecialchars($valor); ?>"/></td>
    </tr>
    </table>
    -->

    <br/>
    <abrr title="Concluir registro de pagamento"><input class="btn btn-primary" type="submit" value="Concluir" /></abrr>
    <abrr title="Cancelar pagamento"><input class="btn btn-danger" type="button" value="Cancelar"  onclick="javascript: location.href='index.php';"/></abrr>
  </form>
</div>


<?php
include("inc/footer.php");
?>
