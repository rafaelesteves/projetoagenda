<?php

require_once 'conexao.php';

 // pegando dados do agendamento

 $nome = $_POST["nome"];
 $email = $_POST["email"];
 $telefone = $_POST["telefone"];
 $genero = $_POST["genero"];
 $datanas = $_POST["datanas"]; 
 $cidade = $_POST["cidade"];
 $estado = $_POST["estado"];
 $endereco = $_POST["endereco"];
 $servico = $_POST["service"];
 $data = $_POST["data"];

 
 



 // PREPARAR COMANDO PARA TABELA
 $smtp = $conn->prepare("INSERT INTO agendamento(nome,email,telefone,sexo,data_nasc,cidade,estado,endereco,servico,data_agen)VALUES(?,?,?,?,?,?,?,?,?,?)") ; // esta linha tem que estar relacionada com a coluna do banco de dados. (?) para dar um pouco de segurança
 $smtp-> bind_param ("ssssssssss",$nome,$email,$telefone,$genero,$datanas,$cidade,$estado,$endereco,$servico,$data,); // esta linha deve estar semelhante as variaveis que está em (name) a quantidade de da letra s no inicio é formato de strings para cada valor

 //SE EXECUTAR CORRETAMENTE

 
 if($smtp->execute()){
  echo"<h2 style='color: green;'>Agendamento enviado com sucesso! &#128516</h2>";

 }else{
  echo "<h2 style='color: red;'>Erro no envio do agendamento &#128531 </h2>" .$smtp->error;
 }

 $smtp->close(); // FECHAMENTOS
 $conn->close();

 ?>

