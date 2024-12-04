<?php
session_start();
// Conexão com o banco de dados
include 'bd_con.php';

// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtendo os dados do formulário
    $nick = $_POST['nick'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Protegendo os dados para evitar SQL Injection Denner sabe muito
    $nick = $conn->real_escape_string($nick);
    $email = $conn->real_escape_string($email);
    $senha = $conn->real_escape_string($senha);

    // Hashificando a senha antes de salvar no banco Denner sabendo muito dnv
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Gerando a inserção dos dados no banco de dados senha hash era p ajudar a esconder a senha
    $sql = "INSERT INTO contas (nick, email, senha) VALUES ('$nick', '$email', '$senha_hash')";

    // Verificando se as informações foram enviadas ao banco de dados
    if ($conn->query($sql) === TRUE) {
        header("Location: entrar.html");
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fechando a conexão com o banco de dados
    $conn->close();
} else {
    echo "Método de requisição inválido.";
}
?>
