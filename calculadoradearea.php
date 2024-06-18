<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>

<body>

    <header>
        <h1>Calculadora de áreas</h1>
    </header>

    <div class="container">
        <form action="calculadoradearea.php" method="POST">
            <label for="escolha">Escolha a forma:</label>
            <select name="formas">
                <option name="retangulo">Retângulo</option>
                <option name="triangulo">Triângulo</option>
                <option name="circulo">Circulo</option>
            </select><br><br>
            <label for="largura">Largura:</label>
            <input type="number" id="Largura" name="largura" step="0.01" required><br><br>
            <label for="altura">Altura:</label>
            <input type="number" id="Altura" name="altura" step="0.01" required><br><br>
            <label for="base">Base:</label>
            <input type="number" id="Base" name="base" step="0.01" required><br><br>
            <label for="alturatri">Altura triângulo:</label>
            <input type="number" id="Alturatri" name="alturatri" step="0.01" required><br><br>
            <label for="raio">Raio:</label>
            <input type="number" id="Raio" name="raio" step="0.01" required><br><br>
            <input type="submit" value="Calcular">
            <input type="reset" value="Limpar">
        </form>
        <div class="Resposta">
            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['formas']) && isset($_POST['largura']) && isset($_POST['altura']) && isset($_POST['base']) && isset($_POST['alturatri']) && isset($_POST['raio'])) {
                    $formas = $_POST['formas'];
                    $largura = $_POST['largura'];
                    $altura = $_POST['altura'];
                    $base = $_POST['base'];
                    $alturatri = $_POST['alturatri'];
                    $raio = $_POST['raio'];
                    $pi = 3.14;
                    $retangulo = $largura * $altura;
                    $triangulo = $alturatri * $base;
                    $circulo = $pi * ($raio * 2);
                    if ($retangulo) {
                        echo "O valor da área é: $formas<br>";
                    } else if ($triangulo) {
                        echo "O valor da área é: $formas<br>";
                    } else if ($circulo) {
                        echo "O valor da área é: $formas<br>";
                    }
                    $erro = (empty($formas) || empty($largura) || empty($altura) || empty($base) || empty($alturatri) || empty($raio)) ? "Todos os campos são obrigatórios" : ((!is_numeric($formas) || $formas <= 0 || $largura <= 0 || $altura <= 0 || $base <= 0 || $alturatri <= 0 || $raio <= 0) ? "Por favor, insira valores válidos" : "");
                    if ($erro) {
                        echo $erro;
                    } else {
                        echo "O valor convertido é: <br>";
                    }
                } else {
                    echo "Formulário não enviado corretamente";
                }
            }
            ?>
        </div>
    </div>

</body>

</html>