<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Caculadora IMC</h1>
    <form action="calculadora.php" method="POST">
        <label for="Peso">Peso(kg):</label>
        <input type="number" id="Peso" name="peso" step="0.1" required><br><br>
        <label for="Altura">Altura(m):</label>
        <input type="number" id="Altura" name="altura" step="0.01" required><br><br>
        <input type="submit" value="Calcular imc">
        <input type="reset" value="Limpar">
    </form>
    <div class="Resposta">
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['peso']) && isset($_POST['altura'])) {
                $peso = $_POST['peso'];
                $altura = $_POST['altura'];
                $erro = empty($peso) || empty($altura) ? "Todos os campos são obrigatórios" : ((!is_numeric($altura) || $peso <= 0 || $altura <= 0) ? "Por favor, insira valores válidos para peso e altura" : "");
                if ($erro) {
                    echo $erro;
                } else {
                    $imc = $peso / ($altura * $altura);
                    $imc = number_format($imc, 2);
                    $classificacao = ($imc < 18.5) ? "Abaixo do peso" : (($imc < 24.9) ? "Peso normal" : (($imc < 29.9) ? "Sobre peso" : "Obesidade"));
                    echo "Seu IMC é: $imc<br>";
                    echo "Classificação: $classificacao";
                }
            } else {
                echo "Formulário não enviado corretamente";
            }
        }
        ?>
    </div>

</body>

</html>