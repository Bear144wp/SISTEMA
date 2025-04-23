<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'mecanico') {
    header("Location: index.php");

    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel da Mecânica</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h1>
        <p>Você está logado como <strong>Mecânica</strong>.</p>

        <a href="agendamentos_recebidos.php" class="btn">Ver Agendamentos</a>
        <a href="logout.php" class="btn">Sair</a>
    </div>
</body>
</html>
