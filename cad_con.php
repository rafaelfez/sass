<?php

$tituloPagina = "Convenio";
$nome = $empresa = $categoria = '';

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
    </table>
</div>

<?php
include("inc/footer.php");
?>
