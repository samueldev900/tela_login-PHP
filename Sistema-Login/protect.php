<?php
   
    if(!isset($_SESSION)){
        session_start();
    }

    session_destroy();
    if(!isset($_SESSION['user'])){
        die("Você não pode acessar essa página porque não está logado.<p><a href=\"./index.php\">Entrar</a></p>");

    }

?>