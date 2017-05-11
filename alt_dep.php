<?php

require 'inc/funcoes.php';

$tituloPagina = "Alteração de Dependente";

$id = $afiliado_matricula = $nome = $telefone = $nascimento = $rg = $cpf = $celular = $sexo = $email = $eleitor = $civil
= $parentesco = $principal = $endcep = $endrua = $endnum = $endbairro = $endcidade = $enduf = $message = "";

if (isset($_GET['cpf'])) {
    list($id, $afiliado_matricula, $nome, $telefone, $nascimento, $rg, $cpf, $celular, $sexo, $email,
      $eleitor, $civil, $parentesco, $principal, $endcep, $endrua, $endnum, $endbairro, $endcidade, $enduf) = get_dependente(filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_NUMBER_INT));
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  $afiliado_matricula = filter_input(INPUT_POST, 'afiliado_matricula', FILTER_SANITIZE_NUMBER_INT);
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $parentesco = filter_input(INPUT_POST, 'parentesco', FILTER_SANITIZE_STRING);
  $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
  $nascimento = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_STRING);
  $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_NUMBER_INT);
  $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
  $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);
  $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
  $eleitor = filter_input(INPUT_POST, 'eleitor', FILTER_SANITIZE_NUMBER_INT);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $civil = filter_input(INPUT_POST, 'civil', FILTER_SANITIZE_STRING);
  $principal = filter_input(INPUT_POST, 'principal', FILTER_SANITIZE_NUMBER_INT);
  $endcep = filter_input(INPUT_POST, 'endcep', FILTER_SANITIZE_NUMBER_INT);
  $endrua = filter_input(INPUT_POST, 'endrua', FILTER_SANITIZE_STRING);
  $endnum = filter_input(INPUT_POST, 'endnum', FILTER_SANITIZE_NUMBER_INT);
  $endbairro = filter_input(INPUT_POST, 'endbairro', FILTER_SANITIZE_STRING);
  $endcidade = filter_input(INPUT_POST, 'endcidade', FILTER_SANITIZE_STRING);
  $enduf = filter_input(INPUT_POST, 'enduf', FILTER_SANITIZE_STRING);
}

include("inc/header.php");
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h2 class="panel-title">
        <big>
        Alteração de Dependente </big>
        </h2>
    </div>
    <div class="panel-body">

        <?php
