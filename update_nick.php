<?php
session_start();
include 'bd_con.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o usuário está logado
    if (!isset($_SESSION['id'])) {
        header("Location: entrar.html");
        exit();
    }

    // Obter o ID do usuário da sessão
    $userId = $_SESSION['id'];

    // Obter o novo nick do formulário
    $newNick = $conn->real_escape_string($_POST['new_nick']);

    // Atualizar o nick no banco de dados
    $query = "UPDATE contas SET nick = '$newNick' WHERE id = $userId";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Nick atualizado com sucesso!'); window.location.href = 'perfil.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar o nick: " . $conn->error . "'); window.location.href = 'perfil.php';</script>";
    }

    $conn->close();
} else {
    echo "Método de requisição inválido.";
}
