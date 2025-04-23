<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'admin') {
    header("Location: index.php");

    exit;
}

include("conexao.php");

$sql = "SELECT * FROM usuarios ORDER BY nome ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Usuários Cadastrados</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container">
    <h2>Usuários Cadastrados</h2>

    <?php if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="8">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["nome"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo ucfirst($row["tipo"]); ?></td>
                    <td>
    <a href="editar_usuario.php?id=<?php echo $row['id']; ?>">Editar</a> |
    <a href="excluir_usuario.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">
        Excluir
    </a>
</td>

                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Nenhum usuário encontrado.</p>
    <?php endif; ?>

    <br><a href="painel_admin.php" class="btn">Voltar ao Painel</a>
</div>
</body>
</html>
