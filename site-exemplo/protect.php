<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['id'])){
    die("Você não pode aceesar essa página, pois não está logado! <p><a href=\"home.php\">Entrar</a></p>");
}