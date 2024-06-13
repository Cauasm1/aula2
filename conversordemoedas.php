<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Conversor de Moeda</h1>
    <form action="conversordemoedas.php" method="POST">
        <label for="valor">Valor:</label>
        <input type="number" id="Valor" name="valor" required><br><br>
        <label for="converterde">Converter de:</label>
        <select name="moedas">
            <option value="brl">BRL</option>
            <option value="usd">USD</option>
            <option value="eur">EUR</option>
        </select><br><br>
        <label for="converterpara">Converter para:</label>
        <select name="moedas">
            <option value="brl">BRL</option>
            <option value="usd">USD</option>
            <option value="eur">EUR</option>
        </select><br><br>
        <input type="submit" value="Converter">
        <input type="reset" value="Limpar">
    </form>
    <div class="Resposta">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['valor']) && isset($_POST['converterde']) && isset($_POST['converterpara'])) {
                $valor = $_POST['valor'];
                $converterde = $_POST['converterde'];
                $converterpara = $_POST['converterpara'];
               
                $erro = empty($valor) || empty($converterde) || empty($converterpara) ? "Todos os campos são obrigatórios" : ((!is_numeric($valor) <= 0 || $converterde <= 0 || $converterde <= 0) ? "Por favor, insira valores válidos" : "");
                if ($erro) {
                    echo $erro;
                } else {
                    echo "O valor convertido é: $converter<br>";
                }
            } else {
                echo "Formulário não enviado corretamente";
            }
        }
        ?>
    </div>

</body>

</html>