<?php

$hostname = "localhost";
$bancodedados = "login";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if($mysqli->error){
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}
