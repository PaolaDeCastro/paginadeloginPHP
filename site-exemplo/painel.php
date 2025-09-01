<?php
include('protect.php');

// Se não tiver logado, volta pro login
if (!isset($_SESSION['id'])) {
    header("Location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao painel</h1>
        <p>Olá, <strong><?php echo $_SESSION['nome']; ?></strong>! Você está logado.</p>
        <p><a class="logout-btn" href="sair.php">Sair</a></p>
    </div>
</body>
</html>

