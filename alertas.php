<?php

require 'inc/funcoes.php';

$tituloPagina = "Alertas";

include("inc/header.php");
?>

<div class="sms-geral">
  <h2 class="bg-info">SMS para todos Filiados</h2>
  <form id="sms-geral" class="form-group" method="post" action="send.php">
    <textarea name="mensagem" class="form-control" rows="5" cols="40" maxlength="100"></textarea>
    <br/>
      <abrr title="Enviar mensagem SMS"><input class="btn btn-primary" type="submit" value="Enviar" /></abrr>
      <abbr title="Cancelar envio de SMS"><input class="btn btn-danger" type="button" value="Cancelar" onclick="javascript: location.href='index.php';" /></abbr>
    </form>
    <!--<abrr title="Enviar alerta para todos Filiados"><input class="btn btn-primary" type="submit" value="Enviar" /></abrr>
    <abrr title="Cancelar alerta"><input class="btn btn-danger" type="button" value="Cancelar"  onclick="javascript: location.href='index.php';" /></abrr>
  </form>
-->
</div>

<div class="sms-devedores">
    <ul class="items">
      <br />
      <br />
      <h2 class="bg-info">Devedores</h2>
      <table class="table table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Celular</th>
            <th>Mês</th>
            <th>Devendo</th>
            <th>SMS</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach(get_devedores() as $devedor){
              /*echo '<li>'. $devedor['nome'] . "          " .$devedor['celular'] . "          " .$devedor['situacao'] . '</li>';*/
                echo "<form id='devedores' class='form-group' method='post' action='send_one.php'>";
                echo "<tr><td>" . $devedor['nome'] . "</td>" . "<td>" . $devedor['celular'] ."<input type='hidden' name='celular'. value=". $devedor['celular']." />". "</td>" . "<td>" . $devedor['mes'] . "</td>" . "<td>" . $devedor['devendo']
                ."<input type='hidden' name='devendo'. value=". $devedor['devendo']." />". "</td>" . "<td>" ."<input class='btn btn-primary' type='submit' value='Enviar' />" . "</td></tr>";
                echo "</form>";
            }
          ?>
        </tbody>
      </table>
    </ul>
</div>
