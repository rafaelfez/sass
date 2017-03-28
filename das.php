<?php

require 'inc/funcoes.php';

$tituloPagina = "DAS";

$das1 = '';

include("inc/header.php");
?>


<div class="panel panel-primary">
<div class="panel-heading">
    <h2 class="panel-title"><big>DAS</big></h2>
  </div>
<div class="panel-body">

  <form class="form-horizontal" data-toggle="validator" method="post"  role="form" action="das.php">

<div class="form-group">
<label for="das" class="col-sm-2 control-label">DAS do Sindicato:<span class="required"></span></label>
<div class="col-sm-3">
<input type="text" class="form-control" id="das" name="das" disabled="disabled" value="<?php echo get_das(); ?>"/>
       </div>
      <div class="help-block with-errors"></div>
      </div>


  </form>
</div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><big>Transações</big></h2>
  </div>
  <div class="panel-body">

  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>DAS</th>
        <th>Salario</th>
        <th>Matricula</th>
        <th>Mes</th>
        <th>Ano</th>
      </tr>
    </thead>
    <tbody>
    <ul class="items">
      <?php
      foreach(get_pagamentos_das() as $item){
        echo "<tr><td>" . $item['das'] . "</td>" . "<td>" . $item['salario'] . "</td>" . "<td>" . $item['Afiliado_matricula'] . "</td>" . "<td>" . $item['mes'] . "</td>" . "<td>" . $item['ano'] . "</td></tr>";
        }
      ?>
    </ul>
    </tbody>
  </table>
</div>
</div>
