<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: entrar.html");
    exit();
}

include 'bd_con.php';

// Obter os conteúdos do banco de dados
$query = "SELECT * FROM conteudos";
$result = $conn->query($query);
$conteudos = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividades</title>
    <link rel="stylesheet" href="css/opaa.css">
</head>
<body>
    <div class="container-grid">
        <header class="nav-bar">
            <ul>
                <a href="index3.php">EXPLICAÇÕES</a>
            </ul>
            <button id="claro" onclick="trocarCor()">
                <img class="sol" src="https://png.pngtree.com/png-vector/20210823/ourlarge/pngtree-dark-mode-icon-light-png-clipart-png-image_3811921.jpg" alt="Modo Claro">
            </button>
            
            <!-- Nome do usuário -->
            <div class="user-info">
                <p><strong>Olá, <a href="perfil.php" class="user-name"><?php echo $_SESSION['nick']; ?></a></strong></p>
            </div>
        </header>

        <h1 class="titulo">Cinemática</h1>
        <div class="container-flex">
            <!-- Textos explicativos carregados dinamicamente -->
            <?php foreach ($conteudos as $conteudo): ?>
                <article class="content">
                    <h2><?php echo htmlspecialchars($conteudo['titulo']); ?></h2>
                    <h3><?php echo nl2br(htmlspecialchars($conteudo['texto'])); ?></h3>
                </article>
            <?php endforeach; ?>

            <!-- Conteúdo fixo da calculadora e gráficos -->
            <section class="content">
                <h1 class="grafico">Gráficos</h1>
                <img class="graf" src="img/graficos.jpg" alt="gráficos"><br>
                <h2>Calculadora da aceleração da Gravidade:</h2>

                <h1>Calculadora de G, a partir da fórmula: G = 2*m/t² </h1>

                <div class="calc">
                    <label for="massa">Massa (metros):</label>
                    <input type="number" id="metros" placeholder="Digite a altura em metros" required>
                    <br>
                    <label for="tempo">Tempo (tempo):</label>
                    <input type="number" id="tempo" placeholder="Digite o tempo (s)" required>
                    <br>
                    <button class="calcular" onclick="calcularG()">Calcular G</button>
                    <br>
                    <label for="resultado">Resultado (m):</label>
                    <div class="resultado" id="resultado"></div>
                </div>
            </section>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
