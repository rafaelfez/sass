<?php

require 'inc/funcoes.php';

$tituloPagina = "Alertas";

include("inc/header.php");
?>

<div class="sms-geral">
  <h2>SMS para todos Filiados:</h2>
  <form class="sms-geral" method="post" action="alertas.php">
    <textarea rows="5" cols="40" maxlength="160"></textarea>
    <input class="button button--primary button--topic-php" type="submit" value="Enviar" />
  </form>
</div>

<div class="form-container">
  <ul class="items">
    <h2>Devedores</h2>
    <table border=5>
      <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Situação</th>
        <th>SMS</th>
      </tr>
      <?php
        foreach(get_devedores() as $devedor){
          /*echo '<li>'. $devedor['nome'] . "          " .$devedor['telefone'] . "          " .$devedor['situacao'] . '</li>';*/
          if($devedor['situacao']=='Devendo'){
            echo "<tr><td>" . $devedor['nome'] . "</td>" . "<td>" . $devedor['telefone'] . "</td>" . "<td>" . $devedor['situacao'] . "</td>" . "<td>" ."<input class='botao-enviar-devedor' type='submit' value='Enviar' />" . "</td></tr>";
          }
        }
      ?>
    </table>
  </ul>
</div>

<?php

include("inc/footer.php");

?>
