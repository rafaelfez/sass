<?php

//funçoes da aplicação

function mesErro($texto){
    echo '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$texto.'</div>';
}

function mesSucesso($texto){
  echo '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$texto.'</div>';
}

function mesAlerta($texto){
  echo '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$texto.'</div>';
}

function mesFalha($texto){
  echo '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$texto.'</div>';
}

function add_fil($matricula, $nome, $telefone, $nascimento, $rg, $cpf, $celular,
  $sexo, $email, $taxa_rcs, $pis, $carteiratrab, $eleitor, $banco, $agencia, $conta, $digito, $civil, $escolaridade,
  $cnhnum, $cnhtipo, $cnhvalidade, $endcep, $endrua, $endnum, $endbairro, $endcidade, $enduf){

  include 'conexao.php';

  $sql = "INSERT INTO filiado(matricula,nome,telefone,nascimento,rg,cpf,celular,sexo,email,taxa_rcs,"
  ."pis, carteiratrab, eleitor, banco, agencia, conta, digito, civil, escolaridade,"
  ."cnhnum, cnhtipo, cnhvalidade, endcep, endrua, endnum, endbairro, endcidade, enduf)"
  ." VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

  try {
    $resultado = $db->prepare($sql);
    $resultado->bindValue(1, $matricula, PDO::PARAM_INT);
    $resultado->bindValue(2, $nome, PDO::PARAM_STR);
    $resultado->bindValue(3, $telefone, PDO::PARAM_INT);
    $resultado->bindValue(4, $nascimento, PDO::PARAM_STR);
    $resultado->bindValue(5, $rg, PDO::PARAM_INT);
    $resultado->bindValue(6, $cpf, PDO::PARAM_INT);
    $resultado->bindValue(7, $celular, PDO::PARAM_INT);
    $resultado->bindValue(8, $sexo, PDO::PARAM_STR);
    $resultado->bindValue(9, $email, PDO::PARAM_INT);
    $resultado->bindValue(10, $taxa_rcs, PDO::PARAM_INT);
    $resultado->bindValue(11, $pis, PDO::PARAM_INT);
    $resultado->bindValue(12, $carteiratrab, PDO::PARAM_INT);
    $resultado->bindValue(13, $eleitor, PDO::PARAM_INT);
    $resultado->bindValue(14, $banco, PDO::PARAM_STR);
    $resultado->bindValue(15, $agencia, PDO::PARAM_INT);
    $resultado->bindValue(16, $conta, PDO::PARAM_INT);
    $resultado->bindValue(17, $digito, PDO::PARAM_INT);
    $resultado->bindValue(18, $civil, PDO::PARAM_STR);
    $resultado->bindValue(19, $escolaridade, PDO::PARAM_STR);
    $resultado->bindValue(20, $cnhnum, PDO::PARAM_INT);
    $resultado->bindValue(21, $cnhtipo, PDO::PARAM_STR);
    $resultado->bindValue(22, $cnhvalidade, PDO::PARAM_STR);
    $resultado->bindValue(23, $endcep, PDO::PARAM_INT);
    $resultado->bindValue(24, $endrua, PDO::PARAM_STR);
    $resultado->bindValue(25, $endnum, PDO::PARAM_INT);
    $resultado->bindValue(26, $endbairro, PDO::PARAM_STR);
    $resultado->bindValue(27, $endcidade, PDO::PARAM_STR);
    $resultado->bindValue(28, $enduf, PDO::PARAM_STR);
    $resultado->execute();

  } catch (Exception $e) {

    //echo $e->getCode();

    echo "Error!: " . $e->getMessage(). "<br />";

      mesErro('Matrícula já cadastrada. Por favor, verifique o número e tente novamente.');

    return false;
  }
  return true;
}

