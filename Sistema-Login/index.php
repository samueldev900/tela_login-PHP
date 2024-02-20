
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sistema de Login</title>
</head>
<body>
    
    <form action="" method="get">
    
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" value="<?php echo $_GET['login']?>">
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" value="<?php echo $_GET['login']?>">

        <input type="submit" value="Enviar">

        <p><a href="./register.php">Clique aqui para registrar</a></p>
        
    </form>

<?php
    include('connect.php');
    
    if(isset($_GET['login']) || $_GET['password']){

        if(strlen($_GET['login']) == 0){
            echo "preencha seu login";
        }
        else if(strlen($_GET['password']) == 0){
            echo "Preencha sua senha";
        } else{
            
            $login = $conn -> real_escape_string($_GET['login']);
            $senha = $conn -> real_escape_string($_GET['password']);

            $sql = "SELECT * FROM sistemalogin where usuario = '$login' and senha = '$senha'";
            $sql_query = $conn-> query($sql) or die("falha na conexão");
        
            $quantidade = $sql_query->num_rows;
        
            if($quantidade == 1){
        
                $usuario = $sql_query->fetch_assoc();
                
                if(!isset($_SESSION)){
                    session_start();
                }
         
                $_SESSION['user'] = $usuario['id'];
                $_SESSION['name'] = $usuario['nome'];
                print_r($_SESSION);
        
                header("Location: painel.php");
        
            }else{
                echo"Falha ao logar Email ou senha incorretos";
            }
        }
    }

?>
</body>
</html>