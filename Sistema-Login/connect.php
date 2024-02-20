<?php

$severname = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro";


// Configurar relatório de erros antes da tentativa de conexão
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Tentar estabelecer a conexão
$conn = new mysqli($severname, $username, $password, $dbname);

if($conn->error){

    die("Falha ao conectar ao banco de dados: ". $conn->error);

}

?>