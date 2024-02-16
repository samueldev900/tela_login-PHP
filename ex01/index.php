<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <pre>
            <?php

                $servername = "127.0.0.1:3307";
                $username = "root";
                $password = "86375297";

                // Create connection
                $conn = mysqli_connect($servername, $username, $password);

                // Check connection
                if (!$conn) {
                die("Connection failed: <br> " . mysqli_connect_error());
                }
                echo "Connected successfully<br>";

                $sql = "USE cadastro";

                if($conn->query($sql) === TRUE) {
                    echo "BANCO DE DADOS SELECIONADO COM SUCESSO<br>";
                } else {
                    echo "ERRO AO SELECIONAR BANCO DE DADOS: " . $conn->error;
                };
                  
                $sql = "INSERT INTO if not exists cursos VALUES
                ('11','React','Curso de React, Front-end','70','15','2024')
                ";

                if ($conn->query($sql) === TRUE) {
                    echo "Dados adicionados com sucesso<br>";
                } else {
                    echo "ERRO AO INSERIR DADOS: " . $conn->error;
                };


            ?>
        </pre>
    </main>
</body>
</html>