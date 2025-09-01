<?php
include('conexao.php');

$mensagem = ""; // variável para armazenar alertas
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    $mensagem = "<div class='alert alert-success'>Você saiu com sucesso!</div>";
}


if (isset($_POST['email']) && isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0) {
        $mensagem = "<div class='alert alert-error'>Preencha o email</div>";
    } elseif (strlen($_POST['senha']) == 0) {
        $mensagem = "<div class='alert alert-error'>Preencha a senha</div>";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        if ($sql_query->num_rows == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");
            exit;
        } else {
            $mensagem = "<div class='alert alert-error'>Falha ao logar! E-mail ou senha incorretos!</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Acesse sua conta</h1>

        <!-- Exibe mensagem de erro, se houver -->
        <?php if (!empty($mensagem)) echo $mensagem; ?>

        <form action="" method="POST">
            <p>
                <label>Email</label>
                <input type="text" name="email">
            </p>    
            <p>
                <label>Senha</label>
                <input type="password" name="senha">
            </p>
            <p>
                <button type="submit">Entrar</button>
            </p>
        </form>
    </div>
</body>
</html>
