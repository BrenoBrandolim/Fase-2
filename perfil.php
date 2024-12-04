<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: entrar.html");
    exit();
}

include 'bd_con.php';

// Obtem os dados do usuário logado -- coisas muito locas
$userId = $_SESSION['id'];
$query = "SELECT * FROM contas WHERE id = $userId";
$result = $conn->query($query);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/opaa.css">
    <link rel="stylesheet" href="css/perfil.css"> 
</head>
<body>
    <div class="perfil-container">
        <div class="perfil-card">
            <h1>Perfil do Usuário</h1>
            <p><strong>Nickname:</strong> <?= htmlspecialchars($user['nick']); ?></p>
            <p><strong>E-mail:</strong> <?= htmlspecialchars($user['email']); ?></p>

            <!-- Formulário para atualizar o nick -->
            <form action="update_nick.php" method="POST">
                <label for="new_nick">Alterar Nick:</label>
                <input type="text" id="new_nick" name="new_nick" placeholder="Novo Nick" required>
                <button type="submit">Atualizar</button>
            </form>

            <!-- Botão para excluir conta, não aguento mais fazer isso-->
            <form action="delete_account.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir sua conta?');">
                <button class="delete-btn" type="submit">Excluir Conta</button>
            </form>
        </div>
    </div>
</body>
</html>
