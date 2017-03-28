<?php

require 'inc/funcoes.php';

$tituloPagina = "Cadastro de Filiado";
$matricula = $nome = $telefone = $nascimento = $endereco = $numero_endereco = $bairro = $cidade = $cep = $uf = $rg = $cpf = $celular = $sexo = $email = $taxa_rcs = $message = "";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
  $nascimento = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_STRING);
  $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
  //$numero_endereco = filter_input(INPUT_POST, 'numero_endereco', FILTER_SANITIZE_NUMBER_INT);
  //$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
  //$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
  //$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
  $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_NUMBER_INT);
  $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
  $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);
  $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
  $taxa_rcs = filter_input(INPUT_POST, 'taxa_rcs', FILTER_SANITIZE_NUMBER_INT);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

  if(empty($matricula) || empty($nome) || empty($nascimento) || empty($celular) ||  empty($email) || empty($endereco) || empty($rg) || empty($cpf) || empty($taxa_rcs)){
    mesAlerta("Por favor insira todos os campos");
  }else{
    if(add_fil($matricula,$nome,$nascimento,$sexo,$telefone,$celular,$email,$endereco,$rg,$cpf,$taxa_rcs)){
      mesSucesso("Filiado cadastrado");
    }else{
      mesFalha("Não foi possível concluir");
    }
  }
}




