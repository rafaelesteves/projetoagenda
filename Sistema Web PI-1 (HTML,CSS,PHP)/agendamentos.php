<?php
use LDAP\Result;
require_once 'conexao.php';

$senhaSecreta = "123"; // ESTA PARTE SÓ É VISÍVEL PARA O ADM

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $senhadigitada = $_POST['senha'];

    //DIGITOU A SENHA CERTO
    if($senhadigitada === $senhaSecreta){ // comparação de senha com IF 
        $sql = "SELECT * FROM agendamento"; // o from é da tabela do banco de dados
       $result = $conn->query($sql);
    }else{
        echo "<h1>Senha Incorreta!</h1>";
    }

} 

?>


<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ver agendamentos</title>
    <link rel="stylesheet" href="style.css" class="float-right">


    <style> 
        body{
            font-family: Arial, Helvetica, sans-serif; 
            background-image: linear-gradient(to right, rgb(142, 25, 225), rgb(199, 92, 228));
           

        }
        .box{
            color: white;
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 20px;
            width: 23%; 
            font-family: Arial, Helvetica, sans-serif;
           
}
.submit{
  
}





    </style>
</head>
<body>
    <div class ="box">
        <form  method="POST">
    <label for ="senha"> Senha:</label>
    <input type = "password" name = "senha" placeholder="Digite sua senha" required>
     <button  type="submit"> Enviar</button>
        </form>
        
        <div class='agendamentos'>
        <?php if(isset($result) && $result->num_rows > 0) : ?> 
        <h2 style="text-align:center">Agendamentos</h2>
        <ul>
            <?php while($row = $result->fetch_assoc()) :?>
                <li>
                    <strong>Nome: </strong> <?php echo $row["nome"]; ?> <br><br>
                    <strong>Email: </strong> <?php echo $row["email"]; ?> <br>
                    <strong>Telefone: </strong> <?php echo $row["telefone"]; ?> <br>
                    <strong>Sexo: </strong> <?php echo $row["Sexo"]; ?> <br>
                    <strong>Nascimento: </strong> <?php echo $row["data_nasc"]; ?> <br>
                    <strong>Cidade: </strong> <?php echo $row["cidade"]; ?> <br>
                    <strong>Estado: </strong> <?php echo $row["estado"]; ?> <br>
                    <strong>Endereço: </strong> <?php echo $row["endereco"]; ?> <br>
                    <strong>Serviço: </strong> <?php echo $row["servico"]; ?> <br>
                    <strong>Data e Hora: </strong> <?php echo $row["data_agen"]." às ".$row["horas"]; ?> <br><br>
              </li>
              <?php endwhile; ?> 
            
            
                    
                    
            </ul> 

        <?php else :?>
                <p> Nenhuma mensagem : </p>
                <?php endif; ?>
                </div>
</body>

</html>
 

    
