<?php

require 'inc/funcoes.php';

$tituloPagina = "Cadastro de Convênio";
$cnpj = $nome = $empresa = $categoria = $desconto = $mensalidade = '';
$DAS_Afiliado_Matricula = $RCS_Afiliado_Matricula = 1000;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_NUMBER_INT);
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $empresa = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
  $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
  $desconto = filter_input(INPUT_POST, 'desconto', FILTER_SANITIZE_STRING);
  $mensalidade = filter_input(INPUT_POST, 'mensalidade', FILTER_SANITIZE_NUMBER_INT);

  if(empty($cnpj) || empty($nome)|| empty($categoria) ||empty($empresa) ||empty($mensalidade) ||empty($desconto)){
    $message = '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Atenção! </strong> Por favor insira todos os campos</div>';
  }else{
    if(add_con($cnpj,$nome,$categoria, $empresa, $mensalidade, $desconto, $DAS_Afiliado_Matricula, $RCS_Afiliado_Matricula)){
      $message = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Cadastro efetuado com sucesso!</div>';
    }else{
      $message = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Erro ao efetuar cadastro</div>';
    }
    }
  }




include("inc/header.php");
?>
<div class="cad-arr">
<?php
        if(isset($message)){
          echo $message;
        }
      ?>
  <h2 class="bg-info">Cadastro de Convênio</h2>
  
  <form class="form-group" data-toggle="validator" method="post" action="cad_con.php">
    <table>
        <tr>
          <th><label for="cnpj">CNPJ:<span class="required">*</span></label></th>
          <td><input type="text" required placeholder="" class="form-control" id="cnpj" name="cnpj" required value="<?php echo htmlspecialchars($cnpj); ?>"/>
            <div class="help-block with-errors"></div>
          </td>
        </tr>
        <tr>
          <th><label for="nome">Nome:<span class="required">*</span></label></th>
          <td><input type="text" required placeholder="" class="form-control" id="nome" name="nome" required value="<?php echo htmlspecialchars($nome); ?>"/>
            <div class="help-block with-errors"></div>
          </td>
        </tr>
        <tr>
          <th><label for="empresa">Empresa:<span class="required">*</span></label></th>
          <td><input type="text" required placeholder="" class="form-control" id="empresa" name="empresa" required value="<?php echo htmlspecialchars($empresa); ?>"/>
            <div class="help-block with-errors"></div>
          </td>
        </tr>
        <tr>
          <th><label for="categoria">Categoria:<span class="required">*</span></label></th>
          <td><input type="text" required placeholder="" class="form-control" id="categoria" name="categoria" required value="<?php echo htmlspecialchars($categoria); ?>"/>
            <div class="help-block with-errors"></div>
          </td>
        </tr>
        <tr>
          <th><label for="desconto" >Desconto:<span class="required">*<span></label></th>
          <td><select class="form-control" required id="desconto" name="desconto" required>
            <option value="">Selecione:</option>
            <option value="DAS" <?php if($desconto == 'DAS') echo 'selected'; ?>>DAS</option>
            <option value="RCS" <?php if($desconto == 'RCS') echo 'selected'; ?>>RCS</option>
          </select>
            <div class="help-block with-errors"></div>
          </td>
        </tr>
        <tr>
          <th><label for="mensalidade">Mensalidade:<span class="required">*</span></label></th>
          <td><input type="text" class="form-control" id="mensalidade" name="mensalidade" required value="<?php echo htmlspecialchars($mensalidade); ?>"/>
            <div class="help-block with-errors"></div>
          </td>
        </tr>
      </table>
      <br/>
      <abbr title="Cadastrar Convênio"><input class="btn btn-primary" type="submit" value="Cadastrar"/></abbr>
      <abbr title="Cancelar"><input class="btn btn-danger" type="button" value="Cancelar" onclick="javascript: location.href='index.php';" /></abbr>
    </form>
  </div>
<?php
include("inc/footer.php");
?>

