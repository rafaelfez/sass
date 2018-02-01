<?php
require 'inc/funcoes.php';
$afiliado_matricula = $mes = $ano = $das = $rcs = $id = $adicional = $desconto = '';
$tituloPagina = "Fluxo Adicional";

if (isset($_GET['id'])) {
    list($afiliado_matricula, $ano, $mes, $unimed, $uniodonto, $das, $rcs, $id) = get_pagamentos(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $afiliado_matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
  $mes = filter_input(INPUT_POST, 'mes', FILTER_SANITIZE_STRING);
  $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_NUMBER_INT);
  $das = filter_input(INPUT_POST,'das',  FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
  $rcs = filter_input(INPUT_POST,'rcs',  FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  $adicional = filter_input(INPUT_POST, 'adicional', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $desconto = filter_input(INPUT_POST, 'desconto', FILTER_SANITIZE_STRING);
}

include('inc/header.php');
?>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><big>Fluxo Adicional</big></h2>
  </div>
  <div class="panel-body">

  <?php
  try{
    if(isset($_POST["buscar"])){
      if(empty($afiliado_matricula)){
        $message = mesAlerta("Por favor insira a matrícula.");
      }else{
        if(get_pag($afiliado_matricula, $ano, $mes)){
          $id = get_pag($afiliado_matricula, $ano, $mes);
          header("location: adicional.php?id=$id");
        }else{
          $message = mesErro("Pagamento não encontrado. Por favor, verifique os campos.");
     }
   }
 }
 } catch(Exception $message){
    echo "Erro ao efetuar consultar registro.";
    echo $message->
    getMessage(); exit;} if(isset($message)){ echo $message; } ?>

    <form class="form-horizontal" data-toggle="validator" role="form" method="post" action="adicional.php">

    <div class="panel panel-info">
  <div class="panel-heading"><strong>Buscar Matrícula e Período</strong></div>
  <div class="panel-body">

      <div class="form-group has-feedback">
        <label class="col-sm-2 control-label" for="matricula">Matrícula: <span class="required">*</span></label>
        <div class="col-sm-2">
          <input class="form-control form-control-success" placeholder="" data-error="Por favor, informe um número de matrícula correto." id="matricula" name="matricula" pattern="[0-9]{8}$" required="" type="text" value="<?php echo htmlspecialchars($afiliado_matricula); ?>"> <span aria-hidden="true" class="glyphicon form-control-feedback"></span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>

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

        <div class="form-group has-feedback">
          <label for="mes" class="col-sm-2 control-label">Mês:<span class="required">*</span>
          </label>
          <div class="col-sm-2">
            <select class="form-control form-control-success" id="mes" name="mes" data-error="Por favor, selecione o mês referente." data-error="Por favor, informe um número de matrícula correto." required>
              <option value="">Selecione:</option>
              <option value="Janeiro" <?php if($mes=='Janeiro' ) echo 'selected'; ?>>Janeiro</option>
              <option value="Fevereiro" <?php if($mes=='Fevereiro' ) echo 'selected'; ?>>Fevereiro</option>
              <option value="Março" <?php if($mes=='Março' ) echo 'selected'; ?>>Março</option>
              <option value="Abril" <?php if($mes=='Abril' ) echo 'selected'; ?>>Abril</option>
              <option value="Maio" <?php if($mes=='Maio' ) echo 'selected'; ?>>Maio</option>
              <option value="Junho" <?php if($mes=='Junho' ) echo 'selected'; ?>>Junho</option>
              <option value="Julho" <?php if($mes=='Julho' ) echo 'selected'; ?>>Julho</option>
              <option value="Agosto" <?php if($mes=='Agosto' ) echo 'selected'; ?>>Agosto</option>
              <option value="Setembro" <?php if($mes=='Setembro' ) echo 'selected'; ?>>Setembro</option>
              <option value="Outubro" <?php if($mes=='Outubro' ) echo 'selected'; ?>>Outubro</option>
              <option value="Novembro" <?php if($mes=='Novembro' ) echo 'selected'; ?>>Novembro</option>
              <option value="Dezembro" <?php if($mes=='Dezembro' ) echo 'selected'; ?>>Dezembro</option>
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </select>
          </div>
          <div class="help-block with-errors">
          </div>
        </div>

        <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <abrr title="Inserir Período"><input class="btn btn-primary" type="submit" name="buscar" value="Inserir"/></abrr>
        <div class="help-block with-errors">
        </div>
        </div>
    </form>
  </div>
  </div>
  </div>

<form class="form-horizontal" role="form" data-toggle="validator" method="post" action="adicional.php">



</form>

<?php
try{
  if(isset($_POST["acertar"])){
    if(empty($id)||empty($das)||empty($rcs)||empty($adicional)||empty($desconto)){
      $message = mesAlerta("Por favor informe todos os campos");
    }else{
      if(adicional($id, $das, $rcs, $adicional, $desconto)){
        $message = mesSucesso("Foi acertado as contas do Filiado.");
        $id = $das = $rcs = $adicional = $desconto = '';
      }else{
        $message = mesErro("Não foi possível acertar as contas do Filiado");
   }
 }
}
} catch(Exception $message){
  echo "Erro ao efetuar consultar registro.";
  echo $message->
  getMessage(); exit;} if(isset($message)){ echo $message; } ?>

  <form class="form-horizontal" data-toggle="validator" role="form" method="post" action="adicional.php">


    <div class="form-group has-feedback">
      <label for="id" class="col-sm-2 control-label">Id:<span class="required">*</span>
      </label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="id" name="id" readonly="true" data-error="Por favor, informe um ID correto." pattern="^[0-9]+(\.[0-9]{1,2})?$" required value="<?php echo htmlspecialchars($id); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
      </div>
      <div class="help-block with-errors">
      </div>
    </div>

    <div class="form-group has-feedback">
      <label for="das" class="col-sm-2 control-label">DAS (R$):<span class="required">*</span>
      </label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="das" name="das" readonly="true" data-error="Por favor, informe um valor correto." pattern="^[0-9]+(\.[0-9]{1,2})?$" required value="<?php echo htmlspecialchars($das); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
      </div>
      <div class="help-block with-errors">
      </div>
    </div>

    <div class="form-group has-feedback">
      <label for="rcs" class="col-sm-2 control-label">RCS (R$):<span class="required">*</span>
      </label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="rcs" name="rcs" readonly="true" data-error="Por favor, informe um valor correto." pattern="^[0-9]+(\.[0-9]{1,2})?$" required value="<?php echo htmlspecialchars($rcs); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
      </div>
      <div class="help-block with-errors">
      </div>
    </div>

  <div class="form-group has-feedback">
          <label for="adicional" class="col-sm-2 control-label">Adicional (R$):<span class="required">*</span></label>
          <div class="col-sm-2">
          <input type="text" class="form-control" id="adicional" name="adicional" data-error="Por favor, informe um valor correto." required value="<?php echo htmlspecialchars($adicional); ?>"/>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
          <div class="help-block with-errors"></div>
        </div>

         <div class="form-group has-feedback">
          <label for="desconto" class="col-sm-2 control-label">Desconto:<span class="required">*</span></label>
          <div class="col-sm-2">
           <select class="form-control" id="desconto" name="desconto" data-error="Por favor, selecione um tipo de desconto." required>
             <option value="">Selecione:</option>
             <option value="DINHEIRO" <?php if($desconto == 'DINHEIRO') echo 'selected'; ?>>Dinheiro</option>
             <option value="DAS" <?php if($desconto == 'DAS') echo 'selected'; ?>>DAS</option>
             <option value="RCS" <?php if($desconto == 'RCS') echo 'selected'; ?>>RCS</option>
             <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </select>
            </div>
          <div class="help-block with-errors"></div>
        </div>

  <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
          <abrr title="Concluir Registro de Adicional">
              <input class="btn btn-primary" type="submit" name="acertar" value="Acertar" />
          </abrr>
          <abrr title="Cancelar">
              <input class="btn btn-danger" type="button" value="Cancelar" onclick="javascript: location.href='index.php';" />
          </abrr>
      </div>
  </div>
</form>
</div>
</div>
<?php include('inc/footer.php') ?>
