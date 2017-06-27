<?php require 'inc/funcoes.php'; 
$tituloPagina="Alertas" ; 
include("inc/header.php"); ?>

   <div class="panel-group">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="panel-title">
            <big>
            SMS para Filiados </big>
            </h2>
        </div>
        <div class="panel-body">

            <form class="form-horizontal" id="sms-geral" data-toggle="validator" role="form" method="post" action="send.php">

                <div class="form-group has-feedback">
                    <label for="mensagem" class="col-sm-2 control-label">
                        Mensagem: <span class="required">
                    * </span>
                    </label>
                    <div class="col-sm-3">
                        <textarea required name="mensagem" class="form-control" rows="5" cols="40" maxlength="100" data-error="Por favor, digite uma mensagem."></textarea>
                        <div class="help-block with-errors">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <abrr title="Enviar mensagem SMS">
                            <input class="btn btn-primary" type="submit" value="Enviar" />
                        </abrr>
                        <abbr title="Cancelar">
                        <input class="btn btn-danger" type="button" value="Cancelar" onclick="javascript: location.href='index.php';"/>
                        </abbr>
                    </div>
                </div>
            </form>
            <!--<abrr title="Enviar alerta para todos Filiados"><input class="btn btn-primary" type="submit" value="Enviar" /></abrr>
    <abrr title="Cancelar alerta"><input class="btn btn-danger" type="button" value="Cancelar"  onclick="javascript: location.href='index.php';" /></abrr>
  </form>
-->
        </div>
    </div>
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="panel-title">
            <big>
            Devedores </big>
            </h2>
        </div>
        <div class="panel-body">
            <table style="width:675px;" class="table table-bordered table-hover table-condensed table-striped">
                <thead>
                    <tr>
                        <th style="width:400px;">
                            Nome
                        </th>
                        <th style="width:150px;">
                            Mês
                        </th>
                        <th style="width:150px;">
                            DAS
                        </th>
                        <th style="width:150px;">
                            RCS
                        </th>
                        <th style="width:150px;">
                            Celular
                        </th>
                        <th style="width:75px;">
                            SMS
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach(get_devedores() as $devedor){ /*echo '<li>
            '. $devedor[ 'nome'] . " " .$devedor[ 'celular'] . " " .$devedor[ 'situacao'] . '</li>
            ';*/ echo "
            <form id='devedores' class='form-group' method='post' action='send_one.php'>
                "; echo "
                <tr>
                    <td>
                        " . $devedor['nome'] . "
                    </td>
                    " . "
                    <td>
                        " . $devedor['mes'] . "
                    </td>
                    " . "
                    <td>
                        " . $devedor['das'] . "
                    </td>
                    " . "
                    <td>
                        " . $devedor['rcs'] . "
                    </td>
                    " . "
                    <td>
                        " . $devedor['celular'] . "
                    </td>
                    " . " 
                    <td>
                        " . "<input class='btn btn-primary' type='submit' value='Enviar'/>" . "
                    </td>
                </tr>
                "; echo "
            </form>
            "; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("inc/footer.php"); ?>