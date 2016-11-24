<?php

$tituloPagina = "Login SASS";

session_start();
$message = "";

try{
  $db = new PDO("mysql:host=localhost;dbname=sindicato;port=3306","root","345");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST["login"])){
    if(empty($_POST["username"]) || empty($_POST["password"])){
      $message = '<label>All fields are required</label>';
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
        $message = '<label>Wrong Data</label>';
      }
    }
  }
} catch(Exception $message){
  echo "Unable to connect";
  echo $message->getMessage();
  exit;
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $tituloPagina; ?></title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
  </head>

  <body>

    <div class="header">
      <div class="wrapper">
        <nav id="menu">
        <ul>
          <li><a href="sobre.php">Sobre</a></li>
        </ul>
    </div>

  <div class="login">
    <img src="img/saas-logo.png" style="width:600px; height:300px;">
    <form class="form-login" method="post" action="login.php">
      <?php
        if(isset($message)){
          echo '<label class="text-danger">'.$message.'</label>';
        }
      ?>
      <table>
        <tr>
          <th><label for="login">Login<span class="required"></span></label></th>
          <td><input type="text" name="username" class="form-control" /></td>
        </tr>
        <tr>
          <th><label for="senha">Senha<span class="required"></span></label></th>
          <td><input type="password" name="password" class="form-control" /></td>
        </tr>
      </table>
      <input  type="submit" name="login" class="btn btn-info" value="Login" />
      <input class="button button--primary button--topic-php" type="submit" value="Cancelar" />
    </form>
  </div>

<?php include("inc/footer.php"); ?>
