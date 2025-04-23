<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'mecanico') {
    header("Location: index.php");
    exit;
}

include("conexao.php");

$sql = "SELECT a.*, u.nome AS cliente, c.modelo, c.placa
        FROM agendamentos a
        JOIN carros c ON a.id_carro = c.id
        JOIN usuarios u ON c.id_usuario = u.id
        ORDER BY a.data DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Agendamentos Recebidos</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container">
  <h2>Agendamentos Recebidos</h2>

  <?php if ($result->num_rows > 0): ?>
    <table border="1" cellpadding="8">
      <tr>
        <th>Cliente</th>
        <th>Carro</th>
        <th>Placa</th>
        <th>Data</th>
        <th>Descrição</th>
        <th>Status</th>
        <th>Ação</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row["cliente"]; ?></td>
        <td><?php echo $row["modelo"]; ?></td>
        <td><?php echo $row["placa"]; ?></td>
        <td><?php echo $row["data"]; ?></td>
        <td><?php echo $row["descricao"]; ?></td>
        <td><?php echo ucfirst($row["status"]); ?></td>
        <td>
          <?php if ($row["status"] === "pendente"): ?>
            <a href="concluir_agendamento.php?id=<?php echo $row['id']; ?>">Concluir</a>
          <?php else: ?>
            —
          <?php endif; ?>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <p>Nenhum agendamento encontrado.</p>
  <?php endif; ?>

  <br><a href="painel_mecanica.php" class="btn">Voltar</a>
</div>
</body>
</html>
