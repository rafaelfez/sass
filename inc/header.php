<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $tituloPagina; ?></title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script src="bootstrap/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/validator.min.js" type="text/javascript"></script>

  </head>

  <body>
  <header>
  <nav class="navbar navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">SASS</a>
    </div>
    <ul class="nav navbar-nav">
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cadastro <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="cad_fil.php">Filiado</a></li>
          <li><a href="cad_dep.php">Dependente</a></li>
          <!--<li><a href="cad_con.php">Convênio</a></li>-->
        </ul>
        </li>
      <li><a href="alertas.php">Alertas</a></li>

      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Consulta <span class="caret"></span></a>
      <ul class="dropdown-menu">
          <li><a href="consulta.php">Filiado</a></li>
          <li><a href="das.php">DAS / Transações</a></li>
          <li><a href="historico.php">Históricos</a></li>
        </ul>
        </li>

      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Pagamento <span class="caret"></span></a>
      <ul class="dropdown-menu">
          <li><a href="pagamentofil.php">Filiado</a></li>
          <li><a href="pagamentodep.php">Dependente</a></li>
          <li><a href="adicional.php">Fluxo Adicional</a></li>
          <!--<li><a href="encargos.php">Encargos Sociais</a></li>-->
        </ul>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">

      <li><a href="logout.php"><abbr title="Sair do sistema"><span class="glyphicon glyphicon-log-out"></span></abbr> Sair</a></li>
    </ul>
  </div>
</nav>
</header>

    <div id="content">
      <?php //verificando se esta logado
      session_start();

      //Caso o usuário não esteja autenticado, limpa os dados e redireciona
      if ( !isset($_SESSION['username']) and !isset($_SESSION['password']) ) {
          //Destrói
          session_destroy();

          //Limpa
          unset ($_SESSION['username']);
          unset ($_SESSION['password']);

          //Redireciona para a página de autenticação
          header('location:login.php');
      }
      ?>

      <div class="container">
