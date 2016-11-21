<?php

$tituloPagina = "Alteração";
$matricula = $nome = $telefone = $nascimento = $endereco = $rg = $cpf = $celular = $parentesco = $sexo = $rcs = '';

include("inc/header.php");
?>

<div class="consulta-alterar">
  <h2>Alterar Filiado-Dependente</h2>
  <form class="form-consulta-alterar" method="post" action="alteracao.php">
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
    <input class="button button--primary button--topic-php" type="submit" value="Pesquisar" />
    <input class="button button--primary button--topic-php" type="submit" value="Cancelar" />
  </form>
</div>
<div class="alterar">
  <form class="form-alterar">
  <table>
    <tr>
      <th><label for="matricula">Matrícula<span class="required">*</span></label></th>
      <td><input type="text" id="matricula" name="matricula" value="<?php echo htmlspecialchars($matricula); ?>"/></td>
    </tr>
    <tr>
      <th><label for="nome">Nome<span class="required">*</span></label></th>
      <td><input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>"/></td>
    </tr>
    <tr>
      <th><label for="telefone">Telefone<span class="required">*</span></label></th>
      <td><input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>"/></td>
    </tr>
    <tr>
      <th><label for="nascimento">Data de Nascimento<span class="required">*</span></label></th>
      <td><input type="text" id="nascimento" name="nascimento" value="<?php echo htmlspecialchars($nascimento); ?>"/></td>
    </tr>
    <tr>
      <th><label for="endereco">Endereço<span class="required">*</span></label></th>
      <td><input type="text" id="endereco" name="endereco" value="<?php echo htmlspecialchars($endereco); ?>"/></td>
    </tr>
    <tr>
      <th><label for="rg">RG<span class="required">*</span></label></th>
      <td><input type="text" id="rg" name="rg" value="<?php echo htmlspecialchars($rg); ?>"/></td>
    </tr>
    <tr>
      <th><label for="cpf">CPF<span class="cpf">*</span></label></th>
      <td><input type="text" id="cpf" name="cpf" value="<?php echo htmlspecialchars($cpf); ?>"/></td>
    </tr>
    <tr>
      <th><label for="celular">Celular<span class="required">*</span></label></th>
      <td><input type="text" id="celular" name="celular" value="<?php echo htmlspecialchars($celular); ?>"/></td>
    </tr>
    <tr>
      <th><label for="parentesco">Parentesco<span class="required">*</span></label></th>
      <td><input type="text" id="parentesco" name="parentesco" value="<?php echo htmlspecialchars($parentesco); ?>"/></td>
    </tr>
    <tr>
      <th><label for="sexo">Sexo<span class="required">*<span></label></th>
      <td><select id="sexo" name="sexo">
        <option value="">Selecione um</option>
        <option value="Masculino" <?php if($sexo == 'Masculino') echo 'selected'; ?>>Masculino</option>
        <option value="Feminino" <?php if($sexo == 'Feminino') echo 'selected'; ?>>Feminino</option>
      </select></td>
    </tr>
    <tr>
      <th><label for="rcs">RCS(%)<span class="required">*</span></label></th>
      <td><input type="text" id="rcs" name="rcs" value="<?php echo htmlspecialchars($rcs); ?>"/></td>
    </tr>
  </table>
  <input class="button button--primary button--topic-php" type="submit" value="Alterar" />
  <input class="button button--primary button--topic-php" type="submit" value="Cancelar" />
  </form>
</div>


<?php
include("inc/footer.php");
?>
