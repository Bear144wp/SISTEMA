<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: index.php");

    exit;
}

include("conexao.php");

// Se for admin, mostra todas as manutenções
if ($_SESSION['tipo'] == 'admin') {
    $sql = "SELECT a.*, u.nome AS cliente, c.modelo, c.placa
            FROM agendamentos a
            JOIN carros c ON a.id_carro = c.id
            JOIN usuarios u ON c.id_usuario = u.id
            WHERE a.status = 'concluido'
            ORDER BY a.data DESC";
} else {
    $id_usuario = $_SESSION['id'];
    $sql = "SELECT a.*, c.modelo, c.placa
            FROM agendamentos a
            JOIN carros c ON a.id_carro = c.id
            WHERE c.id_usuario = $id_usuario AND a.status = 'concluido'
            ORDER BY a.data DESC";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Relatório de Manutenções Concluídas</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container">
  <h2>Relatório de Manutenções Concluídas</h2>

  <?php if ($result->num_rows > 0): ?>
    <table border="1" cellpadding="8">
      <tr>
        <?php if ($_SESSION['tipo'] == 'admin'): ?>
            <th>Cliente</th>
        <?php endif; ?>
        <th>Carro</th>
        <th>Placa</th>
        <th>Data</th>
        <th>Descrição</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <?php if ($_SESSION['tipo'] == 'admin'): ?>
            <td><?php echo $row["cliente"]; ?></td>
        <?php endif; ?>
        <td><?php echo $row["modelo"]; ?></td>
        <td><?php echo $row["placa"]; ?></td>
        <td><?php echo $row["data"]; ?></td>
        <td><?php echo $row["descricao"]; ?></td>
      </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <p>
      <?php echo $_SESSION['tipo'] == 'admin' ? 'Nenhuma manutenção concluída encontrada.' : 'Você ainda não tem manutenções concluídas.'; ?>
    </p>
  <?php endif; ?>

  <br>
  <a href="<?php echo ($_SESSION['tipo'] == 'admin') ? 'painel_admin.php' : 'painel_cliente.php'; ?>" class="btn">Voltar ao Painel</a>
</div>
</body>
</html>
