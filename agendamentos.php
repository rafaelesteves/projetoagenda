<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');



use LDAP\Result;
require_once 'conexao.php';

$senhaSecreta = "cleide"; // ESTA PARTE SÓ É VISÍVEL PARA O ADM

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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ver agendamentos</title>
    <link rel="stylesheet" href="estilo.css" class="float-right">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


    <style> 
        body{
            background: linear-gradient(to top,#dc9def 100%, #b541ef); /* cor de fundo*/ 
          
           
            
  
    
         
           

        }
        .box{
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            flex-wrap: wrap;
            column-gap: 1em;
            row-gap: 1em;
            order: 1;
        

            

        
        
           
  
           
            
         
           
          
            
          
           
    
            

   
            
        
            
           
           
}
.caixa {

  
    padding: 10px;
    margin: 20px;
    text-align: left; /* Alinha o texto à esquerda */
    max-width: 100%; /* Define uma largura máxima para os itens */
    font-family: Arial, Helvetica, sans-serif;
    border-radius: 10px;
  background-color: whitesmoke;
    position: relative;
    display: grid;
  

   
    
    
    
  
    
    

    
  
    
  
}

.agendamentos{ 
     color: black;
    text-transform: uppercase;
    text-align: grid;
    flex-wrap: wrap;
     display: flex;
     order: 1;
     font-size: medium;
     font-family:Arial, Helvetica, sans-serif;
     border-radius: 10px;
     display: flex;
     font: bold;
     
     


   
    

     
    
    
   
    
  


}
.agend{
    width: 2%;
    margin-top: -1%;
    
    
    
}



   
 



 @media screen  and (max-width:758){
  .box{background-color: pur;
    top:30%;
            left: 50%;
            transform: translate(-50%,-20%);
            width: 50%; 
            margin-top: 50%;
   
  }
  .agendamentos{ 
    text-transform: uppercase;
    text-align: left;
  margin-top: 20%;


  }


  
 }



    
.submit{
  
}





    </style>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  


<body>
<?php 

    session_start();
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']); // Limpa a mensagem da sessão para não exibi-la novamente na próxima vez que a página for carregada
    }
    ?>
     
                      <script src="script.js"></script>


    <div class ="box">
        <form  method="POST">
    <label for ="senha"> Senha:</label>
    <input type = "password" name = "senha" placeholder="Digite sua senha" required>
     <button  type="submit"> Enviar</button>         <img src="ca.png"  class= "ca" alt="cleidealves_estetica " width="150px"   >

        </form>
 
        
        <div class='agendamentos' >
        <?php if(isset($result) && $result->num_rows > 0) : ?> 
        <h2 class="agend">Agendamentos</h2> 
       
        <table class=""> 
            <?php while($row = $result->fetch_assoc()) :?>
                  <thead class="coluna" >
                   <div class="caixa" > <br><strong>Nome: </strong> <?php echo $row["nome"]; ?> <br> <br>
                    <strong>Email: </strong> <?php echo $row["email"]; ?> <br><br>
                    <strong>Telefone: </strong> <?php echo $row["telefone"]; ?> <br><br>
                    <strong>Sexo: </strong> <?php echo $row["Sexo"]; ?> <br><br>
                    <strong>Nascimento: </strong> <?php echo date("d/m/Y", strtotime($row["data_nasc"])); ?> <br><br>
                    <strong>Cidade: </strong> <?php echo $row["cidade"]; ?> <br><br>
                    <strong>Estado: </strong> <?php echo $row["estado"]; ?> <br><br>
                    <strong>Endereço: </strong> <?php echo $row["endereco"]; ?> <br><br>
                    <strong>Serviço: </strong> <?php echo $row["servico"]; ?> <br><br>
                    <strong>Data e Horas: </strong> <?php echo strftime("%A, %d de %B de %Y - %H:%M:%S", strtotime($row["data_agen"])); ?> <br>
                    <?php echo "<a href='apagar_agendamento.php?id=".$row['id']."'>Apagar</a> ";?>
                </div>
                    
                        
            </thead>           

            </table>
            </section>
            
            
              <?php endwhile; ?> 
            
            
                    
                    
            </ul> 
            </div>
        <?php else :?>
                <p> <h3> <h3>  </p> 
                <?php endif; ?>
                </div>
</body>

</html>
 

    