include("inc/header.php");
?>



  <div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title"><big>Cadastro de Filiado</big></h2>
  </div>
  <div class="panel-body">

  <?php
        if(isset($message)){
          echo $message;
        }
      ?>

  <form class="form-horizontal" data-toggle="validator" role="form" method="post" action="cad_fil.php">

      <div class="form-group has-feedback">
        <label for="matricula" class="col-sm-2 control-label">Matrícula:<span class="required">*</span></label>
        <div class="col-sm-2">
        <input type="text"  required class="form-control  form-control-success" id="matricula" name="matricula"   data-error="Por favor, informe um número de matrícula correto." pattern="[0-9]{5,7}$" value="<?php echo htmlspecialchars($matricula); ?>"/>
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <div class="help-block with-errors"></div>
        </div>


      <div class="form-group has-feedback">
      <label for="nome" class="col-sm-2 control-label">Nome Completo:<span class="required">*</span></label>
      <div class="col-sm-4">
      <input type="text" required placeholder="" class="form-control" id="nome" name="nome" data-error="Por favor, informe um nome correto." value="<?php echo htmlspecialchars($nome); ?>"/>
       <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
         </div>
      <div class="help-block with-errors"></div>
      </div>



      <script>
        $(document).ready(function() {
          $('.datepicker').datepicker({
            language: "pt-BR",
            orientation: "bottom auto",
            autoclose: true,
            todayHighlight: true
           });
         });

      </script>
      <div class="form-group has-feedback">
      <label for="nascimento" class="col-sm-2 control-label">Data de Nascimento:<span class="required">*</span></label>
      <div class="col-sm-2">
      <input  data-provide="datepicker" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="dd/mm/aaaa" class="form-control datepicker" id="nascimento" name="nascimento" data-error="Por favor, informe uma data de nascimento correta." required value="<?php echo htmlspecialchars($nascimento); ?>"/>
      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
      </div>
      <div class="help-block with-errors"></div>
      </div>
      

      <div class="form-group has-feedback">
      <label for="sexo" class="col-sm-2 control-label">Sexo:<span class="required">*</span></label>
      <div class="col-sm-2">
      <select id="sexo" class="form-control" data-error="Por favor, selecione o sexo." name="sexo" required>
        <option value="">Selecione:</option>
        <option value="Masculino" <?php if($sexo == 'Masculino') echo 'selected'; ?>>Masculino</option>
        <option value="Feminino" <?php if($sexo == 'Feminino') echo 'selected'; ?>>Feminino</option>
       <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
      </select></div><div class="help-block with-errors"></div>
      </div>
      

      <div class="form-group has-feedback">
      <label for="telefone" class="col-sm-2 control-label">Telefone:<span class="required">*</span></label>
      <div class="col-sm-3">
      <input type="text" required pattern="[0-9]{9,12}$" placeholder="Digite somente os números..." class="form-control" id="telefone" name="telefone" data-error="Por favor, informe um número de telefone correto." value="<?php echo htmlspecialchars($telefone); ?>"/>
      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
      </div>
      <div class="help-block with-errors"></div>
      </div>
      

      <div class="form-group has-feedback">
      <label for="celular" class="col-sm-2 control-label">Celular:<span class="required">*</span></label>
      <div class="col-sm-3">
      <input type="text" required pattern="[0-9]{10,12}$"  placeholder="Digite somente os números..." class="form-control" id="celular" name="celular" data-error="Por favor, informe um número de celular correto." value="<?php echo htmlspecialchars($celular); ?>"/>
      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
      </div>
      <div class="help-block with-errors"></div>
      </div>
      


      <div class="form-group has-feedback">
      <label for="email" class="col-sm-2 control-label">Email:<span class="required">*</span></label>
      <div class="col-sm-3">
      <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required placeholder="" class="form-control" id="email" name="email" data-error="Por favor, informe um e-mail válido." value="<?php echo htmlspecialchars($email); ?>"/>
      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
      </div>
      <div class="help-block with-errors"></div>
      </div>


      <div class="form-group has-feedback">
      <label for="rg" class="col-sm-2 control-label">RG:<span class="required">*</span></label>
      <div class="col-sm-3">
      <input type="text" required pattern="[0-9]{7,9}$" placeholder="Digite somente os números..." class="form-control" id="rg" name="rg" data-error="Por favor, informe um número de RG válido." data-min-length=7 value="<?php echo htmlspecialchars($rg); ?>"/>
       <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
       </div>
      <div class="help-block with-errors"></div>
      </div>

      <div class="form-group has-feedback">
      <label for="cpf" class="col-sm-2 control-label">CPF:<span class="cpf">*</span></label>
      <div class="col-sm-3">
      <input type="text" required pattern="[0-9]{11}$" placeholder="Digite somente os números..." class="form-control" id="cpf" name="cpf" data-error="Por favor, informe um número de CPF válido." value="<?php echo htmlspecialchars($cpf); ?>"/>
       <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
       </div>
      <div class="help-block with-errors"></div>
      </div>


      <div class="form-group has-feedback">
      <label for="endereco" class="col-sm-2 control-label">Endereço:<span class="required">*</span></label>
      <div class="col-sm-3">
      <input type="text" required placeholder="" class="form-control" id="endereco"  name="endereco" data-error="Por favor, informe um nome de logradouro."value="<?php echo htmlspecialchars($endereco); ?>"/>
      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
      </div>
      <div class="help-block with-errors"></div>
      </div>

      <!--<div class="form-group has-feedback">
      <label for="numero_endereco" class="col-sm-2 control-label">Número:<span class="required">*</span></label>
      <div class="col-sm-10">
      <input type="text" required placeholder="" class="form-control" id="numero_endereco"  name="numero_endereco" data-error="Por favor, informe um número válido."value="<?php echo htmlspecialchars($numero_endereco); ?>"/>
      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
      <div class="help-block with-errors"></div>
      </div>
      </div>

      <div class="form-group has-feedback">
      <label for="bairro" class="col-sm-2 control-label">Bairro:<span class="required">*</span></label>
      <div class="col-sm-10">
      <input type="text" required placeholder="" class="form-control" id="bairro"  name="bairro" data-error="Por favor, informe um nome de bairro." value="<?php echo htmlspecialchars($bairro); ?>"/>
      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
      <div class="help-block with-errors"></div>
      </div>
      </div>

      <div class="form-group has-feedback">
      <label for="cidade" class="col-sm-2 control-label">Cidade:<span class="required">*</span></label>
      <div class="col-sm-10">
      <select id="cidade" class="form-control" data-error="Por favor, selecione uma cidade." name="cidade" required>
        <option value="">Selecione:</option>
        <option value="São Sebastião" <?php if($cidade == 'São Sebastião') echo 'selected'; ?>>São Sebastião</option>
        <option value="Caraguatuba" <?php if($cidade == 'Caraguatuba') echo 'selected'; ?>>Caraguatatuba</option>
        <option value="Ilhabela" <?php if($cidade == 'Ilhabela') echo 'selected'; ?>>Ilhabela</option>
       <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
      </select> <div class="help-block with-errors"></div>
      </div>
      </div>

      <div class="form-group has-feedback">
      <label for="cep" class="col-sm-2 control-label">CEP:<span class="required">*</span></label>
      <div class="col-sm-10">
      <input type="text" required pattern="[0-9]{8}$" data-error="Por favor, informe um número de CEP válido." placeholder="Digite somente os números..." class="form-control" id="cep" name="cep" value="<?php echo htmlspecialchars($cep); ?>"/>
       <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
      <div class="help-block with-errors"></div>
      </div>
      </div>
  -->

      <div class="form-group has-feedback">
      <label for="taxa_rcs" class="col-sm-2 control-label">RCS(%):<span class="required">*</span></label>
      <div class="col-sm-3">
      <input type="text" required pattern="[0-9]{2}$" data-error="Por favor, informe uma porcentagem." placeholder="Digite a % (somente número)" class="form-control" id="taxa_rcs" name="taxa_rcs" value="<?php echo htmlspecialchars($taxa_rcs); ?>"/>
       <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
       </div>
      <div class="help-block with-errors"></div>
      </div>

    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <abbr title="Cadastrar Filiado"><input class="btn btn-primary" type="submit" value="Cadastrar"/></abbr>
    <abbr title="Cancelar cadastro"><input class="btn btn-danger" type="button" value="Cancelar" onclick="javascript: location.href='index.php';" /></abbr>
    </div>
     </div>

     </form>
     </div>

      </div>



<?php include("inc/footer.php"); ?>
