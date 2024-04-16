
<?php


session_start();
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']); // Limpa a mensagem da sessão para não exibi-la novamente na próxima vez que a página for carregada
}


include_once("conexao.php");

$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

$result_agendamento ="DELETE FROM agendamento WHERE id = '$id'";
$resultado_agendamento = mysqli_query($conn, $result_agendamento );

if (mysqli_affected_rows($conn)) {
    echo $_SESSION['msg'] = "<h3 style='color: green;'>Agendamento apagado com sucesso &#128516</h3>";
    
} else {
    $_SESSION['msg'] = "<h3 style='color: red;'>Erro o agendamento não foi apagado &#128531 </h3>";
}

header("Location:agendamentos.php");


