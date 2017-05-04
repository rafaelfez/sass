<?php
require("inc/funcoes.php");

$tituloPagina = "Alteração de Pagamento";

$matricula = $bruto = $salario = $mes = $ano = $das = $adicional = $rcs= $unimed = $uniodonto = $idPagamento = $devendo = $message = "";

if (isset($_GET['id'])) {
    list($matricula, $ano, $mes, $bruto, $unimed, $uniodonto, $adicional, $das, $rcs, $salario, $devendo, $idPagamento) = get_pagamentos(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $matricula = filter_input(INPUT_POST, 'Afiliado_matricula', FILTER_SANITIZE_STRING);
  $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_NUMBER_INT);
  $mes = filter_input(INPUT_POST, 'mes', FILTER_SANITIZE_STRING);
  $bruto = filter_input(INPUT_POST, 'bruto',  FILTER_SANITIZE_NUMBER_FLOAT);
  $unimed = filter_input(INPUT_POST, 'unimed',  FILTER_SANITIZE_NUMBER_FLOAT);
  $uniodonto = filter_input(INPUT_POST, 'uniodonto',  FILTER_SANITIZE_NUMBER_FLOAT);
  $adicional = filter_input(INPUT_POST, 'adicional', FILTER_SANITIZE_NUMBER_FLOAT);
  $das = filter_input(INPUT_POST,'das',  FILTER_SANITIZE_NUMBER_FLOAT);
  $rcs = filter_input(INPUT_POST,'rcs',  FILTER_SANITIZE_NUMBER_FLOAT);
  $salario = filter_input(INPUT_POST, 'salario',  FILTER_SANITIZE_NUMBER_FLOAT);
  $devendo = filter_input(INPUT_POST, 'devendo',  FILTER_SANITIZE_NUMBER_FLOAT);
  $adicional = filter_input(INPUT_POST, 'adicional', FILTER_SANITIZE_STRING);
  $idPagamento = filter_input(INPUT_POST, 'idPagamento', FILTER_SANITIZE_NUMBER_INT);

}


