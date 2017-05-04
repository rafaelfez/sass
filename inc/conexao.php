<?php

try{
  $db = new PDO("mysql:host=localhost;dbname=sindicato;port=3306","root","234");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e){
  echo "Unable to connect";
  echo $e->getMessage();
  exit;
}

?>
