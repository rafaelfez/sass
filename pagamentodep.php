<?php

require 'inc/funcoes.php';

$tituloPagina = "Pagamento Dependente";
$matricula = $id = $mes = $ano = $unimed = $uniodonto = $nome = $message = '';


if (isset($_GET['matricula'])) {
    list($matricula) = get_filiado(filter_input(INPUT_GET, 'matricula', FILTER_SANITIZE_NUMBER_INT));
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
  $id = filter_input(INPUT_POST, 'idDependente', FILTER_SANITIZE_NUMBER_INT);
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $mes = filter_input(INPUT_POST, 'mes', FILTER_SANITIZE_STRING);
  $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_NUMBER_INT);
  $unimed = filter_input(INPUT_POST, 'unimed', FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
  $uniodonto = filter_input(INPUT_POST, 'uniodonto', FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
}

include("inc/header.php");
?>


<div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><big>Pagamento de Convênios do Dependente</big></h2>
  </div>
  <div class="panel-body">

  <?php
  try{
    if(isset($_POST["pagamentodep"])){
  if(empty($matricula)){
     $message = mesAlerta("Por favor insira a matrícula.");
   }else{
     if(get_filiado($matricula)){
      header("location: pagamentodep.php?matricula=$matricula");
      }else{
       $message =mesErro("Matrícula não encontrada. Por favor, verifique o número e tente novamente.");
     }
   }
 }
 } catch(Exception $message){
  echo "Erro ao efetuar consultaregistro.";
  echo $message->
    getMessage(); exit;} if(isset($message)){ echo $message; } ?>

    <form class="form-horizontal" data-toggle="" role="form" method="post" action="pagamentodep.php">

      <div class="form-group has-feedback">
        <label for="matricula" class="col-sm-2 control-label">Matrícula:<span class="required">*</span></label>
        <div class="col-sm-2">
          <input type="text" required class="form-control form-control-success" id="matricula" name="matricula" data-error="Por favor, informe um número de matrícula correto." pattern="[0-9]{1,8}$" value="<?php echo htmlspecialchars($matricula); ?>"/> <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <abrr title="Consultar Filiado"><input class="btn btn-primary" type="submit" name="pagamentodep" value="Inserir"/></abrr>
        <div class="help-block with-errors">
        </div>
      </div>
    </form>
  </div>
</div>

  <div class="panel panel-secundary">
  <div class="panel-heading">
    <h2 class="panel-title"><big></big></h2>
  </div>
  <div class="panel-body">

    <?php
      try{
      if(isset($_POST["cadastrar"])){
      if(empty($matricula)||empty($mes)||empty($ano)){
        $message = mesAlerta("Por favor insira todos os campos!");
      }else{
        if(pagamentoDependente($matricula, $id, $nome, $ano, $mes, $unimed, $uniodonto)){
        $message = mesSucesso("Pagamento realizado com sucesso!");
        //Limpa o formulário
        $matricula = $mes = $ano = $unimed = $uniodonto = $nome = $id ='';
        }
      }
    }
    } catch(Exception $message){
      echo "Erro ao efetuar registro.";
      echo $message->getMessage(); exit;} if(isset($message)){ echo $message; }
    ?>

    <form class="form-horizontal" role="form" method="post" action="pagamentodep.php">

      <div class="form-group has-feedback">
        <label class="col-sm-2 control-label" for="matricula">Matrícula: <span class="required">*</span></label>
        <div class="col-sm-2">
          <input class="form-control form-control-success" readonly="true" data-error="Por favor, informe um número de matrícula correto." id="matricula" name="matricula" pattern="[0-9]{8}$" required="" type="text" value="<?php echo htmlspecialchars($matricula); ?>"> <span aria-hidden="true" class="glyphicon form-control-feedback"></span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>


        <div class="form-group has-feedback">
        <label for="nome" class="col-sm-2 control-label">Dependente:<span class="required">*</span>
        </label>
        <div class="col-sm-2">
          <select class="form-control form-control-sucess" id="nome" name="nome" required>
            <option value="">Selecione:</option>
            <?php
                foreach(lista_dependente($_GET['matricula']) as $nome){
                    echo '<option value="'.$nome['nome'].'">'.$nome['nome'].'</option>';
                }
            ?>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </select>
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
          <select class="form-control form-control-success" id="mes" name="mes" data-error="Por favor, selecione o mês referente." required>
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

      <div class="form-group has-feedback">
        <label for="unimed" class="col-sm-2 control-label">Unimed (R$):<span class="required">*</span>
        </label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="unimed" name="unimed" data-error="Por favor, informe um valor correto." pattern="^[0-9]+(\.[0-9]{1,2})?$" required value="<?php echo htmlspecialchars($unimed); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>

      <div class="form-group has-feedback">
        <label for="uniodonto" class="col-sm-2 control-label">Uniodonto (R$):<span class="required">*</span>
        </label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="uniodonto" name="uniodonto" data-error="Por favor, informe um valor correto." pattern="^[0-9]+(\.[0-9]{1,2})?$" required value="<?php echo htmlspecialchars($uniodonto); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <abrr title="Concluir Registro de Pagamento">
                <input class="btn btn-primary" type="submit" name="cadastrar" value="Concluir" />
            </abrr>
            <abrr title="Cancelar">
                <input class="btn btn-danger" type="button" value="Cancelar" onclick="javascript: location.href='index.php';" />
            </abrr>
        </div>
    </div>

</form>
</div>
</div>

<?php include( "inc/footer.php"); ?>
