<?php
session_start();
require_once 'bd_con.php'; // Inclui a conexão com o banco

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário de login
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Protege contra SQL Injection Denner sabe muito
    $email = $conn->real_escape_string($email);
    $senha = $conn->real_escape_string($senha);

    // Verifica se o e-mail existe no banco de dados
    $query = "SELECT * FROM contas WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Se o usuário for encontrado e a senha for válida
    if ($user && password_verify($senha, $user['senha'])) {
        // Inicia a sessão e armazena os dados do usuário
        $_SESSION['id'] = $user['id'];
        $_SESSION['nick'] = $user['nick']; // Armazenando o nick para ser mostrado no index3.php

        // Redireciona para a página principal (index3.php)
        header("Location: index3.php");
        exit();
    } else {
        // Caso o login falhe, exibe uma mensagem de erro
        echo "E-mail ou senha incorretos.";
    }
}
?>
