<?php

require 'inc/funcoes.php';

$tituloPagina = "Fluxo Adicional";

$afiliado_matricula = $mes = $ano = $adicional = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $afiliado_matricula = filter_input(INPUT_POST, 'Afiliado_matricula', FILTER_SANITIZE_NUMBER_INT);
  $mes = filter_input(INPUT_POST, 'mes', FILTER_SANITIZE_STRING);
  $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_NUMBER_INT);
  $adicional = filter_input(INPUT_POST, 'adicional', FILTER_SANITIZE_STRING);



if(empty($afiliado_matricula)||empty($mes)||empty($ano)||empty($adicional)){
    mesAlerta("Por favor insira todos os campos");
  }else{
    if(adicional($afiliado_matricula, $mes, $ano, $adicional)){
      mesSucesso("Adicional cadastrado");
      }else{
      mesFalha("Não foi possível concluir");
    }
  }


  /*echo adicional($afiliado_matricula, $mes, $ano, $adicional);*/

}

include("inc/header.php");
?>
    
    <div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><big>Fluxo Adicional</big></h2>
  </div>
  <div class="panel-body">

  <form class="form-horizontal" data-toggle="validator" role="form" method="post" action="adicional.php">

    
        <div class="form-group has-feedback">
        <label for="Afiliado_matricula" class="col-sm-2 control-label">Matrícula:<span class="required">*</span></label>
        <div class="col-sm-2">
        <input type="text" class="form-control  form-control-success" id="Afiliado_matricula" name="Afiliado_matricula" data-error="Por favor, informe um número de matrícula correto." pattern="[0-9]{5,7}$" required value="<?php echo htmlspecialchars($afiliado_matricula); ?>"/>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
        <div class="help-block with-errors"></div>
      </div>
        
      
        <div class="form-group has-feedback">
        <label for="mes" class="col-sm-2 control-label">Mês:<span class="required">*</span></label>
        <div class="col-sm-2">
        <select class="form-control  form-control-success"  id="mes" name="mes" data-error="Por favor, selecione o mês referente." required>
          <option value="">Selecione:</option>
          <option value="Janeiro" <?php if($mes == 'Janeiro') echo 'selected'; ?>>Janeiro</option>
          <option value="Fevereiro" <?php if($mes == 'Fevereiro') echo 'selected'; ?>>Fevereiro</option>
          <option value="Março" <?php if($mes == 'Março') echo 'selected'; ?>>Março</option>
          <option value="Abril" <?php if($mes == 'Abril') echo 'selected'; ?>>Abril</option>
          <option value="Maio" <?php if($mes == 'Maio') echo 'selected'; ?>>Maio</option>
          <option value="Junho" <?php if($mes == 'Junho') echo 'selected'; ?>>Junho</option>
          <option value="Julho" <?php if($mes == 'Julho') echo 'selected'; ?>>Julho</option>
          <option value="Agosto" <?php if($mes == 'Agosto') echo 'selected'; ?>>Agosto</option>
          <option value="Setembro" <?php if($mes == 'Setembro') echo 'selected'; ?>>Setembro</option>
          <option value="Outubro" <?php if($mes == 'Outubro') echo 'selected'; ?>>Outubro</option>
          <option value="Novembro" <?php if($mes == 'Novembro') echo 'selected'; ?>>Novembro</option>
          <option value="Dezembro" <?php if($mes == 'Dezembro') echo 'selected'; ?>>Dezembro</option>
        
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
              </select>
              </div>
            <div class="help-block with-errors"></div>
          </div>
        

        <div class="form-group has-feedback">
        <label for="ano" class="col-sm-2 control-label">Ano:<span class="required">*</span></label>
        <div class="col-sm-2">
        <select class="form-control  form-control-success" id="ano" name="ano" required>
          <option value="2017" <?php if($ano == '2017') echo 'selected'; ?>>2017</option>
          <option value="2018" <?php if($ano == '2018') echo 'selected'; ?>>2018</option>
          <option value="2019" <?php if($ano == '2019') echo 'selected'; ?>>2019</option>
          <option value="2020" <?php if($ano == '2020') echo 'selected'; ?>>2020</option>
        
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </select>
          </div>
            <div class="help-block with-errors"></div>
          </div>
          


        <div class="form-group has-feedback">
        <label for="adicional" class="col-sm-2 control-label">Adicional (R$):<span class="required">*</span></label>
        <div class="col-sm-2">
        <input type="text" class="form-control  form-control-success id="adicional" name="adicional" data-error="Por favor, informe um valor correto." required value="<?php echo htmlspecialchars($adicional); ?>"/>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </div>
            <div class="help-block with-errors"></div>
          </div>
        
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <abrr title="Concluir Adicional"><input class="btn btn-primary" type="submit" value="Concluir" /></abrr>
    <abrr title="Cancelar"><input class="btn btn-danger" type="button" value="Cancelar"  onclick="javascript: location.href='index.php';"/></abrr>
    </div>
    </div>

  </form>


</div>
</div>

<?php include("inc/footer.php"); ?>