include("inc/header.php");
?>


  <div class="panel panel-primary">
    <div class="panel-heading">
        <h2 class="panel-title">
        <big>
        Alteração de Pagamento - Cuidado! </big>
        </h2>
    </div>
    <div class="panel-body">

        <?php 
    try{
    if(isset($_POST["alterar"])){
    if(empty($matricula) || empty($ano) || empty($mes) || empty($bruto) || empty($unimed) || empty($uniodonto) || empty($adicional) || empty($das) || empty($rcs) || empty($salario) || empty($devendo) || empty($idPagamento) ){
    mesAlerta("Por favor, insira todos os campos.");
  }else{
    if(alterarPagamento($matricula, $ano, $mes, $bruto, $unimed, $uniodonto, $adicional, $das, $rcs, $salario, $devendo, $idPagamento)){
      mesSucesso("Dados de pagamento alterados com sucesso!");
    }
  }
} 
} catch(Exception $message){
    echo "Erro ao alterar dados de pagamento.";
    echo $message->
        getMessage(); exit; } if(isset($message)){ echo $message; } ?>

        <form class="form-horizontal" data-toggle="validator" role="form" method="post" name="form_altPag" action="alt_pag.php">

            <div class="form-group has-feedback">
                <label for="matricula" class="col-sm-2 control-label">
                Matrícula: <span class="required">
                * </span>
                </label>
                <div class="col-sm-2">
                    <input type="text" required class="form-control form-control-success" id="matricula" name="matricula" data-error="Por favor, informe um número de matrícula correto." pattern="[0-9]{5,7}$" value="<?php echo htmlspecialchars($matricula); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
                    </span>
                </div>
                <div class="help-block with-errors">
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="ano" class="col-sm-2 control-label">
                Ano: <span class="required">
                * </span>
                </label>
                <div class="col-sm-2">
                    <select class="form-control form-control-sucess" id="ano" name="ano" required>
                        <option value="2017" <?php if($ano=='2017' ) echo 'selected'; ?>
                        >2017 </option>
                        <option value="2018" <?php if($ano=='2018' ) echo 'selected'; ?>
                        >2018 </option>
                        <option value="2019" <?php if($ano=='2019' ) echo 'selected'; ?>
                        >2019 </option>
                        <option value="2020" <?php if($ano=='2020' ) echo 'selected'; ?>
                        >2020 </option>
                        <span class="glyphicon form-control-feedback" aria-hidden="true">
                        </span>
                    </select>
                </div>
                <div class="help-block with-errors">
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="mes" class="col-sm-2 control-label">
                Mês: <span class="required">
                * </span>
                </label>
                <div class="col-sm-2">
                    <select class="form-control form-control-success" id="mes" name="mes" data-error="Por favor, selecione o mês referente." required>
                        <option value="">
                        Selecione: </option>
                        <option value="Janeiro" <?php if($mes=='Janeiro' ) echo 'selected'; ?>
                        >Janeiro </option>
                        <option value="Fevereiro" <?php if($mes=='Fevereiro' ) echo 'selected'; ?>
                        >Fevereiro </option>
                        <option value="Março" <?php if($mes=='Março' ) echo 'selected'; ?>
                        >Março </option>
                        <option value="Abril" <?php if($mes=='Abril' ) echo 'selected'; ?>
                        >Abril </option>
                        <option value="Maio" <?php if($mes=='Maio' ) echo 'selected'; ?>
                        >Maio </option>
                        <option value="Junho" <?php if($mes=='Junho' ) echo 'selected'; ?>
                        >Junho </option>
                        <option value="Julho" <?php if($mes=='Julho' ) echo 'selected'; ?>
                        >Julho </option>
                        <option value="Agosto" <?php if($mes=='Agosto' ) echo 'selected'; ?>
                        >Agosto </option>
                        <option value="Setembro" <?php if($mes=='Setembro' ) echo 'selected'; ?>
                        >Setembro </option>
                        <option value="Outubro" <?php if($mes=='Outubro' ) echo 'selected'; ?>
                        >Outubro </option>
                        <option value="Novembro" <?php if($mes=='Novembro' ) echo 'selected'; ?>
                        >Novembro </option>
                        <option value="Dezembro" <?php if($mes=='Dezembro' ) echo 'selected'; ?>
                        >Dezembro </option>
                        <span class="glyphicon form-control-feedback" aria-hidden="true">
                        </span>
                    </select>
                </div>
                <div class="help-block with-errors">
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="bruto" class="col-sm-2 control-label">
                Bruto (R$): <span class="required">
                * </span>
                </label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-success" id="bruto" name="bruto" data-error="Por favor, informe um valor correto." required value="<?php echo htmlspecialchars($bruto); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
                    </span>
                </div>
                <div class="help-block with-errors">
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="unimed" class="col-sm-2 control-label">
                Unimed (R$): <span class="required">
                * </span>
                </label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-success" id="unimed" name="unimed" data-error="Por favor, informe um valor correto." pattern="^[0-9]+(\.[0-9]{1,2})?$" required value="<?php echo htmlspecialchars($unimed); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
                    </span>
                </div>
                <div class="help-block with-errors">
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="uniodonto" class="col-sm-2 control-label">
                Uniodonto (R$): <span class="required">
                * </span>
                </label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-success" id="uniodonto" name="uniodonto" data-error="Por favor, informe um valor correto." pattern="^[0-9]+(\.[0-9]{1,2})?$" required value="<?php echo htmlspecialchars($uniodonto); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
                    </span>
                </div>
                <div class="help-block with-errors">
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="adicional" class="col-sm-2 control-label">
                Adicional (R$): <span class="required">
                * </span>
                </label>
                <div class="col-sm-2">
                    <input class="form-control form-control-success" type="text" class="form-control" id="adicional" name="adicional" data-error="Por favor, informe um valor correto." pattern="^[0-9]+(\.[0-9]{1,2})?$" required value="<?php echo htmlspecialchars($adicional); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
                    </span>
                </div>
                <div class="help-block with-errors">
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="das" class="col-sm-2 control-label">
                DAS (R$): <span class="required">
                * </span>
                </label>
                <div class="col-sm-2">
                    <input class="form-control form-control-success" type="text" class="form-control" id="das" name="das" data-error="Por favor, informe um valor correto." pattern="^[0-9]+(\.[0-9]{1,2})?$" required value="<?php echo htmlspecialchars($das); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
                    </span>
                </div>
                <div class="help-block with-errors">
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="rcs" class="col-sm-2 control-label">
                RCS (R$): <span class="required">
                * </span>
                </label>
                <div class="col-sm-2">
                    <input class="form-control form-control-success" type="text" class="form-control" id="rcs" name="rcs" data-error="Por favor, informe um valor correto." pattern="^[0-9]+(\.[0-9]{1,2})?$" required value="<?php echo htmlspecialchars($rcs); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
                    </span>
                </div>
                <div class="help-block with-errors">
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="salario" class="col-sm-2 control-label">
                Salário (R$): <span class="required">
                * </span>
                </label>
                <div class="col-sm-2">
                    <input class="form-control form-control-success" type="text" class="form-control" id="salario" name="salario" data-error="Por favor, informe um valor correto." pattern="^[0-9]+(\.[0-9]{1,2})?$" required value="<?php echo htmlspecialchars($salario); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
                    </span>
                </div>
                <div class="help-block with-errors">
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="devendo" class="col-sm-2 control-label">
                Devendo (R$): <span class="required">
                * </span>
                </label>
                <div class="col-sm-2">
                    <input class="form-control form-control-success" type="text" class="form-control" id="devendo" name="devendo" data-error="Por favor, informe um valor correto." pattern="^[0-9]+(\.[0-9]{1,2})?$" required value="<?php echo htmlspecialchars($devendo); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
                    </span>
                </div>
                <div class="help-block with-errors">
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="id" class="col-sm-2 control-label">
                ID: <span class="required">
                </span>
                </label>
                <div class="col-sm-2">
                    <input class="form-control form-control-success" type="text" class="form-control" id="id" name="id" readonly="true" required value="<?php echo htmlspecialchars($idPagamento); ?>" />
                </div>
                <div class="help-block with-errors">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <abbr title="Alterar Pagamento">
                    <input class="btn btn-primary" type="submit" name="alterar" value="Alterar"/>
                    </abbr>
                    <abrr title="Cancelar">
                    <input class="btn btn-danger" type="button" value="Cancelar" onclick="javascript: location.href='index.php';"/>
                    </abrr>
                </div>
            </div>
            
        </form>
    </div>
</div>
<?php include("inc/footer.php"); ?>