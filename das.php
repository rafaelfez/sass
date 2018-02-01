<?php
//SELECT idPagamento FROM pagamentofil WHERE data BETWEEN "2017-06-01%" AND "2018-12-01%";
require 'inc/funcoes.php';

$tituloPagina="DAS";

$ano = $total = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_NUMBER_INT);
}

include("inc/header.php");
?>



   <div class="panel-group">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="panel-title"><big>DAS</big>
            </h2>
        </div>
        <div class="panel-body">

        <?php
try{
  if(isset($_POST["consultar"])){
    if(empty($ano)){
      $message = mesAlerta("Por favor informe o ano.");
    }else{
      if(get_das_ano($ano)){
        $message = mesSucesso("Pesquisa realizada com sucesso.");
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

        
            <form action="das.php" class="form-horizontal" data-toggle="validator" method="post" role="form">
              <div class="form-group has-feedback">
                <label for="ano" class="col-sm-2 control-label">Ano:<span class="required">*</span>
                </label>
                <div class="col-sm-2">
                  <select class="form-control form-control-sucess" id="ano" name="ano" required>
                    <option value="2017" <?php if($ano=='2017') echo 'selected'; ?>>2017</option>
                    <option value="2018" <?php if($ano=='2018') echo 'selected'; ?>>2018</option>
                    <option value="2019" <?php if($ano=='2019') echo 'selected'; ?>>2019</option>
                    <option value="2020" <?php if($ano=='2020') echo 'selected'; ?>>2020</option>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </select>
                </div>
                <div class="help-block with-errors">
                </div>
              </div>

              <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <abrr title="Consultar"><input class="btn btn-primary" type="submit" name="consultar" value="Consultar"/></abrr>
                <div class="help-block with-errors">
            </form>
        </div>
    </div>
    </div>



    <div class="panel panel-info">
        <div class="panel-heading">
            <h2 class="panel-title"><strong>Transações</strong>
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
                <?php foreach(get_das_ano($ano) as $item){

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

    <div class="panel panel-info">
        <div class="panel-heading">
            <h2 class="panel-title"><strong>Total</strong>
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
