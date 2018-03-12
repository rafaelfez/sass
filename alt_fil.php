<?php

require 'inc/funcoes.php';

$tituloPagina = "Alteração de Filiado";

$matricula = $nome = $telefone = $nascimento = $rg = $cpf = $celular = $sexo = $email = $taxa_rcs = $pis = $carteiratrab = $eleitor = $banco = $agencia = $conta = $digito = $civil = $escolaridade = $cnhnum = $cnhtipo = $cnhvalidade = $endcep = $endrua = $endnum = $endbairro = $endcidade = $enduf = $message = "";

if (isset($_GET['matricula'])) {
    list($matricula, $nome, $telefone, $nascimento, $rg, $cpf, $celular,
      $sexo, $email, $taxa_rcs, $pis, $carteiratrab, $eleitor, $banco, $agencia,
      $conta, $digito, $civil, $escolaridade, $cnhnum, $cnhtipo, $cnhvalidade,
       $endcep, $endrua, $endnum, $endbairro, $endcidade, $enduf)
       = get_filiado(filter_input(INPUT_GET, 'matricula', FILTER_SANITIZE_NUMBER_INT));
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
  $nascimento = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_STRING);
  $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_NUMBER_INT);
  $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
  $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);
  $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
  $taxa_rcs = filter_input(INPUT_POST, 'taxa_rcs', FILTER_SANITIZE_NUMBER_INT);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $pis = filter_input(INPUT_POST, 'pis', FILTER_SANITIZE_NUMBER_INT);
  $carteiratrab = filter_input(INPUT_POST, 'carteiratrab', FILTER_SANITIZE_NUMBER_INT);
  $eleitor = filter_input(INPUT_POST, 'eleitor', FILTER_SANITIZE_NUMBER_INT);
  $banco = filter_input(INPUT_POST, 'banco', FILTER_SANITIZE_STRING);
  $agencia = filter_input(INPUT_POST, 'agencia', FILTER_SANITIZE_NUMBER_INT);
  $conta = filter_input(INPUT_POST, 'conta', FILTER_SANITIZE_NUMBER_INT);
  $digito = filter_input(INPUT_POST, 'digito', FILTER_SANITIZE_NUMBER_INT);
  $civil = filter_input(INPUT_POST, 'civil', FILTER_SANITIZE_STRING);
  $escolaridade = filter_input(INPUT_POST, 'escolaridade', FILTER_SANITIZE_STRING);
  $cnhnum = filter_input(INPUT_POST, 'cnhnum', FILTER_SANITIZE_NUMBER_INT);
  $cnhtipo = filter_input(INPUT_POST, 'cnhtipo', FILTER_SANITIZE_STRING);
  $cnhvalidade = filter_input(INPUT_POST, 'cnhvalidade', FILTER_SANITIZE_STRING);
  $endcep = filter_input(INPUT_POST, 'endcep', FILTER_SANITIZE_STRING);
  $endrua = filter_input(INPUT_POST, 'endrua', FILTER_SANITIZE_STRING);
  $endnum = filter_input(INPUT_POST, 'endnum', FILTER_SANITIZE_NUMBER_INT);
  $endbairro = filter_input(INPUT_POST, 'endbairro', FILTER_SANITIZE_STRING);
  $endcidade = filter_input(INPUT_POST, 'endcidade', FILTER_SANITIZE_STRING);
  $enduf = filter_input(INPUT_POST, 'enduf', FILTER_SANITIZE_STRING);
}

