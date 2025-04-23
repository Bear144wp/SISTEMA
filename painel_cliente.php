<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'cliente') {
    header("Location: index.php");

    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel do Cliente</title>
    <link rel="stylesheet" href="estilo.css"> <!-- Certifique-se que o nome está certo -->
</head>
<body>
    <div class="container">
        <h1>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h1>
        <p>Você está logado como <strong>Cliente</strong>.</p>

        <a href="form_carro.php" class="btn">Cadastrar Carro</a><br><br>
        <a href="meus_carros.php" class="btn">Ver Meus Carros</a><br><br>
        <a href="form_agendar.php" class="btn">Agendar Manutenção</a><br><br>
        <a href="meus_agendamentos.php" class="btn">Ver Meus Agendamentos</a><br><br>
        <a href="relatorio_concluidos.php" class="btn">Manutenções Concluídas</a><br><br>
        <a href="logout.php" class="btn">Sair</a>
    </div>
</body>
</html>
