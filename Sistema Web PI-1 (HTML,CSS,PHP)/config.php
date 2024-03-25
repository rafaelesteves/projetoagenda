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
 $time = $_POST["time"];
 $data = $_POST["data"];
 //$hora_atual = date('H:i:s'); não tem necessidade eu acho (Opcional)



 // PREPARAR COMANDO PARA TABELA
 $smtp = $conn->prepare("INSERT INTO agendamento(nome,email,telefone,sexo,data_nasc,cidade,estado,endereco,servico,horas,data_agen)VALUES(?,?,?,?,?,?,?,?,?,?,?)") ; // esta linha tem que estar relacionada com a coluna do banco de dados. (?) para dar um pouco de segurança
 $smtp-> bind_param ("sssssssssss",$nome,$email,$telefone,$genero,$datanas,$cidade,$estado,$endereco,$servico,$time,$data); // esta linha deve estar semelhante as variaveis que está em (name) a quantidade de da letra s no inicio é formato de strings para cada valor

 //SE EXECUTAR CORRETAMENTE
 
 if($smtp->execute()){
  echo"Mensagem enviada com sucesso!";

 }else{
  echo" Erro no envio da mensagem: " .$smtp->error;
 }

 $smtp->close(); // FECHAMENTOS
 $conn->close();

 ?>

