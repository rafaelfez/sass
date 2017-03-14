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
    if(get_filiado($afiliado_matricula)==true){
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
    }else{
      mesErro('Matricula do Filiado não existe');
      return false;
    }
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

function get_devedores() {
    include 'conexao.php';

      try {
          return $db->query('SELECT afiliado.nome, afiliado.celular, folhadepagamento.devendo, folhadepagamento.mes FROM afiliado
                              INNER JOIN folhadepagamento ON afiliado.matricula = folhadepagamento.Afiliado_matricula
                                WHERE folhadepagamento.devendo > 0 ORDER BY folhadepagamento.idPagamento DESC');
      } catch (Exception $e) {
          echo "Error!: " . $e->getMessage() . "<br />";
          return array();
      }
}



function get_convenio() {
  include 'conexao.php';

  try {
      return $db->query('SELECT nome, mensalidade, desconto FROM convenio');
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return array();
  }
}


function pagamento($afiliado_matricula,$taxa_rcs, $bruto, $unimed, $uniodonto, $rcs, $das, $mes, $ano, $descontounimed, $descontouniodonto){
  include 'conexao.php';

  if(get_filiado($afiliado_matricula)==true){
      if(unico($afiliado_matricula, $mes, $ano)==false){
        try {
          $statement = $db->query("SELECT taxa_rcs FROM afiliado WHERE matricula = $afiliado_matricula");
          $result = $statement->fetch();
          $taxa_rcs = $result[0];
        } catch (Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br />";
            return array();
        }
    }else{
      mesErro('Já existe um pagamento pra esse filiado neste período');
      return false;
    }
  }else{
    mesErro('Matricula não cadastrada');
    return false;
  }

  $rcs = ($bruto*$taxa_rcs)/100;
  $salario = $bruto - $rcs;
  $das = $salario * 0.1;
  $salario = $salario - $das;

  if($descontounimed == 'DAS'){
      $das = $das - $unimed;
  }elseif ($descontounimed == 'RCS') {
      $rcs = $rcs - $unimed;
  }

  if($descontouniodonto == 'DAS'){
      $das = $das - $uniodonto;
  }elseif ($descontouniodonto == 'RCS') {
      $rcs = $rcs - $uniodonto;
  }

  if($rcs>0){
    $salario = $salario+$rcs;
    $devendo = 0;
  }else{
    $devendo = abs($rcs);
    $rcs = 0;
  }

  if($das<0){
    $devendo = $devendo + abs($das);
    $das=0;
  }


  $query1 = "INSERT INTO folhadepagamento(bruto, salario, das, rcs, taxa_rcs, devendo, mes, ano, Afiliado_matricula, unimed, uniodonto) VALUES(?,?,?,?,?,?,?,?,?,?,?)";

  if($bruto>=0){
    try {
      $resultado = $db->prepare($query1);
      $resultado->bindValue(1, $bruto, PDO::PARAM_INT);
      $resultado->bindValue(2, $salario, PDO::PARAM_STR);
      $resultado->bindValue(3, $das, PDO::PARAM_STR);
      $resultado->bindValue(4, $rcs, PDO::PARAM_INT);
      $resultado->bindValue(5, $taxa_rcs, PDO::PARAM_INT);
      $resultado->bindValue(6, $devendo, PDO::PARAM_INT);
      $resultado->bindValue(7, $mes, PDO::PARAM_STR);
      $resultado->bindValue(8, $ano, PDO::PARAM_INT);
      $resultado->bindValue(9, $afiliado_matricula, PDO::PARAM_INT);
      $resultado->bindValue(10, $unimed, PDO::PARAM_INT);
      $resultado->bindValue(11, $uniodonto, PDO::PARAM_INT);
      $resultado->execute();
    } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
    }
  }
  return "Bruto:" . $bruto . " Salario:" .$salario. " RCS:" . $rcs . " DAS:" . $das . " Devendo:" . $devendo . " Desc Unimed:" . $descontounimed . " Desc Uniodonto:" . $descontouniodonto;
}

function unico($matricula, $mes, $ano){
  //função para não haver dois ou mais pagamentos no mesmo periodo da mesma pessoa

    include 'conexao.php';

    $sql = "SELECT * FROM folhadepagamento WHERE Afiliado_matricula = $matricula AND mes='$mes' AND ano='$ano'";

    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $matricula, PDO::PARAM_INT);
        $results->bindValue(2, $mes, PDO::PARAM_STR);
        $results->bindValue(3, $ano, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return $results->fetchAll(PDO::FETCH_ASSOC);
}

