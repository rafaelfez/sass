<?php

require 'inc/funcoes.php';

$tituloPagina = "Alertas";

include("inc/header.php");
?>

<div class="cad-arr">
  <h2 class="bg-info">SMS para todos Filiados</h2>
  <form class="form-group" method="post" action="alertas.php">
    <textarea class="form-control" rows="5" cols="40" maxlength="160"></textarea>
    </form>
    <abrr title="Enviar alerta para todos Filiados"><input class="btn btn-primary" type="submit" value="Enviar" /></abrr>
    <abrr title="Cancelar alerta"><input class="btn btn-danger" type="button" value="Cancelar"  onclick="javascript: location.href='index.php';" /></abrr>
  </form>
</div>

<div class="form-container">
  <ul class="items">
    <h2 class="bg-info">Devedores</h2>
    <table border=5>
      <tr>
        <th>Nome</th>
        <th>Celular</th>
        <th>Situação</th>
        <th>SMS</th>
      </tr>
      <?php
        foreach(get_devedores() as $devedor){
          /*echo '<li>'. $devedor['nome'] . "          " .$devedor['celular'] . "          " .$devedor['situacao'] . '</li>';*/
          if($devedor['situacao']=='Devendo'){
            echo "<tr><td>" . $devedor['nome'] . "</td>" . "<td>" . $devedor['celular'] . "</td>" . "<td>" . $devedor['situacao'] . "</td>" . "<td>" ."<input class='botao-enviar-devedor' type='submit' value='Enviar' />" . "</td></tr>";
          }
        }
      ?>
    </table>
  </ul>
</div>

<?php

include("inc/footer.php");

?>
