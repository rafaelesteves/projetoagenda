<?php

// CONFIGURAÇÃO DE CREDENCIAIS

$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'agend_estetica'; // base de dados


// conexão com o banco de dados

 $conn = new mysqli('localhost','root','','agend_estetica');

 // VERIFICAR CONEXÃO
;

 if($conn->connect_error){
  die("falha ao se comunicar com o banco de dados: " .$conn->connect_error );
 }

 ?>