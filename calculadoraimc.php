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
        <h1>Caculadora IMC</h1>
    </header>
    <div class="container">
        <form action="calculadoraimc.php" method="POST">
            <label for="Nome">Nome:</label>
            <input type="text" id="Nome" name="nome" required><br><br>
            <label for="Peso">Peso(kg):</label>
            <input type="number" id="Peso" name="peso" step="0.1" required><br><br>
            <label for="Altura">Altura(m):</label>
            <input type="number" id="Altura" name="altura" step="0.01" required><br><br>
            <label for="anoNasc">Ano de nascimento:</label>
            <input type="number" id="AnoNasc" name="anoNasc" required><br><br>
            <input type="submit" value="Calcular">
            <input type="reset" value="Limpar">
        </form>
        <div class="Resposta">
            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['nome']) && isset($_POST['peso']) && isset($_POST['altura']) && isset($_POST['anoNasc'])) {
                    $nome = $_POST['nome'];
                    $peso = $_POST['peso'];
                    $altura = $_POST['altura'];
                    $anoNasc = $_POST['anoNasc'];
                    $anoAtual = date("Y");
                    $erro = empty($nome) || empty($peso) || empty($altura) || empty($anoNasc) ? "Todos os campos são obrigatórios" : ((!is_numeric($altura) || $peso <= 0 || $altura <= 0 || $anoNasc <= 0) ? "Por favor, insira valores válidos para peso e altura" : "");
                    if ($erro) {
                        echo $erro;
                    } else {
                        $idade =  $anoAtual - $anoNasc;
                        $imc = $peso / ($altura * $altura);
                        $imc = number_format($imc, 2);
                        $classificacao = ($imc < 18.5) ? "Abaixo do peso" : (($imc < 24.9) ? "Peso normal" : (($imc < 29.9) ? "Sobre peso" : "Obesidade"));
                        echo "Seu nome é: $nome<br>";
                        echo "Sua idade é: $idade<br>";
                        echo "Seu IMC é: $imc<br>";
                        echo "Classificação: $classificacao";
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