include("inc/header.php");
include("util/viacep.js");
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h2 class="panel-title"><big>Alteração de Filiado</big></h2>
    </div>
    <div class="panel-body">
    <div class="panel-group">

        <?php
    try{
    if(isset($_POST["alterar"])){
      if(alterarFiliado($matricula, $nome, $telefone, $nascimento, $rg, $cpf, $celular,
        $sexo, $email, $taxa_rcs, $pis, $carteiratrab, $eleitor, $banco, $agencia, $conta, $digito, $civil, $escolaridade,
        $cnhnum, $cnhtipo, $cnhvalidade, $endcep, $endrua, $endnum, $endbairro, $endcidade, $enduf)){
        $message = mesSucesso("Dados do Filiado alterados com sucesso!");
        }else{
        $message = mesFalha("Não foi possível alterar.");
      }
    }
} catch(Exception $message){
  echo "Erro ao efetuar alteração de dados do Filiado.";
  echo $mesvsage->
        getMessage(); exit;} if(isset($message)){ echo $message; } ?>

        <form class="form-horizontal" data-toggle="validator" role="form" method="post" action="alt_fil.php">

          <div class="panel panel-info">
  <div class="panel-heading"><strong>Informações Básicas</strong></div>
  <div class="panel-body">

      <div class="form-group has-feedback">
        <label class="col-sm-2 control-label" for="matricula">Matrícula: <span class="required">*</span></label>
        <div class="col-sm-4">
          <input class="form-control form-control-success" placeholder="8 dígitos..." data-error="Por favor, informe um número de matrícula correto." id="matricula" name="matricula" pattern="[0-9]{8}$" required="" type="text" readonly value="<?php echo htmlspecialchars($matricula); ?>"> <span aria-hidden="true" class="glyphicon form-control-feedback"></span>
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
        <label for="sexo" class="col-sm-2 control-label">
        Sexo: <span class="required">
        * </span>
        </label>
        <div class="col-sm-4">
          <select id="sexo" class="form-control" data-error="Por favor, selecione o sexo." name="sexo" required>
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
        <label for="civil" class="col-sm-2 control-label">Estado Civil:<span class="required">*</span>
        </label>
        <div class="col-sm-4">
          <select class="form-control" id="civil" name="civil" data-error="Por favor, selecione o Estado Civil." required>
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
        <label for="escolaridade" class="col-sm-2 control-label">Escolaridade:<span class="required">*</span>
        </label>
        <div class="col-sm-4">
          <select class="form-control" id="escolaridade" name="escolaridade" data-error="Por favor, selecione uma escolaridade." required>
            <option value="">Selecione:</option>
            <option value="FUNDAMENTAL" <?php if($escolaridade=='FUNDAMENTAL') echo 'selected'; ?>>Ensino Fundamental</option>
            <option value="MEDIO" <?php if($escolaridade=='MEDIO') echo 'selected'; ?>>Ensino Médio</option>
            <option value="SUPERIOR" <?php if($escolaridade=='SUPERIOR') echo 'selected'; ?>>Ensino Superior</option>
            <option value="POSGRADUACAO" <?php if($escolaridade=='POSGRADUACAO') echo 'selected'; ?>>Pós-graduação</option>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </select>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>

      <div class="form-group has-feedback">
      <label for="taxa_rcs" class="col-sm-2 control-label">
      RCS(%): <span class="required">
      * </span>
      </label>
      <div class="col-sm-4">
        <input type="text" required pattern="[0-9]{1,2}$" data-error="Por favor, informe uma porcentagem." placeholder="Digite a % (somente número)" class="form-control" id="taxa_rcs" name="taxa_rcs" value="<?php echo htmlspecialchars($taxa_rcs); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
        </span>
      </div>
      <div class="help-block with-errors">
      </div>
      </div>

      </div>
