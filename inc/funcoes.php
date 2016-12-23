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