function adicional($afiliado_matricula, $mes, $ano, $adicional){

  include 'conexao.php';

  try {
    if(get_filiado($afiliado_matricula)==true){
      $statement = $db->query("SELECT devendo FROM folhadepagamento WHERE Afiliado_matricula = $afiliado_matricula AND ano= '$ano' AND mes='$mes'");
      $result = $statement->fetch();
      $devendo = $result[0];
    }else{
      mesErro('Matricula não cadastrada');
      return false;
    }
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return array();
  }

  if($adicional==$devendo){
    $query = "UPDATE folhadepagamento SET adicional=?, devendo=0 WHERE Afiliado_matricula=? AND ano=? AND mes=?";
    try {
        $resultado = $db->prepare($query);
        $resultado->bindValue(1, $adicional, PDO::PARAM_INT);
        $resultado->bindValue(2, $afiliado_matricula, PDO::PARAM_INT);
        $resultado->bindValue(3, $ano, PDO::PARAM_INT);
        $resultado->bindValue(4, $mes, PDO::PARAM_STR);;
        $resultado->execute();
      } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
      }
    }else{
      mesErro('Adicional diferente do valor Devendo');
      return false;
    }
    return true;
}


function get_das(){
  include 'conexao.php';

  try {
    $statement = $db->query("SELECT SUM(das) from folhadepagamento");
    $result = $statement->fetch();
    $das = $result[0];
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return $das;
}

function get_pagamentos_das(){
  include 'conexao.php';

  try {
    return $db->query("SELECT idPagamento, Afiliado_matricula, salario, mes, ano, das FROM folhadepagamento");
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
}

function get_filiado($matricula){
    include 'conexao.php';

    $sql = 'SELECT * FROM afiliado WHERE matricula = ?';

    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $matricula, PDO::PARAM_INT);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return $results->fetch();
}

function lista_filiado($matricula){
  include 'conexao.php';

  if($matricula==''){
    $sql = 'SELECT nome, matricula, celular, taxa_rcs FROM afiliado';
  }else{
    $sql = 'SELECT nome, matricula, celular, taxa_rcs FROM afiliado WHERE matricula = ?';
  }

  try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $matricula, PDO::PARAM_INT);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetchAll(PDO::FETCH_ASSOC);
}


function get_dependente($cpf) {
  include 'conexao.php';

  $sql = 'SELECT * FROM dependente WHERE cpf = ?';

  try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $cpf, PDO::PARAM_INT);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetch();
}

function lista_dependente($matricula){
  include 'conexao.php';

  if($matricula==''){
    $sql = 'SELECT cpf, Afiliado_matricula, nome, parentesco FROM dependente';
  }else{
    $sql = 'SELECT cpf, Afiliado_matricula, nome, parentesco FROM dependente WHERE Afiliado_matricula = ?';
  }

  try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $matricula, PDO::PARAM_INT);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetchAll(PDO::FETCH_ASSOC);

}

function get_pagamentos($id){
  include 'conexao.php';

  $sql = 'SELECT Afiliado_matricula, bruto, salario, mes, ano, unimed, uniodonto, adicional, das, rcs, idPagamento, devendo FROM folhadepagamento WHERE idPagamento = ?';

  try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $id, PDO::PARAM_INT);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetch();
}

function listaPagamentos($matricula){
  include 'conexao.php';

  if($matricula==''){
    $sql = 'SELECT Afiliado_matricula, bruto, salario, mes, ano, unimed, uniodonto, adicional, das, rcs, devendo, idPagamento FROM folhadepagamento';
  }else{
    $sql = 'SELECT Afiliado_matricula, bruto, salario, mes, ano, unimed, uniodonto, adicional, das, rcs, devendo, idPagamento FROM folhadepagamento WHERE Afiliado_matricula = ?';
  }

  try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $matricula, PDO::PARAM_INT);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetchAll(PDO::FETCH_ASSOC);
}