function add_dep($afiliado_matricula, $nome, $telefone, $nascimento, $rg, $cpf, $celular, $sexo, $email,
  $eleitor, $civil, $parentesco, $principal, $endcep, $endrua, $endnum, $endbairro, $endcidade, $enduf){

  include 'conexao.php';

  $sql = "INSERT INTO dependente(Afiliado_matricula, nome, telefone, nascimento, rg, cpf, celular, sexo, email,"
    ."eleitor, civil, parentesco, principal, endcep, endrua, endnum, endbairro, endcidade, enduf)"
    ." VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

  try{
    if(get_filiado($afiliado_matricula)==true){
      $resultado = $db->prepare($sql);
      $resultado->bindValue(1, $afiliado_matricula, PDO::PARAM_INT);
      $resultado->bindValue(2, $nome, PDO::PARAM_STR);
      $resultado->bindValue(3, $telefone, PDO::PARAM_INT);
      $resultado->bindValue(4, $nascimento, PDO::PARAM_STR);
      $resultado->bindValue(5, $rg, PDO::PARAM_INT);
      $resultado->bindValue(6, $cpf, PDO::PARAM_INT);
      $resultado->bindValue(7, $celular, PDO::PARAM_INT);
      $resultado->bindValue(8, $sexo, PDO::PARAM_STR);
      $resultado->bindValue(9, $email, PDO::PARAM_STR);
      $resultado->bindValue(10, $eleitor, PDO::PARAM_INT);
      $resultado->bindValue(11, $civil, PDO::PARAM_STR);
      $resultado->bindValue(12, $parentesco, PDO::PARAM_STR);
      $resultado->bindValue(13, $principal, PDO::PARAM_INT);
      $resultado->bindValue(14, $endcep, PDO::PARAM_INT);
      $resultado->bindValue(15, $endrua, PDO::PARAM_STR);
      $resultado->bindValue(16, $endnum, PDO::PARAM_INT);
      $resultado->bindValue(17, $endbairro, PDO::PARAM_STR);
      $resultado->bindValue(18, $endcidade, PDO::PARAM_STR);
      $resultado->bindValue(19, $enduf, PDO::PARAM_STR);
      $resultado->execute();
    }else{
      mesErro('Matrícula não cadastrada. Por favor, verifique o número e tente novamente.');
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

function alterarFiliado($matricula, $nome, $telefone, $nascimento, $rg, $cpf, $celular,
  $sexo, $email, $taxa_rcs, $pis, $carteiratrab, $eleitor, $banco, $agencia, $conta, $digito, $civil, $escolaridade,
  $cnhnum, $cnhtipo, $cnhvalidade, $endcep, $endrua, $endnum, $endbairro, $endcidade, $enduf){

  include 'conexao.php';

  $sql = "UPDATE filiado SET nome = ?, telefone = ?, nascimento = ?, rg = ?, cpf = ?, celular = ?, sexo = ?, email = ?, taxa_rcs = ?, pis = ?, carteiratrab = ?, eleitor = ?, banco = ?, agencia = ?, conta = ?, digito = ?, civil = ?, escolaridade = ?, cnhnum = ?, cnhtipo = ?, cnhvalidade = ?, endcep = ?, endrua = ?, endnum = ?, endbairro = ?, endcidade = ?, enduf = ? WHERE matricula = ?";

  try {
    $resultado = $db->prepare($sql);
    $resultado->bindValue(1, $nome, PDO::PARAM_STR);
    $resultado->bindValue(2, $telefone, PDO::PARAM_INT);
    $resultado->bindValue(3, $nascimento, PDO::PARAM_STR);
    $resultado->bindValue(4, $rg, PDO::PARAM_INT);
    $resultado->bindValue(5, $cpf, PDO::PARAM_INT);
    $resultado->bindValue(6, $celular, PDO::PARAM_INT);
    $resultado->bindValue(7, $sexo, PDO::PARAM_STR);
    $resultado->bindValue(8, $email, PDO::PARAM_INT);
    $resultado->bindValue(9, $taxa_rcs, PDO::PARAM_INT);
    $resultado->bindValue(10, $pis, PDO::PARAM_INT);
    $resultado->bindValue(11, $carteiratrab, PDO::PARAM_INT);
    $resultado->bindValue(12, $eleitor, PDO::PARAM_INT);
    $resultado->bindValue(13, $banco, PDO::PARAM_STR);
    $resultado->bindValue(14, $agencia, PDO::PARAM_INT);
    $resultado->bindValue(15, $conta, PDO::PARAM_INT);
    $resultado->bindValue(16, $digito, PDO::PARAM_INT);
    $resultado->bindValue(17, $civil, PDO::PARAM_STR);
    $resultado->bindValue(18, $escolaridade, PDO::PARAM_STR);
    $resultado->bindValue(19, $cnhnum, PDO::PARAM_INT);
    $resultado->bindValue(20, $cnhtipo, PDO::PARAM_STR);
    $resultado->bindValue(21, $cnhvalidade, PDO::PARAM_STR);
    $resultado->bindValue(22, $endcep, PDO::PARAM_INT);
    $resultado->bindValue(23, $endrua, PDO::PARAM_STR);
    $resultado->bindValue(24, $endnum, PDO::PARAM_INT);
    $resultado->bindValue(25, $endbairro, PDO::PARAM_STR);
    $resultado->bindValue(26, $endcidade, PDO::PARAM_STR);
    $resultado->bindValue(27, $enduf, PDO::PARAM_STR);
    $resultado->bindValue(28, $matricula, PDO::PARAM_INT);
    $resultado->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
}

function alterarDependente($id, $afiliado_matricula, $nome, $telefone, $nascimento, $rg, $cpf, $celular, $sexo, $email,
  $eleitor, $civil, $parentesco, $principal, $endcep, $endrua, $endnum, $endbairro, $endcidade, $enduf){
  include 'conexao.php';

  $sql = "UPDATE dependente SET Afiliado_matricula = ?, nome = ?, telefone = ?, nascimento = ?, rg = ?, cpf = ?, celular = ?, sexo = ?, email = ?, eleitor = ?, civil = ?, parentesco = ?, principal = ?, endcep = ?, endrua = ?, endnum = ?, endbairro = ?, endcidade = ?, enduf = ? WHERE idDependente = ?";

  try{
  	$resultado = $db->prepare($sql);
    $resultado->bindValue(1, $afiliado_matricula, PDO::PARAM_INT);
    $resultado->bindValue(2, $nome, PDO::PARAM_STR);
    $resultado->bindValue(3, $telefone, PDO::PARAM_INT);
    $resultado->bindValue(4, $nascimento, PDO::PARAM_STR);
    $resultado->bindValue(5, $rg, PDO::PARAM_INT);
	$resultado->bindValue(6, $cpf, PDO::PARAM_INT);
    $resultado->bindValue(7, $celular, PDO::PARAM_INT);
    $resultado->bindValue(8, $sexo, PDO::PARAM_STR);
    $resultado->bindValue(9, $email, PDO::PARAM_STR);
    $resultado->bindValue(10, $eleitor, PDO::PARAM_INT);
    $resultado->bindValue(11, $civil, PDO::PARAM_STR);
    $resultado->bindValue(12, $parentesco, PDO::PARAM_STR);
    $resultado->bindValue(13, $principal, PDO::PARAM_INT);
    $resultado->bindValue(14, $endcep, PDO::PARAM_INT);
    $resultado->bindValue(15, $endrua, PDO::PARAM_STR);
    $resultado->bindValue(16, $endnum, PDO::PARAM_INT);
    $resultado->bindValue(17, $endbairro, PDO::PARAM_STR);
    $resultado->bindValue(18, $endcidade, PDO::PARAM_STR);
    $resultado->bindValue(19, $enduf, PDO::PARAM_STR);
    $resultado->bindValue(20, $id, PDO::PARAM_INT);
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

function pagamentoFiliado($afiliado_matricula, $ano, $mes, $das, $rcs, $unimed, $uniodonto){

  include 'conexao.php';

  $das = $das - $unimed -$uniodonto;

  if(get_filiado($afiliado_matricula)==true){
      if(unico($afiliado_matricula, $mes, $ano)==false){
        try {

            $query = "INSERT INTO pagamentofil(Afiliado_matricula, ano, mes, das, rcs, unimed, uniodonto) VALUES(?,?,?,?,?,?,?)";

            $resultado = $db->prepare($query);
            $resultado->bindValue(1, $afiliado_matricula, PDO::PARAM_INT);
            $resultado->bindValue(2, $ano, PDO::PARAM_INT);
            $resultado->bindValue(3, $mes, PDO::PARAM_STR);
            $resultado->bindValue(4, $das, PDO::PARAM_STR);
            $resultado->bindValue(5, $rcs, PDO::PARAM_STR);
            $resultado->bindValue(6, $unimed, PDO::PARAM_STR);
            $resultado->bindValue(7, $uniodonto, PDO::PARAM_STR);
            $resultado->execute();

            return true;

        } catch (Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br />";
            return false;
        }
    }else{
      mesErro('Já existe um pagamento para este Filiado neste período.');
      return false;
    }
  }else{
    mesErro('Matrícula não cadastrada. Por favor, verifique o número e tente novamente.');
    return false;
  }

}

function unico($matricula, $mes, $ano){
  //função para não haver dois ou mais pagamentos no mesmo periodo da mesma pessoa

    include 'conexao.php';

    $sql = "SELECT * FROM pagamentofil WHERE Afiliado_matricula = $matricula AND mes='$mes' AND ano='$ano'";

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

function pagamentoDependente($matricula, $id, $nome, $ano, $mes, $unimed, $uniodonto){

  include 'conexao.php';

  try {
    $statement = $db->query("SELECT idDependente FROM dependente WHERE nome = '$nome'");
    $result = $statement->fetch();
    $id = $result[0];
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return array();
  }

    if(get_dependente($id)){
      if(unico($matricula, $mes, $ano)){
        if(unicoDep($id, $mes, $ano)==false){
          try {
              try {

                if(principal($id)){
                  $query = "UPDATE pagamentofil SET das = das-$unimed-$uniodonto WHERE Afiliado_matricula=$matricula AND mes='$mes' AND ano=$ano";

                  $resultado = $db->prepare($query);
                  $resultado->bindValue(1, $unimed, PDO::PARAM_STR);
                  $resultado->bindValue(2, $uniodonto, PDO::PARAM_STR);
                  $resultado->bindValue(3, $matricula, PDO::PARAM_INT);
                  $resultado->bindValue(4, $mes, PDO::PARAM_STR);
                  $resultado->bindValue(5, $ano, PDO::PARAM_INT);
                  $resultado->execute();

                }else{
                  $query = "UPDATE pagamentofil SET rcs = rcs-$unimed-$uniodonto WHERE Afiliado_matricula=$matricula AND mes='$mes' AND ano=$ano";

                  $resultado = $db->prepare($query);
                  $resultado->bindValue(1, $unimed, PDO::PARAM_STR);
                  $resultado->bindValue(2, $uniodonto, PDO::PARAM_STR);
                  $resultado->bindValue(3, $matricula, PDO::PARAM_INT);
                  $resultado->bindValue(4, $mes, PDO::PARAM_STR);
                  $resultado->bindValue(5, $ano, PDO::PARAM_INT);
                  $resultado->execute();

                }
              } catch (Exception $e) {
                echo "Error!: " . $e->getMessage() . "<br />";
                return false;
              }

              $query = "INSERT INTO pagamentodep(Afiliado_matricula, idDependente, nome, mes, ano, unimed, uniodonto) VALUES(?,?,?,?,?,?,?)";

              $resultado = $db->prepare($query);
              $resultado->bindValue(1, $matricula, PDO::PARAM_INT);
              $resultado->bindValue(2, $id, PDO::PARAM_INT);
              $resultado->bindValue(3, $nome, PDO::PARAM_STR);
              $resultado->bindValue(4, $mes, PDO::PARAM_STR);
              $resultado->bindValue(5, $ano, PDO::PARAM_INT);
              $resultado->bindValue(6, $unimed, PDO::PARAM_STR);
              $resultado->bindValue(7, $uniodonto, PDO::PARAM_STR);
              $resultado->execute();

              return true;

          } catch (Exception $e) {
              echo "Error!: " . $e->getMessage() . "<br />";
              return false;
          }
      }else{
        mesErro('Já existe um pagamento para este Dependente neste período.');
        return false;
      }
      }else{
        mesErro('Não há pagamento cadastrado do Filiado neste período.');
        return false;
      }
    }else{
      mesErro('Dependente não encontrado');
    }

}

function unicoDep($id, $mes, $ano){
  //função para não haver dois ou mais pagamentos no mesmo periodo da mesma pessoa

    include 'conexao.php';

    $sql = "SELECT * FROM pagamentodep WHERE idDependente = '$id' AND mes='$mes' AND ano='$ano'";

    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $id, PDO::PARAM_INT);
        $results->bindValue(2, $mes, PDO::PARAM_STR);
        $results->bindValue(3, $ano, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return $results->fetchAll(PDO::FETCH_ASSOC);
}

function principal($id){

  include 'conexao.php';

  try {
    $statement = $db->query("SELECT principal FROM dependente WHERE idDependente = $id");
    $result = $statement->fetch();
    $principal = $result[0];

    if($principal==1){
      return true;
    }
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }

}

function adicional($id, $das, $rcs, $adicional, $desconto){

  include 'conexao.php';

  if($das<0 && $rcs>0){
    $divida = $das;
    if($desconto=="DINHEIRO"){
      if($divida==($adicional*(-1))){
        $query = "UPDATE pagamentofil SET das=0, desconto=?, adicional=? WHERE idPagamento=?";
        try{
          $resultado = $db->prepare($query);
          $resultado->bindValue(1, $desconto, PDO::PARAM_STR);
          $resultado->bindValue(2, $adicional, PDO::PARAM_STR);
          $resultado->bindValue(3, $id, PDO::PARAM_INT);
          $resultado->execute();

          return true;
        } catch (Exception $e) {
          echo "Error!: " . $e->getMessage() . "<br />";
          return false;
        }
      }else{
        mesErro('A dívida nao é igual ao adicional');
        return false;
      }
    }elseif($desconto=="RCS"){
      if($divida==($adicional*(-1))){
        $query = "UPDATE pagamentofil SET das=0, desconto=?, adicional=?, rcs=? WHERE idPagamento=?";
        try{
          $resultado = $db->prepare($query);
          $resultado->bindValue(1, $desconto, PDO::PARAM_STR);
          $resultado->bindValue(2, $adicional, PDO::PARAM_STR);
          $resultado->bindValue(3, $rcs+$divida, PDO::PARAM_STR);
          $resultado->bindValue(4, $id, PDO::PARAM_INT);
          $resultado->execute();
          return true;
        } catch (Exception $e) {
          echo "Error!: " . $e->getMessage() . "<br />";
          return false;
        }
      }else{
        mesErro('A dívida nao é igual ao adicional');
        return false;
      }
    }elseif($desconto=="DAS"){
      mesErro('O DAS já está negativo');
      return false;
    }
  }

  if($das>0 && $rcs<0){
    $divida = $rcs;
    if($desconto=="DINHEIRO"){
      if($divida==($adicional*(-1))){
        $query = "UPDATE pagamentofil SET rcs=0, desconto=?, adicional=? WHERE idPagamento=?";
        try{
          $resultado = $db->prepare($query);
          $resultado->bindValue(1, $desconto, PDO::PARAM_STR);
          $resultado->bindValue(2, $adicional, PDO::PARAM_STR);
          $resultado->bindValue(3, $id, PDO::PARAM_INT);
          $resultado->execute();

          return true;
        } catch (Exception $e) {
          echo "Error!: " . $e->getMessage() . "<br />";
          return false;
        }
      }else{
        mesErro('A dívida nao é igual ao adicional');
        return false;
      }
    }elseif($desconto=="DAS"){
      if($divida==($adicional*(-1))){
        $query = "UPDATE pagamentofil SET rcs=0, desconto=?, adicional=?, das=? WHERE idPagamento=?";
        try{
          $resultado = $db->prepare($query);
          $resultado->bindValue(1, $desconto, PDO::PARAM_STR);
          $resultado->bindValue(2, $adicional, PDO::PARAM_STR);
          $resultado->bindValue(3, $das+$divida, PDO::PARAM_STR);
          $resultado->bindValue(4, $id, PDO::PARAM_INT);
          $resultado->execute();
          return true;
        } catch (Exception $e) {
          echo "Error!: " . $e->getMessage() . "<br />";
          return false;
        }
      }else{
        mesErro('A dívida nao é igual ao adicional');
        return false;
      }
    }elseif($desconto=="RCS"){
      mesErro('O RCS já está negativo');
      return false;
    }
  }

  if($das<0 && $rcs<0){
    $divida = $das + $rcs;
    if($desconto=="DINHEIRO"){
      if($divida==($adicional*(-1))){
        $query = "UPDATE pagamentofil SET das=0, rcs=0, desconto=?, adicional=? WHERE idPagamento=?";
        try{
          $resultado = $db->prepare($query);
          $resultado->bindValue(1, $desconto, PDO::PARAM_STR);
          $resultado->bindValue(2, $adicional, PDO::PARAM_STR);
          $resultado->bindValue(3, $id, PDO::PARAM_INT);
          $resultado->execute();

          return true;
        } catch (Exception $e) {
          echo "Error!: " . $e->getMessage() . "<br />";
          return false;
        }
      }else{
        mesErro('A dívida nao é igual ao adicional');
        return false;
      }
    }elseif($desconto=="DAS"){
      mesErro('O DAS já está negativo');
      return false;
    }elseif($desconto=="RCS"){
      mesErro('O RCS já está negativo');
      return false;
    }
  }

  if($das>=0 && $rcs>=0){
    mesErro('DAS e RCS estão positivos, não há o que adicionar.');
    return false;
  }

}

function get_das(){
  include 'conexao.php';

  try {
    $statement = $db->query("SELECT SUM(das) from pagamentofil");
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
    return $db->query("SELECT idPagamento, Afiliado_matricula, mes, ano, das FROM pagamentofil");
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
}

function get_filiado($matricula){
    include 'conexao.php';

    $sql = 'SELECT matricula,nome,telefone,nascimento,rg,cpf,celular,sexo,email,taxa_rcs, pis, carteiratrab, eleitor, banco, agencia, conta, digito, civil, escolaridade, cnhnum, cnhtipo, cnhvalidade, endcep, endrua, endnum, endbairro, endcidade, enduf FROM filiado WHERE matricula = ?';

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
    $sql = 'SELECT nome, matricula, celular, taxa_rcs FROM filiado';
  }else{
    $sql = 'SELECT nome, matricula, nascimento, sexo, telefone, celular, email, rg, cpf, endereco, taxa_rcs FROM filiado WHERE matricula = ?';
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

function get_dependente($id) {
  include 'conexao.php';

  $sql = 'SELECT idDependente, Afiliado_matricula, nome, telefone, nascimento, rg, cpf, celular, sexo, email, eleitor, civil, parentesco, principal, endcep, endrua, endnum, endbairro, endcidade, enduf FROM dependente WHERE idDependente = ?';

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

function lista_dependente($matricula){
  include 'conexao.php';

    if($matricula==''){
      $sql = 'SELECT idDependente, cpf, Afiliado_matricula, nome, parentesco FROM dependente';
    }else{
      $sql = 'SELECT nome, nascimento, sexo, telefone, celular, email, rg, cpf, parentesco, Afiliado_matricula FROM dependente WHERE Afiliado_matricula = ?';
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

  $sql = 'SELECT Afiliado_matricula, ano, mes, unimed, uniodonto, das, rcs, idPagamento FROM pagamentofil WHERE idPagamento = ?';

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

function get_pagamentos_dep($id){
  include 'conexao.php';

  $sql = 'SELECT Afiliado_matricula, ano, mes, unimed, uniodonto, idPagamento FROM pagamentodep WHERE idPagamento = ?';

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
    $sql = 'SELECT Afiliado_matricula, ano, mes, unimed, uniodonto, adicional, das, rcs, idPagamento FROM pagamentofil';
  }else{
    $sql = 'SELECT Afiliado_matricula, ano, mes, unimed, uniodonto, adicional, das, rcs, idPagamento FROM pagamentofil WHERE Afiliado_matricula = ?';
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

function alterarPagamentoFil($afiliado_matricula, $ano, $mes, $unimed, $uniodonto, $das, $rcs, $id) {
  include 'conexao.php';


  $sql = "UPDATE pagamentofil SET Afiliado_matricula = ?, ano = ?, mes = ?, unimed = ?, uniodonto = ?, das = ?, rcs = ? WHERE idPagamento = ?";

  try {
    $resultado = $db->prepare($sql);
    $resultado->bindValue(1, $afiliado_matricula, PDO::PARAM_INT);
    $resultado->bindValue(2, $ano, PDO::PARAM_INT);
    $resultado->bindValue(3, $mes, PDO::PARAM_STR);
    $resultado->bindValue(4, $unimed, PDO::PARAM_INT);
    $resultado->bindValue(5, $uniodonto, PDO::PARAM_INT);
    $resultado->bindValue(6, $das, PDO::PARAM_STR);
    $resultado->bindValue(7, $rcs, PDO::PARAM_STR);
    $resultado->bindValue(8, $id, PDO::PARAM_INT);
    $resultado->execute();

    return true;
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
}

function alterarPagamentoDep($afiliado_matricula, $ano, $mes, $unimed, $uniodonto, $id) {
  include 'conexao.php';


  $sql = "UPDATE pagamentodep SET Afiliado_matricula = ?, ano = ?, mes = ?, unimed = ?, uniodonto = ? WHERE idPagamento = ?";

  try {

    try {

      if(principal($id)){
        $query = "UPDATE pagamentofil SET das = das-$unimed-$uniodonto WHERE Afiliado_matricula=$matricula AND mes='$mes' AND ano=$ano";

        $resultado = $db->prepare($query);
        $resultado->bindValue(1, $unimed, PDO::PARAM_STR);
        $resultado->bindValue(2, $uniodonto, PDO::PARAM_STR);
        $resultado->bindValue(3, $afiliado_matricula, PDO::PARAM_INT);
        $resultado->bindValue(4, $mes, PDO::PARAM_STR);
        $resultado->bindValue(5, $ano, PDO::PARAM_INT);
        $resultado->execute();

      }else{
        $query = "UPDATE pagamentofil SET rcs = rcs-$unimed-$uniodonto WHERE Afiliado_matricula=$afiliado_matricula AND mes='$mes' AND ano=$ano";

        $resultado = $db->prepare($query);
        $resultado->bindValue(1, $unimed, PDO::PARAM_STR);
        $resultado->bindValue(2, $uniodonto, PDO::PARAM_STR);
        $resultado->bindValue(3, $afiliado_matricula, PDO::PARAM_INT);
        $resultado->bindValue(4, $mes, PDO::PARAM_STR);
        $resultado->bindValue(5, $ano, PDO::PARAM_INT);
        $resultado->execute();

      }
    } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
    }

    $resultado = $db->prepare($sql);
    $resultado->bindValue(1, $afiliado_matricula, PDO::PARAM_INT);
    $resultado->bindValue(2, $ano, PDO::PARAM_INT);
    $resultado->bindValue(3, $mes, PDO::PARAM_STR);
    $resultado->bindValue(4, $unimed, PDO::PARAM_INT);
    $resultado->bindValue(5, $uniodonto, PDO::PARAM_INT);
    $resultado->bindValue(6, $id, PDO::PARAM_INT);
    $resultado->execute();

    return true;
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }

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
        mesErro('Já existe encargos para esse Filiado neste período.');
        return false;
      }
      }else{
      mesErro('Matrícula não cadastrada.');
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
      mesErro('Matrícula não cadastrada. Por favor, verifique o número e tente novamente.');
      return false;
    }
  return true;
}

function get_pag($matricula, $ano, $mes){

  include 'conexao.php';

  try {
    $statement = $db->query("SELECT idPagamento FROM pagamentofil WHERE Afiliado_matricula=$matricula and ano=$ano and mes='$mes'");
    $result = $statement->fetch();
    $id = $result[0];

    return $id;

  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }

}

function get_das_total($de,$ate){
  include 'conexao.php';

  $sql = "SELECT das, Afiliado_matricula, ano, mes, unimed, uniodonto, data FROM pagamentofil WHERE data BETWEEN '$de%' AND '$ate%'";

  try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $de, PDO::PARAM_STR);
      $results->bindValue(2, $ate, PDO::PARAM_STR);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetchAll();
}
