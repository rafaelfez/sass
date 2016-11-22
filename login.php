<?php

$tituloPagina = "Sistema SASS";

$login = $senha = '';

include("inc/header.php");

?>

<div class="login">
  <img src="img/saas-logo.png" style="width:600px; height:300px;">
  <form class="form-login" method="post" action="login.php">
    <table>
      <tr>
        <th><label for="login">Login<span class="required"></span></label></th>
        <td><input type="text" id="login" name="login" value="<?php echo htmlspecialchars($login); ?>"/></td>
      </tr>
      <tr>
        <th><label for="senha">Senha<span class="required"></span></label></th>
        <td><input type="text" id="senha" name="senha" value="<?php echo htmlspecialchars($senha); ?>"/></td>
      </tr>
    </table>
    <input class="button button--primary button--topic-php" type="submit" value="Entrar" />
    <input class="button button--primary button--topic-php" type="submit" value="Cancelar" />
  </form>
</div>

<?php include("inc/footer.php"); ?>
