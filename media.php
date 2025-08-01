<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cálculo de Média Escolar</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            color: #333;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            width: 380px;
            text-align: center;
            border: 1px solid #ddd;
        }
        h1 {
            margin-bottom: 20px;
            color: #444;
            font-size: 1.8rem;
            font-weight: 500;
        }
        .inputs {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 20px;
        }
        input[type="number"] {
            width: 100px;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
            outline: none;
        }
        input[type="number"]:focus {
            border-color: #5e9fdd;
            background-color: #f9f9f9;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            font-weight: 500;
            margin-top: 20px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .resultado {
            margin-top: 20px;
            font-size: 18px;
            font-weight: 600;
            padding: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            text-align: center;
        }
        .aprovado { color: #28a745; }
        .reprovado { color: #dc3545; }
        .recuperacao { color: #ffc107; }
        .emoji {
            font-size: 1.5rem;
            vertical-align: middle;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calcule sua Média</h1>
        <form method="post">
            <div class="inputs">
                <input type="number" name="n1" step="0.01" min="0" max="10" placeholder="Nota 1" required>
                <input type="number" name="n2" step="0.01" min="0" max="10" placeholder="Nota 2" required>
                <input type="number" name="n3" step="0.01" min="0" max="10" placeholder="Nota 3" required>
            </div>
            <button type="submit">Calcular Média</button>
        </form>

        <?php
        function media($n1, $n2, $n3){
            return ($n1 + $n2 + $n3) / 3;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $n1 = $_POST["n1"];
            $n2 = $_POST["n2"];
            $n3 = $_POST["n3"];
            $media_final = media($n1, $n2, $n3);
            $media_formatada = number_format($media_final, 2, ',', '.');

            echo "<div class='resultado'>Média final: <strong>$media_formatada</strong><br>";

            if ($media_final >= 7) {
                echo "<span class='aprovado'><span class='emoji'>✔️</span>Aprovado</span>";
            } elseif ($media_final >= 5) {
                echo "<span class='recuperacao'><span class='emoji'>⚠️</span>Recuperação</span>";
            } else {
                echo "<span class='reprovado'><span class='emoji'>❌</span>Reprovado</span>";
            }

            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
