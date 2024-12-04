<?php
session_start(); 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['id'])) {
    include 'bd_con.php';

    $userId = $_SESSION['id'];
    $query = "DELETE FROM contas WHERE id = $userId";

    if ($conn->query($query) === TRUE) {
        session_destroy();
        header("Location: cadastrar.html");
        exit();
    } else {
        echo "Erro ao excluir a conta: " . $conn->error;
    }
} else {
    header("Location: entrar.html");
    exit();
}
?>
