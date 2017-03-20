<?php

require 'inc/funcoes.php';

$tituloPagina = "Alteração de Filiado";
$matricula = $nome = $telefone = $nascimento = $endereco = $rg = $cpf = $celular = $sexo = $taxa_rcs = $email = $situacao = '';

if (isset($_GET['matricula'])) {
    list($matricula, $nome, $telefone, $email, $endereco, $rg, $cpf, $celular, $sexo, $situacao, $taxa_rcs, $nascimento) = get_filiado(filter_input(INPUT_GET, 'matricula', FILTER_SANITIZE_NUMBER_INT));
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
  $nascimento = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_STRING);
  $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
  $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_NUMBER_INT);
  $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
  $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);
  $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
  $taxa_rcs = filter_input(INPUT_POST, 'taxa_rcs', FILTER_SANITIZE_NUMBER_INT);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $situacao = filter_input(INPUT_POST, 'situacao', FILTER_SANITIZE_STRING);


  if(empty($matricula) || empty($nome) || empty($telefone) || empty($nascimento) || empty($endereco) || empty($rg) || empty($cpf) || empty($celular) || empty($sexo) || empty($email) || empty($situacao) || empty($taxa_rcs)){
    mesAlerta("Por favor insira todos os campos");
  }else{
    if(alterarFiliado($matricula,$nome,$telefone,$nascimento,$endereco,$rg,$cpf,$celular,$sexo,$email,$situacao,$taxa_rcs)){
      mesSucesso("Filiado Alterado");
    }else{
      mesFalha("Não foi possível alterar");
    }
  }
}

include("inc/header.php");
?>

<!--<div class="consulta-alterar">
  <h2>Alterar Filiado</h2>
  <form class="form-consulta-alterar" method="post" action="alteracao.php">
    <table>
      <tr>
        <th><label for="matricula">Matrícula<span class="required">*</span></label></th>
        <td><input type="text" id="matricula" name="matricula" value="<?php /*echo htmlspecialchars($matricula); */?>"/></td>
      </tr>
    </table>
    <input class="button button--primary button--topic-php" type="submit" value="Pesquisar" />
    <input class="button button--primary button--topic-php" type="submit" value="Limpar" />
  </form>
</div>
-->
<div class="cad-arr">
  <h2 class="bg-info">Alteração de Filiado</h2>
  <form class="form-group" data-toggle="validator" method="post" action="alt_fil.php">
  <table>
    <tr>
      <th><label for="matricula">Matrícula:<span class="required">*</span></label></th>
      <td><input type="text" class="form-control" id="matricula" name="matricula" required value="<?php echo htmlspecialchars($matricula); ?>"/>
        <div class="help-block with-errors"></div>
      </td>
    </tr>
    <tr>
      <th><label for="nome">Nome:<span class="required">*</span></label></th>
      <td><input type="text" class="form-control" id="nome" name="nome" required value="<?php echo htmlspecialchars($nome); ?>"/>
        <div class="help-block with-errors"></div>
      </td>
    </tr>
    <tr>
      <th><label for="nascimento">Data de Nascimento:<span class="required">*</span></label></th>
      <td><input type="text" class="form-control" id="nascimento" name="nascimento" required value="<?php echo htmlspecialchars($nascimento); ?>"/>
        <div class="help-block with-errors"></div>
      </td>
    </tr>
    <tr>
      <th><label for="sexo">Sexo:<span class="required">*<span></label></th>
      <td> <select id="sexo" class="form-control" name="sexo" required>
        <option value="">Selecione:</option>
        <option value="Masculino" <?php if($sexo == 'Masculino') echo 'selected'; ?>>Masculino</option>
        <option value="Feminino" <?php if($sexo == 'Feminino') echo 'selected'; ?>>Feminino</option>
      </select>
        <div class="help-block with-errors"></div>
      </td>
    </tr>
    <tr>
      <th><label for="telefone">Telefone:<span class="required">*</span></label></th>
      <td><input type="text" class="form-control" id="telefone" name="telefone" required value="<?php echo htmlspecialchars($telefone); ?>"/>
        <div class="help-block with-errors"></div>
      </td>
    </tr>
    <tr>
      <th><label for="celular">Celular:<span class="required">*</span></label></th>
      <td><input type="text" class="form-control" id="celular" name="celular" required value="<?php echo htmlspecialchars($celular); ?>"/>
        <div class="help-block with-errors"></div>
      </td>
    </tr>
    <tr>
      <th><label for="email">Email:<span class="required">*</span></label></th>
      <td><input type="text" class="form-control" id="email" name="email" required value="<?php echo htmlspecialchars($email); ?>"/>
        <div class="help-block with-errors"></div>
      </td>
    </tr>
    <tr>
      <th><label for="endereco">Endereço:<span class="required">*</span></label></th>
      <td><input type="text" class="form-control" id="endereco" name="endereco" required value="<?php echo htmlspecialchars($endereco); ?>"/>
        <div class="help-block with-errors"></div>
      </td>
    </tr>
    <tr>
      <th><label for="rg">RG:<span class="required">*</span></label></th>
      <td><input type="text" class="form-control" id="rg" name="rg" required value="<?php echo htmlspecialchars($rg); ?>"/>
        <div class="help-block with-errors"></div>
      </td>
    </tr>
    <tr>
      <th><label for="cpf">CPF:<span class="cpf">*</span></label></th>
      <td><input type="text" class="form-control" id="cpf" name="cpf" required value="<?php echo htmlspecialchars($cpf); ?>"/>
        <div class="help-block with-errors"></div>
      </td>
    </tr>
    <tr>
      <th><label for="taxa_rcs">RCS(%):<span class="required">*</span></label></th>
      <td><input type="text" class="form-control" id="taxa_rcs" name="taxa_rcs" required value="<?php echo htmlspecialchars($taxa_rcs); ?>"/>
        <div class="help-block with-errors"></div>
      </td>
    </tr>
    <tr>
      <th><label for="situacao">Situação:<span class="required">*</span></label></th>
      <td><input type="text" class="form-control" id="situacao" name="situacao" required value="<?php echo htmlspecialchars($situacao); ?>"/>
        <div class="help-block with-errors"></div>
      </td>
    </tr>
  </table>
  <br/>
  <abrr title="Alterar Filiado"><input class="btn btn-primary" type="submit" value="Alterar"/></abrr>
  <abrr title="Cancelar alteração"><input class="btn btn-danger" type="button" value="Cancelar" onclick="javascript: location.href='index.php';" /></abrr>
  </form>
</div>


<?php
include("inc/footer.php");
?>
