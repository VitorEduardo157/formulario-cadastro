<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro Recebido</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <style>
        .resultado {
            color: white;
            text-align: center;
            padding: 30px;
        }
        .resultado img {
            width: 200px;
            border-radius: 10px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="area resultado">
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nome = htmlspecialchars($_POST["nome"]);
            $genero = $_POST["genero"];
            $nascimento = $_POST["nascimento"];

            // Calcular idade
            $dataNascimento = new DateTime($nascimento);
            $dataAtual = new DateTime();
            $idade = $dataAtual->diff($dataNascimento)->y;

            // Mensagem de boas-vindas
            echo "<h2>Seja bem-vindo(a), <strong>$nome</strong>!</h2>";

            // Exibir imagem e texto baseado no gênero
            if ($genero === "masculino") {
                echo '<img src="img/homem.png" alt="homem">';
                echo "<p>Você é um <strong>homem</strong> e sua idade é <strong>$idade</strong> anos.</p>";
            } elseif ($genero === "feminino") {
                echo '<img src="img/mulher.png" alt="mulher">';
                echo "<p>Você é uma <strong>mulher</strong> e sua idade é <strong>$idade</strong> anos.</p>";
            } else {
                echo "<p>Gênero não identificado.</p>";
            }

            echo '<a href="index.html" class="btn btn-primary mt-4">Voltar</a>';
        } else {
            echo "<p>Dados não recebidos corretamente.</p>";
        }
        ?>
    </div>
</body>
</html>
