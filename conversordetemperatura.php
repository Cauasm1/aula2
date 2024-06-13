<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Conversor de temperatura</h1>
    <form action="conversordetemperatura.php" method="POST">
        <label for="temperatura">Temperatura:</label>
        <input type="number" id="Temperatura" name="temperatura" step="0.01" required><br><br>
        <label for="converter">Converter para:</label>
        <select name="temp">
            <option name="celsius">Celsius</option>
            <option name="fahreinheit">Fahreinheit</option>
        </select><br><br>
        <input type="submit" value="Converter">
        <input type="reset" value="Limpar">
    </form>
    <div class="Resposta">
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['temperatura']) && isset($_POST['temp'])) {
                $temperatura = $_POST['temperatura'];
                $temp = $_POST['temp'];
                $celsius = ($temperatura + 9 / 5) + 32;
                $fahreinheit = ($temperatura - 32) * 5 / 9;
                if ($temp = $celsius) {
                    echo "O valor convertido é: $temp<br>";
                } else if ($temp = $fahreinheit) {
                    echo "O valor convertido é: $temp<br>";
                }
                $erro = (empty($temperatura)) ? "Todos os campos são obrigatórios" : ((!is_numeric($temperatura) || $temperatura <= 0 || $converter <= 0) ? "Por favor, insira valores válidos" : "");
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

</body>

</html>