<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'cliente') {
  header("Location: index.php");

    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Carro</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <div class="container">
    <h2>Cadastrar Novo Carro</h2>
    <form action="cadastrar_carro.php" method="POST">
      <label>Modelo:</label>
      <input type="text" name="modelo" required><br><br>

      <label>Placa:</label>
      <input type="text" name="placa" required><br><br>

      <label>Ano:</label>
      <input type="number" name="ano" required><br><br>

      <button type="submit">Cadastrar</button>
    </form>

    <br><a href="painel_cliente.php">Voltar</a>
  </div>
</body>
</html>
