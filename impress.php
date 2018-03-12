<?php require( "inc/funcoes.php");
$tituloPagina="Impressão" ; 
$matricula=$_GET[ 'matricula']; 
include( "inc/header.php"); ?>

<div class="timbre">
    <div class="timbre-img">
        <img src="img/sasslogo.png" align="left" style="width:150px; height:150px;">
    </div>
    <div class="timbre-p">
        <p>Sindicato dos Trabalhadores Portuários Avulsos e com Vínculo Empregatício</p>
        <p>nos Serviços de Capatazia e Arrumadores nas Cidades de São Sebastião,</p>
        <p>Caraguatatuba, Ubatuba e Ilhabela</p>
        <p>Rua: Três Bandeirantes, 144 – Centro – São Sebastião/ SP CEP: 11608-587</p>
        <p>E-MAIL: sindiarrumadorss@uol.com.br / Telefax: (12) 3892.4319</p>
        <p>CNPJ: 50.324.854/ 0001- 00</p>
    </div>
</div>

  <div class="panel panel-primary">
    <div class="panel-heading">
        <h2 class="panel-title">
        <big>
        Relatório de Filiado - Matrícula: <?php echo $matricula ?>
        </big>
        </h2>
    </div>
    <div class="panel-body">

        <div class="panel-group">
        <div class="panel panel-info">
            <div class="panel-heading">
                <strong>
                Informações do Filiado </strong>
            </div>
            <div class="panel-body">
                
                    <?php foreach(lista_filiado($matricula) as $item){ 
                        echo " 
                        <div class='panel panel-default'>
                            <div class='panel-heading'>
                                <b>" . $item['nome'] . "</b>
                            </div>
                            <div class='panel-body'>
                    
                                 Data de Nascimento: <b>" . $item['nascimento'] . "</b></br>
                                
                                 Sexo: <b>" . $item['sexo'] . "</b></br>
                                
                                 Telefone: <b>" . $item['telefone'] . "</b></br>
                                
                                 Celular: <b>" . $item['celular'] . "</b></br>
                            
                                 Email: <b>" . $item['email'] . "</b></br>
                            
                                 Endereço: <b>" . $item['endrua'] . "</b></br>
                                
                                 RG: <b>" . $item['rg'] . "</b></br>
                                
                                 CPF: <b>" . $item['cpf'] . "</b></br>
                                
                                 Taxa de RCS: <b>" . $item['taxa_rcs'] . "%" . "</b>
                            </div>
                        </div>
                    "; } ?>
                
              
            </div>
        </div>
        


        
        <div class="panel panel-info">
            <div class="panel-heading">
                <strong>
                Informações de Dependentes </strong>
            </div>
            <div class="panel-body">

                <?php foreach(lista_dependente($matricula) as $item){ 
                    echo "<div class='panel panel-default'>
                            <div class='panel-heading'>
                                <b>" . $item['nome'] . "</b>
                            </div>
                            <div class='panel-body'>
                                Data de Nascimento: <b>" . $item['nascimento'] . "</b></br>
                                Sexo: <b>" . $item['sexo'] . "</b></br>
                                Telefone: <b>" . $item['telefone'] . "</b></br>
                                Celular: <b>" . $item['celular'] . "</b></br>
                                Email: <b>" . $item[ 'email'] . "</b></br>
                                Endereço: <b>" . $item['endrua'] . "</b></br>
                                RG: <b>" . $item['rg'] . "</b></br>
                                CPF: <b>" . $item['cpf'] . "</b></br>
                                Parentesco: <b>" . $item['parentesco'] . "</b></br>
                            </div>
                            </div>";} ?>
                
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">
                <strong>
                Pagamentos do Filiado</strong>
            </div>
            <div class="panel-body">

                    <table class="table table-bordered table-hover table-condensed table-striped" style="width:900px;">
            <thead>


            <tr>
                <th style="width:50px;">
                    Ano
                </th>
                <th style="width:100px;">
                    Mês
                </th>
                <th style="width:100px;">
                    Unimed
                </th>
                <th style="width:100px;">
                    Uniodonto
                </th>
                <th style="width:100px;">
                    RCS
                </th>
                <th style="width:100px;">
                    DAS
                </th>
                <th style="width:100px;">
                    Adicional
                </th>
                <th style="width:100px;">
                    Desconto
                </th>
                <th style="width:100px;">
                    DAS Retido
                </th>
            </tr>
            </thead>
            <tbody>
            <ul class="items">
                <?php foreach(listaPagamentos($matricula) as $item){ echo

                    "<tr>
                <td>
                    " . $item['ano'] . "
                </td>
    
                <td>
                    " . $item['mes'] . "
                </td>
                
                <td>
                   R$ " . $item['unimed'] . "
                </td>
                
                <td>
                   R$ " . $item['uniodonto'] . "
                </td>
                
                <td>
                   R$ " . $item['rcs'] . "
                </td>

                <td>
                   R$ " . $item['das'] . "
                </td>

                <td>
                   R$ "; 
                   
                   if($item['adicional']==''){
                       echo '0.00';
                   }else{
                       echo $item['adicional'];
                   }  echo "
                </td>
                
                <td>
                   " . $item['desconto'] . "
                </td>
                
                <td>
                   R$ " . $item['das']/2 . "
                </td>
            </tr>
            "; } ?>
            </ul>
            </tbody>
            </table> 
            </div>
        </div>
        
        <div class="panel panel-info">
            <div class="panel-heading">
                <strong>
                Gastos dos Dependentes</strong>
            </div>
            <div class="panel-body">

                    <table class="table table-bordered table-hover table-condensed table-striped" style="width:900px;">
            <thead>


            <tr>
                <th style="width:100px;">
                    Nome
                </th>
                <th style="width:50px;">
                    Ano
                </th>
                <th style="width:100px;">
                    Mês
                </th>
                <th style="width:100px;">
                    Unimed
                </th>
                <th style="width:100px;">
                    Uniodonto
                </th>
            </tr>
            </thead>
            <tbody>
            <ul class="items">
                <?php foreach(listaPagamentosDep($matricula) as $item){ echo

                    "<tr>
                <td>
                    " . $item['nome'] . "
                </td>

                <td>
                    " . $item['ano'] . "
                </td>
    
                <td>
                    " . $item['mes'] . "
                </td>
                
                <td>
                   R$ " . $item['unimed'] . "
                </td>
                
                <td>
                   R$ " . $item['uniodonto'] . "
                </td>
                
            </tr>
            "; } ?>
            </ul>
            </tbody>
            </table> 
            </div>
        </div>
        


<!--
        <div class="panel panel-info">
            <div class="panel-heading">
                <strong>
                Encargos </strong>
            </div>
            <div class="panel-body">


                    <table class="table table-bordered table-hover table-condensed table-striped" style="width:430px;">
            <thead>


            <tr>
                <th style="width:50px;">
                    Ano
                </th>
                <th style="width:50px;">
                    Mês
                </th>
                <th style="width:100px;">
                    13º Salário
                </th>
                <th style="width:130px;">
                    Vale Refeição
                </th>
                <th style="width:100px;">
                    Férias
                </th>
            </tr>
            </thead>
            <tbody>
            <ul class="items">
                <?php foreach(listaEncargos($matricula) as $item){ echo

                    "<tr>
                <td>
                    " . $item['ano'] . "
                </td>
    
                <td>
                    " . $item['mes'] . "
                </td>
                
                <td>
                   R$ " . $item['decimoterceiro'] . "
                </td>
                
                <td>
                   R$ " . $item['refeicao'] . "
                </td>
                
                <td>
                   R$ " . $item['ferias'] . "
                </td>

            </tr>
            "; } ?>
            </ul>
            </tbody>
            </table>                 
            </div>
        </div>
            
    </div>
-->
</div>
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
                <input type="button" name="imprimir" value="Imprimir" class="btn btn-success" onclick="window.print();">
             <abrr title="Cancelar">
                <input class="btn btn-danger" type="button" value="Cancelar" onclick="javascript: location.href='index.php';" />
            </abrr>
         </div>
    </div>

  </div>
</div>
  

<?php include( "inc/footer.php"); ?>