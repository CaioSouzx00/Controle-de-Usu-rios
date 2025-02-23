<?php
$host = "localhost";
$user = "root";
$password = "";
$bdd = "usuarios";
$conexao=mysqli_connect($host, $user, $password, $bdd);
    mysqli_select_db($conexao, $bdd);
?>
