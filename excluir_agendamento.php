<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");

    exit;
}

include("conexao.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM agendamentos WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: meus_agendamentos.php");
        exit;
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
} else {
    echo "ID inválido.";
}
?>
