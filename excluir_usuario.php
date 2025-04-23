<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'admin') {
    header("Location: index.php");

    exit;
}

include("conexao.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Evita que o admin exclua a própria conta
    if ($_SESSION['id'] == $id) {
        echo "Você não pode excluir sua própria conta.";
        exit;
    }

    // Exclui o usuário
    $conn->query("DELETE FROM usuarios WHERE id = $id");

    header("Location: usuarios_listar.php");
}
?>
