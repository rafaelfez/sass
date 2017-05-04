<?php
require 'inc/funcoes.php';
// INICIO
function requisicaoApi($params, $endpoint){
    $url = "http://api.directcallsoft.com/{$endpoint}";
    $data = http_build_query($params);
    $ch =   curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $return = curl_exec($ch);
    curl_close($ch);
    // Converte os dados de JSON para ARRAY
    $dados = json_decode($return, true);
    return $dados;
}

// CLIENT_ID que é fornecido pela DirectCall (Seu e-mail)
$client_id = "rafafelipesilva@gmail.com";
// CLIENT_SECRET que é fornecido pela DirectCall (Código recebido por SMS)
$client_secret = "9002546";
// Faz a requisicao do access_token
$req = requisicaoApi(array('client_id'=>$client_id, 'client_secret'=>$client_secret), "request_token");
//Seta uma variavel com o access_token
$access_token = $req['access_token'];
// Enviadas via POST do nosso contato.html
$nome = "Sindicato dos Arrumadores";
$mensagem = $_POST['mensagem'];
// Monta a mensagem
$SMS = "{$nome} - {$mensagem}";

//pegar todos contatos
$get_celular = get_celular();
$cel = array();

array_walk_recursive($get_celular, function($item, $key){
  global $cel;
  if($key == 'celular') $cel[] = $item."";
});

$umalinha = implode(";", $cel);

// Array com os parametros para o envio
$data = array(
    'origem'=>"5511988656702", // Seu numero que Ã© origem
    'destino'=>$umalinha, // E o numero de destino
    'tipo'=>"texto",
    'access_token'=>$access_token,
    'texto'=>$SMS
);


// realiza o envio
$req_sms = requisicaoApi($data, "sms/send");
// FIM
?>

<?php

$tituloPagina = "SMS";

include("inc/header.php");

?>

<div class="home">
  <p>SMS Enviados!</p>
  <br/>
  <abbr title="Sindicato dos Arrumadores de São Sebastião"><img src="img/saas-logo.png"style="width:600px; height:300px;"/></abbr>
</div>

<?php include("inc/footer.php"); ?>