</div>

      <div class="panel panel-info">
  <div class="panel-heading"><strong>Endereço</strong></div>
  <div class="panel-body">

      <div class="form-group has-feedback">
        <label for="endcep" class="col-sm-2 control-label">
        CEP: <span class="required">
        * </span>
        </label>
        <div class="col-sm-4">
          <input type="text" required pattern="[0-9]{8}$" placeholder="Digite somente os números..." class="form-control" id="endcep" name="endcep" data-error="Por favor, informe um número de CEP válido."  value="<?php echo htmlspecialchars($endcep); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
          </span>
        </div>
        <div class="help-block with-errors">
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
        <label for="endnum" class="col-sm-2 control-label">
        Número: <span class="required">
        * </span>
        </label>
        <div class="col-sm-4">
          <input type="text" required pattern="[0-9]{1,6}$" class="form-control" id="endnum" name="endnum" data-error="Por favor, informe um número de endereço válido."  value="<?php echo htmlspecialchars($endnum); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
          </span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>

      <div class="form-group has-feedback">
        <label for="endbairro" class="col-sm-2 control-label">
        Bairro: <span class="required">
        * </span>
        </label>
        <div class="col-sm-4">
          <input type="text" required  readonly="true" class="form-control" id="endbairro" name="endbairro" data-error="Por favor, informe um nome de bairro."  value="<?php echo htmlspecialchars($endbairro); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
          </span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>


      <div class="form-group has-feedback">
        <label for="endcidade" class="col-sm-2 control-label">
        Cidade: <span class="required">
        * </span>
        </label>
        <div class="col-sm-4">
          <input type="text" required  readonly="true" class="form-control" id="endcidade" name="endcidade" data-error="Por favor, informe uma cidade."  value="<?php echo htmlspecialchars($endcidade); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
          </span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>

      <div class="form-group has-feedback">
        <label for="enduf" class="col-sm-2 control-label">
        UF: <span class="required">
        * </span>
        </label>
        <div class="col-sm-4">
          <input type="text" required  readonly="true" class="form-control" id="enduf" name="enduf" data-error="Por favor, informe uma UF."  value="<?php echo htmlspecialchars($enduf); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
          </span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>

      </div>
      </div>


      <div class="panel panel-info">
  <div class="panel-heading"><strong>Informações de Contato</strong></div>
  <div class="panel-body">

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
        <label for="email" class="col-sm-2 control-label">
        Email: <span class="required">
        * </span>
        </label>
        <div class="col-sm-4">
          <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required placeholder="exemplo@sass.com" class="form-control" id="email" name="email" data-error="Por favor, informe um e-mail válido." value="<?php echo htmlspecialchars($email); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
          </span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>



    </div>
    </div>

    <div class="panel panel-info">
  <div class="panel-heading"><strong>Documentos</strong></div>
  <div class="panel-body">

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
        <label for="pis" class="col-sm-2 control-label">
        PIS: <span class="required">
        * </span>
        </label>
        <div class="col-sm-4">
          <input type="text" required pattern="[0-9]{7,9}$" placeholder="Digite somente os números..." class="form-control" id="pis" name="pis" data-error="Por favor, informe um número de PIS válido." data-min-length=7 value="<?php echo htmlspecialchars($pis); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
          </span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>

      <div class="form-group has-feedback">
        <label for="carteiratrab" class="col-sm-2 control-label">
        Carteira de Trabalho: <span class="required">
         </span>
        </label>
        <div class="col-sm-4">
          <input type="text" required pattern="[0-9]{7,9}$" placeholder="Digite somente os números..." class="form-control" id="carteiratrab" name="carteiratrab" data-error="Por favor, informe um número de Carteira de Trabalho válido." data-min-length=7 value="<?php echo htmlspecialchars($carteiratrab); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
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
        <label for="cnhnum" class="col-sm-2 control-label">
        CNH Número: <span class="required">
        * </span>
        </label>
        <div class="col-sm-4">
          <input type="text" required pattern="[0-9]{7,9}$" placeholder="Digite somente os números..." class="form-control" id="cnhnum" name="cnhnum" data-error="Por favor, informe um número de cnh válido." data-min-length=7 value="<?php echo htmlspecialchars($cnhnum); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
          </span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>

      <div class="form-group has-feedback">
        <label for="cnhtipo" class="col-sm-2 control-label">CNH Tipo:<span class="required">*</span>
        </label>
        <div class="col-sm-4">
          <select class="form-control" id="cnhtipo" name="cnhtipo" data-error="Por favor, selecione um tipo de CNH." required>
            <option value="">Selecione:</option>
            <option value="Sem habilitação" <?php if($cnhtipo=='Sem habilitação') echo 'selected'; ?>>Sem Habiilitação</option>
            <option value="A" <?php if($cnhtipo=='A') echo 'selected'; ?>>A</option>
            <option value="B" <?php if($cnhtipo=='B') echo 'selected'; ?>>B</option>
            <option value="C" <?php if($cnhtipo=='C') echo 'selected'; ?>>C</option>
            <option value="D" <?php if($cnhtipo=='D') echo 'selected'; ?>>D</option>
            <option value="E" <?php if($cnhtipo=='E') echo 'selected'; ?>>E</option>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          </select>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>


      <div class="form-group has-feedback">

        <label for="cnhvalidade" class="col-sm-2 control-label">
        CNH Validade: <span class="required">
        * </span>
        </label>
        <div class="col-sm-4">
          <input type="text" required pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="dd/mm/aaaa" class="form-control datepicker" id="cnhvalidade" name="cnhvalidade" data-error="Por favor, informe uma data de validade correta." value="<?php echo htmlspecialchars($cnhvalidade);?>"/><span class="glyphicon form-control-feedback" aria-hidden="true">
          </span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>

      </div>
    </div>


      <div class="panel panel-info">
  <div class="panel-heading"><strong>Informações Bancárias</strong></div>
  <div class="panel-body">

      <div class="form-group has-feedback">
        <label class="col-sm-2 control-label" for="nome">Banco: <span class="required">*</span></label>
        <div class="col-sm-4">
          <input class="form-control" placeholder="Nome do banco" data-error="Por favor, informe um nome de banco correto." id="banco" name="banco" placeholder="" required="" type="text" value="<?php echo htmlspecialchars($banco); ?>"> <span aria-hidden="true" class="glyphicon form-control-feedback"></span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>


      <div class="form-group has-feedback">
        <label for="agencia" class="col-sm-2 control-label">
        Agência: <span class="required">
        * </span>
        </label>
        <div class="col-sm-4">
          <input type="text" required pattern="[0-9]{3,9}$" placeholder="Digite somente os números..." class="form-control" id="agencia" name="agencia" data-error="Por favor, informe um número de Agência válido." data-min-length=7 value="<?php echo htmlspecialchars($agencia); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
          </span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>

      <div class="form-group has-feedback">
        <label for="conta" class="col-sm-2 control-label">
        Conta: <span class="required">
        * </span>
        </label>
        <div class="col-sm-4">
          <input type="text" required pattern="[0-9]{5,9}$" placeholder="Digite somente os números..." class="form-control" id="conta" name="conta" data-error="Por favor, informe um número de conta válido." data-min-length=7 value="<?php echo htmlspecialchars($conta); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
          </span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>

      <div class="form-group has-feedback">
        <label for="digito" class="col-sm-2 control-label">
        Dígito: <span class="required">
        * </span>
        </label>
        <div class="col-sm-4">
          <input type="text" required pattern="[0-9]{1}$" placeholder="Digite somente um número..." class="form-control" id="digito" name="digito" data-error="Por favor, informe um dígito válido." data-min-length=7 value="<?php echo htmlspecialchars($digito); ?>" /> <span class="glyphicon form-control-feedback" aria-hidden="true">
          </span>
        </div>
        <div class="help-block with-errors">
        </div>
      </div>

      </div>
    </div>
    </div>


          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <abrr title="Alterar Filiado"><input class="btn btn-primary" type="submit" name="alterar" value="Alterar"/></abrr>
              <abrr title="Cancelar Alteração"><input class="btn btn-danger" type="button" value="Cancelar" onclick="javascript: location.href='index.php';"/></abrr>
            </div>
          </div>


          </form>
          </div>
          </div>

          <?php //include( "inc/footer.php"); ?>
