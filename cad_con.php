<?php

$tituloPagina = "Convenio";
$nome = $empresa = $categoria = $desconto = $valor = '';

include("inc/header.php");
?>

<div class="cad-arr">
  <h2>Cadastro de Convenio</h2>
  <form class="form-cad-con" method="post" action="cad_con.php">
    <table>
        <tr>
          <th><label for="nome">Nome<span class="required">*</span></label></th>
          <td><input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>"/></td>
        </tr>
        <tr>
          <th><label for="empresa">Empresa<span class="required">*</span></label></th>
          <td><input type="text" id="empresa" name="empresa" value="<?php echo htmlspecialchars($empresa); ?>"/></td>
        </tr>
        <tr>
          <th><label for="categoria">Categoria<span class="required">*</span></label></th>
          <td><input type="text" id="categoria" name="categoria" value="<?php echo htmlspecialchars($categoria); ?>"/></td>
        </tr>
        <tr>
          <th><label for="desconto">Desconto<span class="required">*<span></label></th>
          <td><select id="desconto" name="Desconto">
            <option value="">Selecione um</option>
            <option value="DAS" <?php if($desconto == 'DAS') echo 'selected'; ?>>DAS</option>
            <option value="RCS" <?php if($desconto == 'RCS') echo 'selected'; ?>>RCS</option>
          </select></td>
        </tr>
        <tr>
          <th><label for="valor">Valor<span class="required">*</span></label></th>
          <td><input type="text" id="valor" name="valor" value="<?php echo htmlspecialchars($valor); ?>"/></td>
        </tr>
      </table>
      <input class="button button--primary button--topic-php" type="submit" value="Cadastrar" />
      <input class="button button--primary button--topic-php" type="submit" value="Cancelar" />
    </form>
  </div>

<?php
include("inc/footer.php");
?>
