<?php

//funçoes da aplicação

function mesErro($texto){
  echo '<!DOCTYPE html>';
  echo '<html xmlns="http://www.w3.org/1999/xhtml">';
  echo '<head>';
  echo '</head>';
  echo '<body>';
  echo '</br>';
  echo '</br>';
  echo '<p>';
  echo $texto;
  echo '</p>';
  echo '</body>';
  echo '</html>';
}

function add_arr($matricula,$nome,$telefone,$nascimento,$endereco,$rg,$cpf,$celular,$sexo,$email,$situacao,$taxa_rcs){

  include 'conexao.php';

  $sql = "INSERT INTO afiliado(matricula,nome,telefone,nascimento,endereco,rg,cpf,celular,sexo,email,situacao,taxa_rcs) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";

  try {
    $resultado = $db->prepare($sql);
    $resultado->bindValue(1, $matricula, PDO::PARAM_INT);
    $resultado->bindValue(2, $nome, PDO::PARAM_STR);
    $resultado->bindValue(3, $telefone, PDO::PARAM_INT);
    $resultado->bindValue(4, $nascimento, PDO::PARAM_STR);
    $resultado->bindValue(5, $endereco, PDO::PARAM_STR);
    $resultado->bindValue(6, $rg, PDO::PARAM_INT);
    $resultado->bindValue(7, $cpf, PDO::PARAM_INT);
    $resultado->bindValue(8, $celular, PDO::PARAM_INT);
    $resultado->bindValue(9, $sexo, PDO::PARAM_STR);
    $resultado->bindValue(10, $email, PDO::PARAM_INT);
    $resultado->bindValue(11, $situacao, PDO::PARAM_INT);
    $resultado->bindValue(12, $taxa_rcs, PDO::PARAM_INT);
    $resultado->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
}

function add_dep($afiliado_matricula,$nome,$telefone,$nascimento,$endereco,$rg,$cpf,$celular,$email,$sexo,$parentesco){
  include 'conexao.php';

  $sql = "INSERT INTO dependente(cpf,nome,telefone,email,nascimento,endereco,rg,celular,sexo,Afiliado_matricula,parentesco) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
  try{
	$resultado = $db->prepare($sql);
	$resultado->bindValue(1, $cpf, PDO::PARAM_INT);
  $resultado->bindValue(2, $nome, PDO::PARAM_STR);
  $resultado->bindValue(3, $telefone, PDO::PARAM_INT);
  $resultado->bindValue(4, $email, PDO::PARAM_INT);
  $resultado->bindValue(5, $nascimento, PDO::PARAM_STR);
  $resultado->bindValue(6, $endereco, PDO::PARAM_STR);
  $resultado->bindValue(7, $rg, PDO::PARAM_INT);
  $resultado->bindValue(8, $celular, PDO::PARAM_INT);
  $resultado->bindValue(9, $sexo, PDO::PARAM_STR);
	$resultado->bindValue(10, $afiliado_matricula, PDO::PARAM_INT);
	$resultado->bindValue(11, $parentesco, PDO::PARAM_STR);
    $resultado->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
}

function add_con($cnpj,$nome,$categoria, $empresa, $mensalidade, $desconto, $DAS_Afiliado_Matricula, $RCS_Afiliado_Matricula){
  include 'conexao.php';

  $sql = "INSERT INTO convenio(cnpj,nome,categoria,empresa,mensalidade,desconto,DAS_Afiliado_Matricula,RCS_Afiliado_Matricula) VALUES(?,?,?,?,?,?,?,?)";
  try {
    $resultado = $db->prepare($sql);
  	$resultado->bindValue(1, $cnpj, PDO::PARAM_INT);
    $resultado->bindValue(2, $nome, PDO::PARAM_STR);
    $resultado->bindValue(3, $categoria, PDO::PARAM_STR);
    $resultado->bindValue(4, $empresa, PDO::PARAM_STR);
    $resultado->bindValue(5, $mensalidade, PDO::PARAM_INT);
    $resultado->bindValue(6, $desconto, PDO::PARAM_STR);
    $resultado->bindValue(7, $DAS_Afiliado_Matricula, PDO::PARAM_INT);
    $resultado->bindValue(8, $RCS_Afiliado_Matricula, PDO::PARAM_INT);
    $resultado->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
}

/*function buscaAlterar($matricula){
  include 'conexao.php';

  $sql = "SELECT * from afiliados where matricula = ?";

  try {
    $resultado=$db->prepare($sql);
    $resultado->bindValue(1, $matricula, PDO::PARAM_INT);
    $resultado->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return $resultado->fetch();
}
*/

function alterarFiliado($matricula,$nome,$telefone,$nascimento,$endereco,$rg,$cpf,$celular,$sexo,$email,$situacao,$taxa_rcs){
  include 'conexao.php';

  $sql = "UPDATE afiliado SET nome = ?, telefone = ?, nascimento = ?, endereco = ?, rg = ?, cpf = ?, celular = ?, sexo = ?, email = ?, situacao = ?, taxa_rcs = ? WHERE matricula = ?";

  try {
    $resultado = $db->prepare($sql);
    $resultado->bindValue(1, $nome, PDO::PARAM_STR);
    $resultado->bindValue(2, $telefone, PDO::PARAM_INT);
    $resultado->bindValue(3, $nascimento, PDO::PARAM_STR);
    $resultado->bindValue(4, $endereco, PDO::PARAM_STR);
    $resultado->bindValue(5, $rg, PDO::PARAM_INT);
    $resultado->bindValue(6, $cpf, PDO::PARAM_INT);
    $resultado->bindValue(7, $celular, PDO::PARAM_INT);
    $resultado->bindValue(8, $sexo, PDO::PARAM_STR);
    $resultado->bindValue(9, $email, PDO::PARAM_INT);
    $resultado->bindValue(10, $situacao, PDO::PARAM_INT);
    $resultado->bindValue(11, $taxa_rcs, PDO::PARAM_INT);
    $resultado->bindValue(12, $matricula, PDO::PARAM_INT);
    $resultado->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
}

function alterarDependente($afiliado_matricula,$nome,$telefone,$nascimento,$endereco,$rg,$cpf,$celular,$email,$sexo,$parentesco){
  include 'conexao.php';

  $sql = "UPDATE dependente SET nome = ?, telefone = ?, email = ?, nascimento = ?, endereco = ?, rg = ?, celular = ?, sexo = ?, Afiliado_matricula = ?, parentesco = ? WHERE cpf = ?";

  try{
  	$resultado = $db->prepare($sql);
    $resultado->bindValue(1, $nome, PDO::PARAM_STR);
    $resultado->bindValue(2, $telefone, PDO::PARAM_INT);
    $resultado->bindValue(3, $email, PDO::PARAM_INT);
    $resultado->bindValue(4, $nascimento, PDO::PARAM_STR);
    $resultado->bindValue(5, $endereco, PDO::PARAM_STR);
    $resultado->bindValue(6, $rg, PDO::PARAM_INT);
    $resultado->bindValue(7, $celular, PDO::PARAM_INT);
    $resultado->bindValue(8, $sexo, PDO::PARAM_STR);
  	$resultado->bindValue(9, $afiliado_matricula, PDO::PARAM_INT);
  	$resultado->bindValue(10, $parentesco, PDO::PARAM_STR);
    $resultado->bindValue(11, $cpf, PDO::PARAM_INT);
    $resultado->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
}

function alterarConvenio($cnpj,$nome,$categoria, $empresa, $mensalidade, $desconto){
  include 'conexao.php';

  $sql = "UPDATE convenio SET nome =  ?, categoria =  ?, empresa =  ?, mensalidade =  ?, desconto =  ? WHERE cnpj = ?";
  try {
    $resultado = $db->prepare($sql);
    $resultado->bindValue(1, $nome, PDO::PARAM_STR);
    $resultado->bindValue(2, $categoria, PDO::PARAM_STR);
    $resultado->bindValue(3, $empresa, PDO::PARAM_STR);
    $resultado->bindValue(4, $mensalidade, PDO::PARAM_INT);
    $resultado->bindValue(5, $desconto, PDO::PARAM_STR);
    $resultado->bindValue(6, $cnpj, PDO::PARAM_INT);
    $resultado->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
}
