<?php
require("inc/funcoes.php");

$tituloPagina = "Consulta";

$matricula = '';

include("inc/header.php");
?>

<h2>Histórico de Filiados</h2>
  <ul>
    <?php
      foreach(lista_filiado($matricula) as $item){
        echo "<li><a href='alt_fil.php?matricula=" .$item['matricula'] . "'>". "Matricula: " . $item['matricula'] . "  -  Nome: " . $item['nome'] . "  -  Celular: " . $item['celular'] . " - Taxa de RCS: " . $item['taxa_rcs'] . "%</a>";
        echo "</li>";
      }
    ?>
  </ul>


<h2>Histórico de Dependentes</h2>
  <ul>
    <?php
      foreach(lista_dependente($matricula) as $item){
        echo "<li><a href='alt_dep.php?cpf=" .$item['cpf'] . "'>". "Matricula: " . $item['Afiliado_matricula'] . "  -  Nome: " . $item['nome'] . "  -  Parentesco: " . $item['parentesco'] . "</a>";
        echo "</li>";
      }
    ?>
  </ul>

<h2>Histórico de Pagamentos</h2>
  <ul>
    <?php
      foreach(listaPagamentos($matricula) as $item){    
        echo "<li><a href='alt_pag.php?id=" .$item['idPagamento'] . "'>". "Matricula: " . $item['Afiliado_matricula'] . "  -  Salário: " . $item['salario'] . "  -  Mês: " .$item['mes'] . "  -  Ano: " .$item['ano'] . "</a>";
        echo "</li>";
      }
    ?>
  </ul>
