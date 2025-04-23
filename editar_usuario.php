<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'admin') {
    header("Location: index.php");

    exit;
}

include("conexao.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $usuario = $conn->query("SELECT * FROM usuarios WHERE id = $id")->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $novoTipo = $_POST['tipo'];

    $conn->query("UPDATE usuarios SET tipo = '$novoTipo' WHERE id = $id");
    header("Location: usuarios_listar.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container">
    <h2>Editar Tipo de Usuário</h2>
    <form method="POST" action="editar_usuario.php">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

        <p><strong>Nome:</strong> <?php echo $usuario['nome']; ?></p>
        <p><strong>Email:</strong> <?php echo $usuario['email']; ?></p>

        <label>Tipo de Conta:</label><br>
        <select name="tipo" required>
            <option value="cliente" <?php if ($usuario['tipo'] == 'cliente') echo 'selected'; ?>>Cliente</option>
            <option value="mecanico" <?php if ($usuario['tipo'] == 'mecanico') echo 'selected'; ?>>Mecânica</option>
            <option value="admin" <?php if ($usuario['tipo'] == 'admin') echo 'selected'; ?>>Administrador</option>
        </select><br><br>

        <button type="submit">Salvar Alterações</button>
    </form>

    <br><a href="usuarios_listar.php" class="btn">Voltar</a>
</div>
</body>
</html>
