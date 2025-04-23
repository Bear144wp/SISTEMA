<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'mecanico') {
    header("Location: index.php");

    exit;
}

include("conexao.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "UPDATE agendamentos SET status = 'concluido' WHERE id = $id";
    $conn->query($sql);
}

header("Location: agendamentos_recebidos.php");
