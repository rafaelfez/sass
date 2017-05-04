<?php require 'inc/funcoes.php';
$tituloPagina="DAS" ; $das1='' ; 
include("inc/header.php"); ?>

   <div class="panel-group">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="panel-title"><big>DAS</big>
            </h2>
        </div>
        <div class="panel-body">
            <form action="das.php" class="form-horizontal" data-toggle="validator" method="post" role="form">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="das">DAS do Sindicato: <span class="required"></span>
                    </label>
                    <div class="col-sm-3">
                        <input class="form-control" disabled="disabled" id="das" name="das" type="text" value=" R$ <?php echo get_das(); ?>">
                    </div>
                    <div class="help-block with-errors">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="panel-title"><big>Transações</big>
            </h2>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-hover table-condensed table-striped" style="width:850px;">
            <thead>
            <tr>
                <th style="width:150px;">
                    DAS
                </th>
                <th style="width:150px;">
                    Salário
                </th>
                <th style="width:150px;">
                    Matrícula
                </th>
                <th style="width:150px;">
                    Mês
                </th>
                <th style="width:150px;">
                    Ano
                </th>
            </tr>
            </thead>
            <tbody>
            <ul class="items">
                <?php foreach(get_pagamentos_das() as $item){ 

                    echo "<tr>
                <td>
                   R$ " . $item['das'] . "
                </td>
    
                <td>
                   R$ " . $item['salario'] . "
                </td>
                
                <td>
                    " . $item['Afiliado_matricula'] . "
                </td>
                
                <td>
                    " . $item['mes'] . "
                </td>
                
                <td>
                    " . $item['ano'] . "
                </td>
            </tr>
            "; } ?>
            </ul>
            </tbody>
            </table>

        </div>
    </div>
</div>
<?php include( "inc/footer.php"); ?>