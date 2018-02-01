<?php
require("inc/funcoes.php");
$tituloPagina = "Consulta";
$matricula= $_GET['matricula'];
include("inc/header.php");
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h2 class="panel-title"><big>Filiado - Matrícula: <?php
            echo $matricula;
            ?>
        </big>
        </h2>
    </div>.
    <div class="panel-body">
        <div class="panel-group">

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Informações do Filiado</strong>
                </div>
                <div class="panel-body">
                    <ul>
                        <?php
                            foreach (lista_filiado($matricula) as $item) {
                            echo "<li>
                        <a href='alt_fil.php?matricula=" . $item['matricula'] . "'>" . "Nome: " . $item['nome'] . " - Celular: " . $item['celular'] . " - Taxa de RCS: " . $item['taxa_rcs'] . "%</a>"; echo "</li>
                         "; } ?>
                    </ul>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Informações de Dependentes</strong>
                </div>
                <div class="panel-body">
                    <ul>
                        <?php foreach(lista_dependente($matricula) as $item){ echo
                        "<li>
                    <a href='alt_dep.php?id=" .$item['idDependente'] . "'>". "Nome: " . $item['nome'] . " - Parentesco: " . $item['parentesco'] . "</a>"; echo "</li>
                     "; } ?>
                    </ul>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Pagamentos do Filiado</strong>
                </div>
                <div class="panel-body">
                    <ul>
                        <?php
                            foreach (listaPagamentos($matricula) as $item) {
                            echo "<li>
                        <a href='alt_pag_fil.php?id=" . $item['idPagamento'] . "'>" . "RCS: " . $item['rcs'] . " - DAS: " . $item['das'] .  " - Mês: " . $item['mes'] . " - Ano: " . $item['ano'] . "</a> "; echo " </li>
                         "; } ?>
                    </ul>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Gasto dos Dependentes</strong>
                </div>
                <div class="panel-body">
                    <ul>
                        <?php
                            foreach (listaPagamentosDep($matricula) as $item) {
                            echo "<li>
                        <a href='alt_pag_dep.php?id=" . $item['idPagamento'] . "'>" . "Nome: " . $item['nome'] . " - Mês: " . $item['mes'] . " - Ano: " . $item['ano'] . "</a> "; echo " </li>
                         "; } ?>
                    </ul>
                </div>
            </div>

            <!--<div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Encargos</strong>
                </div>
                <div class="panel-body">
                    <ul>
                        <?php
                            foreach (listaEncargos($matricula) as $item) {
                            echo "<li>
                        <a href='alt_enc.php?id=" . $item['idEncargo'] . "'>" . "Mês: " . $item['mes'] . " - Ano: " . $item['ano'] . " - 13º: " . $item['decimoterceiro'] . " - Refeição: " . $item['refeicao'] . " - Férias: " . $item['ferias'] . "</a>"; echo "</li>
                         "; } ?>
                    </ul>
                </div>
            </div>

        </div>

-->
</div>
        <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <abbr title="Imprimir Via do Cliente"><input type="button" class="btn btn-primary" value="Via do Cliente" onclick="javascript: location.href='impress.php?matricula=<?php echo $matricula?>';"/></abbr>
            <abbr title="Realizar Nova Busca"><input class="btn btn-secondary" onclick="javascript: location.href='consulta.php';" type="button" value="Nova Busca"></abbr>
        </div>
        </div>

    </div>
</div>

<?php
    include( "inc/footer.php");
 ?>
