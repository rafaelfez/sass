<?php

$tituloPagina = "Pagamento";

$afiliado_matricula = $salario = $adicional = $mes = $ano = '';

include("inc/header.php");
?>

<div class="cad-arr">
  <h2>Pagamento</h2>
  <form class="pagamento" method="post" action="pagamento.php">
    <table>
      <tr>
        <th><label for="Afiliado_matricula">Matricula<span class="required">*</span></label></th>
        <td><input type="text" id="Afiliado_matricula" name="Afiliado_matricula" value="<?php echo htmlspecialchars($afiliado_matricula); ?>"/></td>
      </tr>
      <tr>
        <th><label for="salario">Salário Bruto<span class="required">*</span></label></th>
        <td><input type="text" id="salario" name="salario" value="<?php echo htmlspecialchars($salario); ?>"/></td>
      </tr>
      <tr>
        <th><label for="adicional">Adicional<span class="required">*</span></label></th>
        <td><input type="text" id="adicional" name="adicional" value="<?php echo htmlspecialchars($adicional); ?>"/></td>
      </tr>
      <tr>
        <th><label for="mes">Mês<span class="required">*<span></label></th>
        <td><select id="mes" name="mes">
          <option value="">Selecione um</option>
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
        <th><label for="ano">Ano<span class="required">*<span></label></th>
        <td><select id="ano" name="ano">
          <option value="2017" <?php if($ano == '2017') echo 'selected'; ?>>2017</option>
          <option value="2018" <?php if($ano == '2018') echo 'selected'; ?>>2018</option>
          <option value="2019" <?php if($ano == '2019') echo 'selected'; ?>>2019</option>
          <option value="2020" <?php if($ano == '2020') echo 'selected'; ?>>2020</option>
        </select></td>
      </tr>
    </table>
    <input class="button button--primary button--topic-php" type="submit" value="Inserir" />
    <input type="button" value="Cancelar" onclick="javascript: location.href='index.php';" />
  </form>
</div>


<?php
include("inc/footer.php");
?>
