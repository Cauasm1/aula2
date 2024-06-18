<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Rifa</title>
</head>

<body>

    <header>
        <h1>Rifa</h1>
    </header>

    <div class="container">
        <form action="rifa.php" method="POST">
            <h1>Rifa - Ação entre amigos</h1>
            <label for="valor">Valor:</label>
            <input type="text" name="valor">

            <label for="quantNum">Quantidade:</label>
            <input type="text" name="quantNum">

            <input type="submit" value="Criar">
            <input type="reset" value="Limpar"><br>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['valor']) || isset($_POST['quantNum'])) {
                $premio = 'JBL';
                $valor = $_POST['valor'];
                $quantNum = $_POST['quantNum'];

                $erro = (empty($valor) || empty($quantNum)) ?
                    "Todos os campos são obrigatórios" : (($valor < 0 || $quantNum < 0) ?
                        "Por favor, insira valores válidos" : "");
                if ($erro) {
                    echo $erro;
                } else {
                    for ($i = 1; $i <= $quantNum; $i++) {
                        echo "<center><table >
                        <tr class='linha'>
                            <td class='usuario'>
                                <p>Número: $i<br></p>
                                <p>Valor: R$$valor<br></p>
                                <p>Nome:_____________________<br></p>
                                <p>Telefone:_________________<br></p>
                            </td>
                            <td class='informacoes'>
                                <p>----- Ação entre amigos -----<br></p>
                                <p>Número: $i<br></p>
                                <p>Prêmio: $premio<br></p>
                                 
                                <img style='width: 120px;' src=https://www.jbl.com.br/dw/image/v2/BFND_PRD/on/demandware.static/-/Sites-masterCatalog_Harman/default/dw8bfad4fa/1_JBL_BOOMBOX_3_HERO_BLACK_33216_x2.png?sw=535&sh=535 />

                            </td>
                        </tr>
                    </table></center>";
                    }
                }
            } else {
                echo "Formulário não enviado corretamente!";
            }
        }
        ?>
    </div>

</body>

</html>