try{
  if(isset($_POST["alterar"])){
    if(empty($afiliado_matricula) || empty($nome) || empty($telefone) || empty($nascimento) || empty($rg) || empty($cpf) || empty($celular) || empty($sexo) || empty($email) || empty($parentesco)){
    $message = mesAlerta("Por favor insira todos os campos.");
  }else{
    if(alterarDependente($id, $afiliado_matricula, $nome, $telefone, $nascimento, $rg, $cpf, $celular, $sexo, $email, $eleitor, $civil, $parentesco, $principal, $endcep, $endrua, $endnum, $endbairro, $endcidade, $enduf)){
      $message = mesSucesso("Dados do Dependente alterados com sucesso!");
    }else{
      $message = mesFalha("Não foi possível alterar.");
    }
  }
}
}
  catch(Exception $message){
  echo "Erro ao efetuar alteração de dados do Dependente.";
  echo $message->
         getMessage(); exit;} if(isset($message)){ echo $message; } ?>

        <form class="form-horizontal" data-toggle="validator" method="post" role="form" action="alt_dep.php">
		
		  <div class="form-group has-feedback">
            <label for="id" class="col-sm-2 control-label">
            Id: <span class="id">
            * </span>
            </label>
            <div class="col-sm-4">
              <input type="text" readonly="true" required pattern="[0-9]{11}$" placeholder="Digite somente os números..." class="form-control" id="id" name="id" data-error="Por favor, informe um número de Id válido." value="<?php echo htmlspecialchars($id); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
              </span>
            </div>
            <div class="help-block with-errors">
            </div>
          </div>
		
          <div class="form-group has-feedback">
            <label for="cpf" class="col-sm-2 control-label">
            CPF: <span class="cpf">
            * </span>
            </label>
            <div class="col-sm-4">
              <input type="text" required pattern="[0-9]{11}$" placeholder="Digite somente os números..." class="form-control" id="cpf" name="cpf" data-error="Por favor, informe um número de CPF válido." value="<?php echo htmlspecialchars($cpf); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
              </span>
            </div>
            <div class="help-block with-errors">
            </div>
          </div>

          <div class="form-group has-feedback">
            <label class="col-sm-2 control-label" for="matricula">Matrícula do Afiliado: <span class="required">*</span></label>
            <div class="col-sm-4">
              <input class="form-control form-control-success" placeholder="8 digitos"data-error="Por favor, informe um número de matrícula correto." id="afiliado_matricula" name="afiliado_matricula" pattern="[0-9]{8}$" required="" type="text" value="<?php echo htmlspecialchars($afiliado_matricula); ?>"> <span aria-hidden="true" class="glyphicon form-control-feedback"></span>
            </div>
            <div class="help-block with-errors">
            </div>
          </div>

          <div class="form-group has-feedback">
            <label class="col-sm-2 control-label" for="nome">Nome Completo: <span class="required">*</span></label>
            <div class="col-sm-4">
              <input class="form-control" data-error="Por favor, informe um nome correto." id="nome" name="nome" placeholder="" required="" type="text" value="<?php echo htmlspecialchars($nome); ?>"> <span aria-hidden="true" class="glyphicon form-control-feedback"></span>
            </div>
            <div class="help-block with-errors">
            </div>
          </div>

          <div class="form-group has-feedback">
            <label class="col-sm-2 control-label" for="parentesco">Parentesco: <span class="required">*</span></label>
            <div class="col-sm-4">
              <input class="form-control" placeholder="ex:Irmão" data-error="Por favor, informe um parentesco." id="parentesco" name="parentesco" placeholder="" required="" type="text" value="<?php echo htmlspecialchars($parentesco); ?>"> <span aria-hidden="true" class="glyphicon form-control-feedback"></span>
            </div>
            <div class="help-block with-errors">
            </div>
          </div>

          <div class="form-group has-feedback">
            <label for="principal" class="col-sm-2 control-label">Principal:<span class="required">*</span>
            </label>
            <div class="col-sm-4">
              <select class="form-control" id="principal" name="principal" data-error="Por favor, selecione se é principal." required>
                <option value="">Selecione:</option>
                <option value="0" <?php if($principal=='0') echo 'selected'; ?>>Não</option>
                <option value="1" <?php if($principal=='1') echo 'selected'; ?>>Sim</option>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
              </select>
            </div>
            <div class="help-block with-errors">
            </div>
          </div>

          <div class="form-group has-feedback">
            <label for="email" class="col-sm-2 control-label">
            Email: <span class="required">
            * </span>
            </label>
            <div class="col-sm-4">
              <input type="email" placeholder="exemplo@sass.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required placeholder="" class="form-control" id="email" name="email" data-error="Por favor, informe um e-mail válido." value="<?php echo htmlspecialchars($email); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
              </span>
            </div>
            <div class="help-block with-errors">
            </div>
          </div>

          <div class="form-group has-feedback">
            <label for="rg" class="col-sm-2 control-label">
            RG: <span class="required">
            * </span>
            </label>
            <div class="col-sm-4">
              <input type="text" required pattern="[0-9]{7,9}$" placeholder="Digite somente os números..." class="form-control" id="rg" name="rg" data-error="Por favor, informe um número de RG válido." data-min-length=7 value="<?php echo htmlspecialchars($rg); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
              </span>
            </div>
            <div class="help-block with-errors">
            </div>
          </div>



          <div class="form-group has-feedback">
            <label for="celular" class="col-sm-2 control-label">
            Celular: <span class="required">
            * </span>
            </label>
            <div class="col-sm-4">
              <input type="text" required pattern="[0-9]{9,13}$" placeholder="Digite somente os números..." class="form-control" id="celular" name="celular" data-error="Por favor, informe um número de celular correto." value="<?php echo htmlspecialchars($celular); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
              </span>
            </div>
            <div class="help-block with-errors">
            </div>
          </div>

          <div class="form-group has-feedback">
            <label for="telefone" class="col-sm-2 control-label">
            Telefone: <span class="required">
            * </span>
            </label>
            <div class="col-sm-4">
              <input type="text" required pattern="[0-9]{8,12}$" placeholder="Digite somente os números..." class="form-control" id="telefone" name="telefone" data-error="Por favor, informe um número de telefone correto." value="<?php echo htmlspecialchars($telefone); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
              </span>
            </div>
            <div class="help-block with-errors">
            </div>
          </div>

          <div class="form-group has-feedback">
            <label for="sexo" class="col-sm-2 control-label">
            Sexo: <span class="required">
            * </span>
            </label>
            <div class="col-sm-4">
              <select id="sexo" class="form-control" data-error="Por favor, selecione o sexo." name="sexo" required>
                <option value="">
                Selecione: </option>
                <option value="Masculino" <?php if($sexo=='Masculino' ) echo 'selected'; ?>
                >Masculino </option>
                <option value="Feminino" <?php if($sexo=='Feminino' ) echo 'selected'; ?>
                >Feminino </option>
                <span class="glyphicon form-control-feedback" aria-hidden="true">
                </span>
              </select>
            </div>
            <div class="help-block with-errors">
            </div>
          </div>


          <div class="form-group has-feedback">

            <script>
               $(function(){
              var datepicker = $.fn.datepicker.noConflict();
              $.fn.bootstrapDP = datepicker;
              $(".datepicker").bootstrapDP({
                language: "pt-BR",
                orientation: "bottom auto",
                autoclose: true,
                todayHighlight: true
              });
            });

          </script>


            <label for="nascimento" class="col-sm-2 control-label">
            Data de Nascimento: <span class="required">
            * </span>
            </label>
            <div class="col-sm-4">
              <input type="text" required pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="dd/mm/aaaa" class="form-control datepicker" id="nascimento" name="nascimento" data-error="Por favor, informe uma data de nascimento correta." value="<?php echo htmlspecialchars($nascimento);?>"/><span class="glyphicon form-control-feedback" aria-hidden="true">
              </span>
            </div>
            <div class="help-block with-errors">
            </div>
          </div>

          <div class="form-group has-feedback">
            <label for="eleitor" class="col-sm-2 control-label">
            Título de Eleitor: <span class="required">
            * </span>
            </label>
            <div class="col-sm-4">
              <input type="text" required pattern="[0-9]{7,9}$" placeholder="Digite somente os números..." class="form-control" id="eleitor" name="eleitor" data-error="Por favor, informe um número de Título de Eleitor válido." data-min-length=7 value="<?php echo htmlspecialchars($eleitor); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
              </span>
            </div>
            <div class="help-block with-errors">
            </div>
          </div>

          <div class="form-group has-feedback">
            <label for="civil" class="col-sm-2 control-label">Estado Civil:<span class="required">*</span>
            </label>
            <div class="col-sm-4">
              <select class="form-control" id="civil" name="civil" data-error="Por favor, selecione estado civil." required>
                <option value="">Selecione:</option>
                <option value="SOLTEIRO" <?php if($civil=='SOLTEIRO') echo 'selected'; ?>>Solteiro</option>
                <option value="CASADO" <?php if($civil=='CASADO') echo 'selected'; ?>>Casado</option>
                <option value="SEPARADO" <?php if($civil=='SEPARADO') echo 'selected'; ?>>Separado</option>
                <option value="DIVORCIADO" <?php if($civil=='DIVORCIADO') echo 'selected'; ?>>Divorciado</option>
                <option value="VIUVO" <?php if($civil=='VIUVO') echo 'selected'; ?>>Viúvo</option>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
              </select>
            </div>
            <div class="help-block with-errors">
            </div>
          </div>



          <div class="form-group has-feedback">
          <label for="endcep" class="col-sm-2 control-label">CEP:<span class="required">*</span></label>
          <div class="col-sm-4">
          <input type="text" required pattern="[0-9]{8}$" data-error="Por favor, informe um número de CEP válido." placeholder="Digite somente os números..." class="form-control" id="endcep" name="endcep" value="<?php echo htmlspecialchars($endcep); ?>"/>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors"></div>
          </div>
          </div>


          <div class="form-group has-feedback">
            <label for="endrua" class="col-sm-2 control-label">
            Rua: <span class="required">
            * </span>
            </label>
            <div class="col-sm-4">
              <input type="text" required placeholder="" class="form-control" id="endrua" name="endrua" data-error="Por favor, informe um nome de logradouro." value="<?php echo htmlspecialchars($endrua); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
              </span>
            </div>
            <div class="help-block with-errors">
            </div>
          </div>

          <div class="form-group has-feedback">
          <label for="endnum" class="col-sm-2 control-label">Número:<span class="required">*</span></label>
          <div class="col-sm-4">
          <input type="text" required class="form-control" id="endnum"  name="endnum" data-error="Por favor, informe um número válido."value="<?php echo htmlspecialchars($endnum); ?>"/>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors"></div>
          </div>
          </div>

          <div class="form-group has-feedback">
          <label for="endbairro" class="col-sm-2 control-label">Bairro:<span class="required">*</span></label>
          <div class="col-sm-4">
          <input type="text" required placeholder="" class="form-control" id="endbairro"  name="endbairro" data-error="Por favor, informe um nome de bairro." value="<?php echo htmlspecialchars($endbairro); ?>"/>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors"></div>
          </div>
          </div>

          <div class="form-group has-feedback">
          <label for="endcidade" class="col-sm-2 control-label">Cidade:<span class="required">*</span></label>
          <div class="col-sm-4">
          <select id="endcidade" class="form-control" data-error="Por favor, selecione uma cidade." name="endcidade" required>
          <option value="São Sebastião" <?php if($endcidade == 'São Sebastião') echo 'selected'; ?>>São Sebastião</option>
          <option value="Caraguatuba" <?php if($endcidade == 'Caraguatuba') echo 'selected'; ?>>Caraguatatuba</option>
          <option value="Ilhabela" <?php if($endcidade == 'Ilhabela') echo 'selected'; ?>>Ilhabela</option>
          <option value="Paraibuna" <?php if($endcidade == 'Paraibuna') echo 'selected'; ?>>Paraibuna</option>
          <option value="São José dos Campos" <?php if($endcidade == 'São José dos Campos') echo 'selected'; ?>>São José dos Campos</option>
          <option value="São Paulo" <?php if($endcidade == 'São Paulo') echo 'selected'; ?>>São Paulo</option>
          <option value="Tabauté" <?php if($endcidade == 'Tabauté') echo 'selected'; ?>>Taubaté</option>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </select> <div class="help-block with-errors"></div>
          </div>
          </div>

          <div class="form-group has-feedback">
          <label for="enduf" class="col-sm-2 control-label">UF:<span class="required">*</span></label>
          <div class="col-sm-4">
          <select id="enduf" class="form-control" data-error="Por favor, selecione uma UF." name="enduf" required>
          <option value="SP" <?php if($enduf == 'SP') echo 'selected'; ?>>SP</option>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </select> <div class="help-block with-errors"></div>
          </div>
          </div>



    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <abbr title="Alterar Dependente">
        <input class="btn btn-primary" type="submit" name="alterar" value="Alterar"/>
        </abbr>
        <abbr title="Alterar Cadastro">
        <input class="btn btn-danger" type="button" value="Cancelar" onclick="javascript: location.href='index.php';"/>
        </abbr>
      </div>
    </div>

    </form>
    </div>
    </div>

    <?php //include( "inc/footer.php"); ?>
