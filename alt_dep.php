<?php

require 'inc/funcoes.php';

$tituloPagina = "Alteração";
$afiliado_matricula = $nome = $telefone = $nascimento = $endereco = $rg = $cpf = $celular = $email = $sexo = $parentesco = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $afiliado_matricula = filter_input(INPUT_POST, 'afiliado_matricula', FILTER_SANITIZE_NUMBER_INT);
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
  $nascimento = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_STRING);
  $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
  $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_NUMBER_INT);
  $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
  $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);
  $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
  $parentesco = filter_input(INPUT_POST, 'parentesco', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);


  if(empty($afiliado_matricula) || empty($nome) || empty($telefone) || empty($nascimento) || empty($endereco) || empty($rg) || empty($cpf) || empty($celular) || empty($sexo) || empty($email) || empty($parentesco)){
    mesErro("Por favor insira todos os campos");
  }else{
    if(alterarDependente($afiliado_matricula,$nome,$telefone,$nascimento,$endereco,$rg,$cpf,$celular,$email,$sexo,$parentesco)){
      mesErro("Dependente Alterado");
    }else{
      mesErro("Não foi possível alterar");
    }
  }
}




include("inc/header.php");
?>

<div class="cad-arr">
  <h2 class="bg-info">Alteração de Dependente</h2>
  <form class="form-group" method="post" action="alt_dep.php">
    <table>
        <tr>
          <th><label for="afiliado_matricula">Matrícula do Arrumador:<span class="required">*</span></label></th>
          <td><input type="text" class="form-control" id="afiliado_matricula" name="afiliado_matricula" value="<?php echo htmlspecialchars($afiliado_matricula); ?>"/></td>
        </tr>
        <tr>
          <th><label for="nome">Nome:<span class="required">*</span></label></th>
          <td><input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>"/></td>
        </tr>
        <tr>
          <th><label for="nascimento">Data de Nascimento:<span class="required">*</span></label></th>
          <td><input type="text" class="form-control" id="nascimento" name="nascimento" value="<?php echo htmlspecialchars($nascimento); ?>"/></td>
        </tr>

        <tr>
          <th><label for="sexo">Sexo:<span class="required">*<span></label></th>
          <td><select class="form-control" id="sexo" name="sexo">
            <option value="">Selecione um:</option>
            <option value="Masculino" <?php if($sexo == 'Masculino') echo 'selected'; ?>>Masculino</option>
            <option value="Feminino" <?php if($sexo == 'Feminino') echo 'selected'; ?>>Feminino</option>
          </select></td>
        </tr>
        <tr>
          <th><label for="telefone">Telefone:<span class="required">*</span></label></th>
          <td><input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>"/></td>
        </tr>
        <tr>
          <th><label for="celular">Celular:<span class="required">*</span></label></th>
          <td><input type="text" class="form-control" id="celular" name="celular" value="<?php echo htmlspecialchars($celular); ?>"/></td>
        </tr>
        <tr>
          <th><label for="email">Email:<span class="required">*</span></label></th>
          <td><input type="text" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"/></td>
        </tr>
        <tr>
          <th><label for="endereco">Endereço:<span class="required">*</span></label></th>
          <td><input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo htmlspecialchars($endereco); ?>"/></td>
        </tr>
        <tr>
          <th><label for="rg">RG:<span class="required">*</span></label></th>
          <td><input type="text" class="form-control" id="rg" name="rg" value="<?php echo htmlspecialchars($rg); ?>"/></td>
        </tr>

        <tr>
          <th><label for="cpf">CPF:<span class="cpf">*</span></label></th>
          <td><input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo htmlspecialchars($cpf); ?>"/></td>
        </tr>

        <tr>
          <th><label for="parentesco">Parentesco:<span class="required">*</span></label></th>
          <td><input type="text" class="form-control" id="parentesco" name="parentesco" value="<?php echo htmlspecialchars($parentesco); ?>"/></td>
        </tr>
    </table>
    <input class="btn btn-primary" type="submit" value="Alterar" />
  <input class="btn btn-danger" type="button" value="Cancelar" onclick="javascript: location.href='index.php';" />
  </form>
</div>

<?php
include("inc/footer.php");
?>