function alterarPagamento($bruto, $salario, $mes, $ano, $unimed, $uniodonto, $adicional, $das, $rcs, $id){
  include 'conexao.php';

  $sql = "UPDATE folhadepagamento SET bruto = ?, salario = ?, mes = ?, ano = ?, unimed = ?, uniodonto = ?, adicional = ?, das = ?, rcs = ? WHERE idPagamento = ?";

  try {
    $resultado = $db->prepare($sql);
    $resultado->bindValue(1, $bruto, PDO::PARAM_INT);
    $resultado->bindValue(2, $salario, PDO::PARAM_INT);
    $resultado->bindValue(3, $mes, PDO::PARAM_STR);
    $resultado->bindValue(4, $ano, PDO::PARAM_INT);
    $resultado->bindValue(5, $unimed, PDO::PARAM_INT);
    $resultado->bindValue(6, $uniodonto, PDO::PARAM_INT);
    $resultado->bindValue(7, $adicional, PDO::PARAM_INT);
    $resultado->bindValue(8, $das, PDO::PARAM_STR);
    $resultado->bindValue(9, $rcs, PDO::PARAM_INT);
    $resultado->bindValue(10, $id, PDO::PARAM_INT);
    $resultado->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;

}

function get_celular(){
  include 'conexao.php';

  $sql = "SELECT celular from afiliado";

  try {
      $results = $db->prepare($sql);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetchAll(PDO::FETCH_ASSOC);
}

function encargo($afiliado_matricula, $mes, $ano, $decimoterceiro, $refeicao, $ferias){

  include 'conexao.php';

  $query = "INSERT INTO encargo(Afiliado_matricula, mes, ano, decimoterceiro, refeicao, ferias) VALUES(?,?,?,?,?,?)";

  if(get_filiado($afiliado_matricula)==true){
    if(unico($afiliado_matricula, $mes, $ano)==false){
      try {
        $resultado = $db->prepare($query);
        $resultado->bindValue(1, $afiliado_matricula, PDO::PARAM_INT);
        $resultado->bindValue(2, $mes, PDO::PARAM_STR);
        $resultado->bindValue(3, $ano, PDO::PARAM_INT);
        $resultado->bindValue(4, $decimoterceiro, PDO::PARAM_INT);
        $resultado->bindValue(5, $refeicao, PDO::PARAM_INT);
        $resultado->bindValue(6, $ferias, PDO::PARAM_INT);
        $resultado->execute();
        } catch (Exception $e) {
          echo "Error!: " . $e->getMessage() . "<br />";
          return false;
        }
        }else{
        mesErro('Já existe encargos para esse filiado neste período');
        return false;
      }
      }else{
      mesErro('Matricula não cadastrada');
      return false;
    }
  return true;
}

function get_encargos($id){
  include 'conexao.php';

  $sql = 'SELECT Afiliado_matricula, mes, ano, decimoterceiro, refeicao, ferias, idEncargo FROM encargo WHERE idEncargo = ?';

  try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $id, PDO::PARAM_INT);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetch();
}

function listaEncargos($matricula){
  include 'conexao.php';

  if($matricula==''){
    $sql = 'SELECT Afiliado_matricula, mes, ano, decimoterceiro, refeicao, ferias, idEncargo FROM encargo';
  }else{
    $sql = 'SELECT Afiliado_matricula, mes, ano, decimoterceiro, refeicao, ferias, idEncargo FROM encargo WHERE Afiliado_matricula = ?';
  }

  try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $matricula, PDO::PARAM_INT);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetchAll(PDO::FETCH_ASSOC);
}

function alterarEncargo($afiliado_matricula, $mes, $ano, $decimoterceiro, $refeicao, $ferias, $id){
  include 'conexao.php';

  $sql = "UPDATE encargo SET Afiliado_matricula = ?, mes = ?, ano = ?, decimoterceiro = ?, refeicao = ?, ferias = ?  WHERE idEncargo = ?";

  if(get_filiado($afiliado_matricula)==true){
    try {
      $resultado = $db->prepare($sql);
      $resultado->bindValue(1, $afiliado_matricula, PDO::PARAM_INT);
      $resultado->bindValue(2, $mes, PDO::PARAM_STR);
      $resultado->bindValue(3, $ano, PDO::PARAM_INT);
      $resultado->bindValue(4, $decimoterceiro, PDO::PARAM_INT);
      $resultado->bindValue(5, $refeicao, PDO::PARAM_INT);
      $resultado->bindValue(6, $ferias, PDO::PARAM_INT);
      $resultado->bindValue(7, $id, PDO::PARAM_INT);
      $resultado->execute();
      } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
      }
      }else{
      mesErro('Matricula não cadastrada');
      return false;
    }
  return true;
}