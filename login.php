<?php

$tituloPagina = "Login SASS";

session_start();
$message = "";

try{
  $db = new PDO("mysql:host=localhost;dbname=sindicato;port=3306","root","");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST["login"])){
    if(empty($_POST["username"]) || empty($_POST["password"])){
      $message = '<label class="bg-warning" ><img src="img/alerta.png">O prenchimento de todos os campos são obrigatórios.</label>';
    }else{
      $query = "SELECT * FROM usuario WHERE login = :username AND senha = :password";
      $statement = $db->prepare($query);
      $statement->execute(
        array(
          'username' => $_POST["username"],
          'password' => $_POST["password"]
        )
      );
      $count = $statement->rowCount();
      if($count > 0){
        $_SESSION["username"] = $_POST["username"];
        header("location:index.php");
      }else{
        $message = '<label class="bg-warning"><img src="img/alerta.png">Login ou senha estão incorretos.</label>';
      }
    }
  }
} catch(Exception $message){
  echo "Erro em conectar ao sistema";
  echo $message->getMessage();
  exit;
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $tituloPagina; ?></title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script src="bootstrap/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body class>

    <nav class="navbar navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <abbr title="Home"><a class="navbar-brand" href="index.php">SASS</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="sobre.php"><span></span>Sobre</a></li>
    </ul>
  </div>
</nav>

  <div class="container">
  
    <abbr title="Sindicato dos Arrumadores de São Sebastião"><img src="img/saas-logo.png" style="width:600px; height:300px;"></abbr>
    <form class="form-login" method="post" action="login.php">
      <?php
        if(isset($message)){
          echo '<label class="text-danger">'.$message.'</label>';
        }
      ?>
      <table>
        <tr>
          <th><label for="login">Login:<span class="required"></span></label></th>
          <td><abbr title="Insira seu login de usuário"><input type="text" name="username" class="form-control" /></abbr></td>
        </tr>
        <tr>
          <th><label for="senha">Senha:<span class="required"></span></label></th>
          <td><abbr title="Insira sua senha"><input type="password" name="password" class="form-control"/></abbr></td>
        </tr>
      </table>
      <abbr title="Entrar no sistema"><input type="submit" name="login" class="btn btn-info" value="Entrar" />
    </form>
  </div>

<?php include("inc/footer.php"); ?>
