<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'admin') {
    header("Location: index.php");

    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel do Administrador</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h1>
        <p>Você está logado como <strong>Administrador</strong>.</p>

        <a href="usuarios_listar.php" class="btn">Gerenciar Usuários</a>
        <a href="todos_agendamentos.php" class="btn">Ver Todos os Agendamentos</a>
        <a href="relatorio_concluidos.php" class="btn">Relatório de Manutenções Concluídas</a>
        <a href="logout.php" class="btn">Sair</a>
    </div>
</body>
</html>
