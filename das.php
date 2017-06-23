<?php
//SELECT idPagamento FROM pagamentofil WHERE data BETWEEN "2017-06-01%" AND "2018-12-01%";
require 'inc/funcoes.php';

$tituloPagina="DAS";

$de = $ate = $total = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $de = filter_input(INPUT_POST, 'de', FILTER_SANITIZE_STRING);
  $ate = filter_input(INPUT_POST, 'ate', FILTER_SANITIZE_STRING);
}

include("inc/header.php");
?>

<?php
try{
  if(isset($_POST["consultar"])){
    if(empty($de)||empty($ate)){
      $message = mesAlerta("Por favor informe o período");
    }else{
      if(get_das_total($de, $ate)){
        $message = mesSucesso("Pesquisa com sucesso");
      }
    }
  }
} catch(Exception $message){
  echo "Erro ao efetuar consulta/registro.";
  echo $message->getMessage();
  exit;
} if(isset($message)){
  echo $message;
}

?>

   <div class="panel-group">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="panel-title"><big>DAS</big>
            </h2>
        </div>
        <div class="panel-body">
            <form action="das.php" class="form-horizontal" data-toggle="validator" method="post" role="form">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="de">De: <span class="required"></span>
                    </label>
                    <div class="col-sm-3">
                        <input class="form-control" id="de" name="de" type="text" value="<?php echo htmlspecialchars($de); ?>">
                    </div>
                    <div class="help-block with-errors">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="ate">Até: <span class="required"></span>
                    </label>
                    <div class="col-sm-3">
                        <input class="form-control" id="ate" name="ate" type="text" value="<?php htmlspecialchars($ate); ?>">
                    </div>
                    <div class="help-block with-errors">
                    </div>
                </div>
                <abrr title="Consultar"><input class="btn btn-primary" type="submit" name="consultar" value="Consultar"/></abrr>
                <div class="help-block with-errors">
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
                    Matrícula
                </th>
                <th style="width:150px;">
                    Mês
                </th>
                <th style="width:150px;">
                    Ano
                </th>
                <th style="width:150px;">
                    Unimed
                </th>
                <th style="width:150px;">
                    Uniodonto
                </th>
                <th style="width:300px;">
                    Registro
                </th>
            </tr>
            </thead>
            <tbody>
            <ul class="items">
                <?php foreach(get_das_total($de,$ate) as $item){

                    echo "<tr>
                <td>
                   R$ " . $item['das'] . "
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

                <td>
                    " . $item['unimed'] . "
                </td>

                <td>
                    " . $item['uniodonto'] . "
                </td>

                <td>
                    " . $item['data'] . "
                </td>
            </tr>
            ";
          $total = floatval($item['das']) + $total;
        }
        ?>
            </ul>
            </tbody>
            </table>

        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="panel-title"><big>Total</big>
            </h2>
        </div>
        <div class="panel-body">
          <form action="das.php" class="form-horizontal" data-toggle="validator" method="post" role="form">
              <div class="form-group">
                  <label class="col-sm-2 control-label" for="total">DAS do Sindicato: <span class="required"></span>
                  </label>
                  <div class="col-sm-3">
                      <input class="form-control" disabled="disabled" id="total" name="total" type="text" value=" R$ <?php echo $total/2; ?>">
                  </div>
                  <div class="help-block with-errors">
                  </div>
              </div>
          </form>
        </div>
    </div>


</div>
<?php include( "inc/footer.php"); ?>
