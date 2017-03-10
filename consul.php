<?php
require("inc/funcoes.php");

$tituloPagina = "Consulta";

$matricula = $_GET['matricula'];

include("inc/header.php");
?>

<h2>Filiado - Matricula: <?php echo $matricula ?></h2>
<ul>
  <?php
    foreach(lista_filiado($matricula) as $item){
      echo "<li><a href='alt_fil.php?matricula=" .$item['matricula'] . "'>". "Nome: " . $item['nome'] . "  -  Celular: " . $item['celular'] . " - Taxa de RCS: " . $item['taxa_rcs'] . "%</a>";
      echo "</li>";
    }
  ?>
</ul>

<h2>Dependentes</h2>
<ul>
  <?php
    foreach(lista_dependente($matricula) as $item){
      echo "<li><a href='alt_dep.php?cpf=" .$item['cpf'] . "'>". "Nome: " . $item['nome'] . "  -  Parentesco: " . $item['parentesco'] . "</a>";
      echo "</li>";
    }
  ?>
</ul>

<h2>Pagamentos</h2>
<ul>
  <?php
    foreach(listaPagamentos($matricula) as $item){
      echo "<li><a href='alt_pag.php?id=" .$item['idPagamento'] . "'>"."Salário: " . $item['salario'] . "  -  Mês: " .$item['mes'] . "  -  Ano: " .$item['ano'] . "</a>";
      echo "</li>";
    }
  ?>
</ul>

<h2>Encargos</h2>
<ul>
  <?php
    foreach(listaEncargos($matricula) as $item){
      echo "<li><a href='alt_enc.php?id=" .$item['idEncargo'] . "'>". "Mês: " .$item['mes'] . "  -  Ano: " .$item['ano'] . "  -  13º: " .$item['decimoterceiro'] . "  -  Refeição: " .$item['refeicao'] .  "  -  Férias: " .$item['ferias'] . "</a>";
      echo "</li>";
    }
  ?>
</ul>

<a href="impress.php?matricula=<?php echo $matricula ?>">Via do cliente</a>
