<?php
include("conexao.php");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} else {
    echo "Conexão bem-sucedida com o banco de dados!";
}
?>
