<?php

$tituloPagina = "Dependente";
$matricula = $nome = $parentesco = $telefone = $nascimento = $endereco = $rg = $cpf = $celular = '';

include("inc/header.php");
?>

<div class="cad-dep">
  <h2>Cadastro de Dependente</h2>
  <form class="form-cad-dep" method="post" action="cad_dep.php">
    <table>
        <tr>
          <th><label for="matricula">Matrícula do Arrumador<span class="required">*</span></label></th>
          <td><input type="text" id="matricula" name="matricula" value="<?php echo htmlspecialchars($matricula); ?>"/></td>
        </tr>
        <tr>
          <th><label for="nome">Nome<span class="required">*</span></label></th>
          <td><input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>"/></td>
        </tr>
        <tr>
          <th><label for="parentesco">Parentesco<span class="required">*</span></label></th>
          <td><input type="text" id="parentesco" name="parentesco" value="<?php echo htmlspecialchars($parentesco); ?>"/></td>
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
    </table>
    <input class="button button--primary button--topic-php" type="submit" value="Cadastrar" />
    <input class="button button--primary button--topic-php" type="submit" value="Cancelar" />
  </form>
</div>

<?php
include("inc/footer.php");
?>
