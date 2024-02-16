<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registrar</title>
</head>
<body>
    <h1>Registrar</h1>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="get">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="iname" required>

        <label for="usu">Usuário:</label>
        <input type="text" name="usu" id="iusu" required>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="iemail" required>

        <label for="pass">Senha:</label>
        <input type="password" name="pass" id="pass" required>

        <input type="submit" value="Enviar" id="button">
    </form>

        <?php
            include("./connect.php");

            if (empty($_GET['name']) || empty($_GET['usu']) || empty($_GET['email']) || empty($_GET['pass'])) {
                echo "Preencha todos os campos.";
            }
            else{
                try {
                    // Executar a consulta USE
                    $sqlUse = "USE cadastro";
                    if ($conn->query($sqlUse) !== TRUE) {
                        throw new Exception("Error using database: " . $sqlUse . "<br>" . $conn->error);
                    }
        
                    // Executar a consulta INSERT
                    $sqlInsert = "INSERT INTO sistemalogin (nome, usuario, email, senha) VALUES
                    ('{$_GET['name']}', '{$_GET['usu']}', '{$_GET['email']}', '{$_GET['pass']}')";
        
                    if ($conn->query($sqlInsert) === TRUE) {
                        echo "VALORES ADICIONADOS<br>";
                    } else {
                        throw new Exception("Error inserting values: " . $sqlInsert . "<br>" . $conn->error);
                    }
        
                    // Fechar a conexão
                    $conn->close();
        
                } catch (Exception $e) {
                    die($e->getMessage());
                }

            }  
        ?>

</body>
</html>