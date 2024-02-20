<pre>
    <?php
    
    include('protect.php');
    include('connect.php');
    
    ?>
</pre>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Document</title>
</head>
<style>
    table{

        border-collapse: collapse;
    }
    td{
        padding: 10px;
    }
</style>
<body>

 
    <h1>Bem-vindo <?php echo $_SESSION['name']; ?></h1>

    <p>
        <a href="./logout.php">Sair</a>
    </p>    


<?php
    include('protect.php');
    include('connect.php');

    $sql = "SELECT * FROM sistemalogin";
    $sql_query = $conn->query($sql) or die("falha na conexão");

    // Imprime o início da tabela
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Usuário</th>
                <th>Email</th>
                <th>Senha</th>
            </tr>";

    // Use um loop para percorrer todas as linhas do resultado
    while ($lista = $sql_query->fetch_assoc()) {
        // Imprime cada linha como uma nova linha da tabela
        echo "<tr>
                <td>" . $lista['id'] . "</td>
                <td>" . $lista['nome'] . "</td>
                <td>" . $lista['usuario'] . "</td>
                <td>" . $lista['email'] . "</td>
                <td>" . $lista['senha'] . "</td>
            </tr>";
    }

    // Imprime o final da tabela
    echo "</table>";

    // Lembre-se de fechar a conexão quando não precisar mais dela
    $conn->close();
?>

     




</body>
</html>