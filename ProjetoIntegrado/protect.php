<?php 

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION["id"])) {
    die("Você não está conectado. <p><a href=\"login.php\">Faça login</a></p>");
}

?>