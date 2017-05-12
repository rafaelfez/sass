<?php

$tituloPagina = "Login SASS";

session_start();
$message = "";

try{
  $db = new PDO("mysql:host=localhost;dbname=sindicato;port=3306","root","");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST["login"])){
    if(empty($_POST["username"]) || empty($_POST["password"])){
      $message = '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>O prenchimento de todos os campos são obrigatórios.</div>';
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
        $message = '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Login ou senha inválidos.</div>';
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
<title><?php echo $tituloPagina; ?>
</title>
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
<script src="bootstrap/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
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
<body>
<div class="login">
  <abbr title="Sindicato dos Arrumadores de São Sebastião"><img src="img/sasslogo.png" align="center" style="width:600px; height:250px;"></abbr>
  <br>
  <br>
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h2 class="panel-title"><big>Login</big></h2>
    </div>
    <div class="panel-body">

      <form class="form-login form-horizontal" method="post" action="login.php">

        <?php
        if(isset($message)){
          echo $message;
        }
      ?>

        <div class="form-group">
          <label for="login" class="col-sm-2 control-label">Usuário:<span class="required"></span></label>
          <div class="col-sm-10">
            <abbr title="Insira seu login de usuário"><input type="text" name="username" class="form-control" required/></abbr>
          </div>
        </div>

        <div class="form-group">
          <label for="senha" class="col-sm-2 control-label">Senha:<span class="required"></span></label>
          <div class="col-sm-10">
            <abbr title="Insira sua senha"><input type="password" name="password" class="form-control" required/></abbr>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <abbr title="Entrar no Sistema"><input type="submit" name="login" class="btn btn-info" value="Entrar"/>
            </abbr>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
</div>

<?php include("inc/footer.php"); ?>
