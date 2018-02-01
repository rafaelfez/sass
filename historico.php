<?php require( "inc/funcoes.php");
$tituloPagina="Histórico";
$matricula='';
include( "inc/header.php"); ?>


    <div class="alert alert-info alert-dismissable shpw" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>
            <strong>
            Clique para exibir ou ocultar os históricos: </strong>
        </p>
    </div>

    <div class="panel-group">

    <div class="panel panel-primary">
        <div class="panel-heading hover-link" data-toggle="collapse" data-parent="false" data-target="#collapsePanel1">
            <h2 class="panel-title">
            <big>
            Cadastro de Filiados </big>
            </h2>
        </div>
        <div id="collapsePanel1" class="panel-collapse collapse out">
            <div class="panel-body">
                <ul>
                    <?php foreach(lista_filiado($matricula) as $item){ echo
                        "<li>
                    <a href='alt_fil.php?matricula=" .$item['matricula'] . "'>". "Matricula: " . $item['matricula'] . " - Nome: " . $item['nome'] . " - Celular: " . $item['celular'] . " - Taxa de RCS: " . $item['taxa_rcs'] . "%</a>"; echo "</li>
                     "; } ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading hover-link" data-toggle="collapse" data-parent="false" data-target="#collapsePanel2">
            <h2 class="panel-title">
            <big>
            Cadastro de Dependentes </big>
            </h2>
        </div>
        <div id="collapsePanel2" class="panel-collapse collapse out">
            <div class="panel-body">
                <ul>
                    <?php foreach(lista_dependente($matricula) as $item){ echo
                        "<li>
                    <a href='alt_dep.php?id=" .$item['idDependente'] . "'>". "Matricula: " . $item['Afiliado_matricula'] . " - Nome: " . $item['nome'] . " - Parentesco: " . $item['parentesco'] . "</a>"; echo "</li>
                     "; } ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading hover-link" data-toggle="collapse" data-parent="false" data-target="#collapsePanel3">
            <h2 class="panel-title">
            <big>
            Pagamentos de Filiados</big>
            </h2>
        </div>
        <div id="collapsePanel3" class="panel-collapse collapse out">
            <div class="panel-body">
                <ul>
                    <?php foreach(listaPagamentos($matricula) as $item){ echo
                        "<li>
                    <a href='alt_pag_fil.php?id=" .$item['idPagamento'] . "'>". "Matricula: " . $item['Afiliado_matricula'] . " - Mês: " .$item['mes'] . " - Ano: " .$item['ano'] . "</a>"; echo "</li>
                     "; } ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading hover-link" data-toggle="collapse" data-parent="false" data-target="#collapsePanel4">
            <h2 class="panel-title">
            <big>
            Pagamentos de Dependentes </big>
            </h2>
        </div>
        <div id="collapsePanel4" class="panel-collapse collapse out">
            <div class="panel-body">
                <ul>
                    <?php foreach(listaPagamentosDep($matricula) as $item){ echo
                        "<li>
                    <a href='alt_pag_dep.php?id=" .$item['idPagamento'] . "'>". "Nome: " . $item['nome'] . " - Mês: " .$item['mes'] . " - Ano: " .$item['ano'] . "</a>"; echo "</li>
                     "; } ?>
                </ul>
            </div>
        </div>
    </div>

</div>

<?php include( "inc/footer.php"); ?>
