<?php
require("inc/funcoes.php");

$tituloPagina = "Impressão";

$matricula = $_GET['matricula'];

include("inc/header.php");
?>

<h2>Filiado - Matricula: <?php echo $matricula ?></h2>
<ul>
  <?php
    foreach(lista_filiado($matricula) as $item){
      echo "<li>" . "Nome: " . $item['nome'] . "  -  Celular: " . $item['celular'] . " - Taxa de RCS: " . $item['taxa_rcs'] . "%" . "</li>";
    }
  ?>
</ul>

<h2>Dependentes</h2>
<ul>
  <?php
    foreach(lista_dependente($matricula) as $item){
      echo "<li>" ."Nome: " . $item['nome'] . "  -  Parentesco: " . $item['parentesco'] . "</a>";
      echo "</li>";
    }
  ?>
</ul>

<h2>Pagamentos</h2>
<ul>
  <?php
    foreach(listaPagamentos($matricula) as $item){
      echo "<table border=1 width=300 height=200>"
      ."<tr>"
      ."<td colspan='2' align=center><b>Período</b></td>"
      ."<tr><td align=center>Mês: ".$item['mes']."</td><td align=center>Ano: ".$item['ano']."</td></tr>"
      ."<td colspan='2' align=center><b>Convênios</b></td>"
      ."<tr><td align=center>Unimed: ".$item['unimed']."</td><td align=center>Uniodonto: ".$item['uniodonto']."</td></tr>"
      ."<td colspan='2' align=center><b>Taxas</b></td>"
      ."<tr><td align=center>RCS: ".$item['rcs']."</td><td align=center>DAS: ".$item['das']."</td></tr>"
      ."<tr><td align=center>Devendo: ".$item['devendo']."</td><td align=center>Adicional: ".$item['adicional']."</td></tr>"
      ."<td colspan='2' align=center><b>Salário</b></td>"
      ."<tr><td align=center>Bruto: ".$item['bruto']."</td><td align=center>Líquido: ".$item['salario']."</td></tr>"
      ."</tr>"
      ."</table>"
      ."<br />";
    }
  ?>
</ul>
<h2>Encargos</h2>
<ul>
  <?php
    foreach(listaEncargos($matricula) as $item){
      echo "<table border=1 width=300 height=200>"
      ."<tr>"
      ."<td colspan='2' align=center><b>Período</b></td>"
      ."<tr><td align=center>Mês: ".$item['mes']."</td><td align=center>Ano: ".$item['ano']."</td></tr>"
      ."<td colspan='2' align=center><b>Encargos</b></td>"
      ."<tr><td align=center colspan='2'>13º Salário: ".$item['decimoterceiro']."</td></tr>"
      ."<tr><td align=center colspan='2'>Vale Refeição:: ".$item['refeicao']."</td></tr>"
      ."<tr><td align=center colspan='2'>Férias: ".$item['ferias']."</td>"
      ."</tr>"
      ."</table>"
      ."<br />";
    }
  ?>
</ul>

<input type="button" name="imprimir" value="Imprimir" onclick="window.print();">
