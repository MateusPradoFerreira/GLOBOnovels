<?php
include('conexao.php');

$sql = "select * from ator order by nomeAtor";
$dados = mysqli_query($conexao, $sql);

$sql = "select * from novela order by nomeNovela";
$dados2 = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <section class="l-gerenciador">
        <h1 class="c-gerenciador__logo">
            GLOBO<span>novels</span>
        </h1>
        <div class="l-gerenciador__itens-menu">
            <a href="index.php" class="c-gerenciador__a">
                <div class="c-gerenciador__iten active">
                    Home
                </div>
            </a>
            <a href="gerenciarAtores.php" class="c-gerenciador__a">
                <div class="c-gerenciador__iten">
                    Gerenciar Atores
                </div>
            </a>
            <a href="gerenciarNovelas.php" class="c-gerenciador__a">
                <div class="c-gerenciador__iten">
                    Gerenciar Novelas
                </div>
            </a>
            <a href="sobre.html" class="c-gerenciador__a">
                <div class="c-gerenciador__iten">
                    Sobre
                </div>
            </a>
        </div>
    </section>

    <section class="l-main">
        <div class="c-main__header">
            Confira todos os Atores, Atrizes e Novelas Registradas
        </div>
        <div class="c-main__container">

            <h1>ATORES E ATRIZES</h1>

            <?php
            if (mysqli_num_rows($dados) > 0) {
            ?>
                <table class="c-main__table">
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>IDADE</th>
                        <th>SALARIO</th>
                        <th>SEXO</th>
                        <th>CIDADE</th>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_assoc($dados)) {
                    ?>
                        <tr>
                            <td> <?= $linha['codigo'] ?> </td>
                            <td> <?= $linha['nomeAtor'] ?> </td>
                            <td> <?= $linha['idade'] ?> </td>
                            <td>R$ <?= $linha['salario'] ?> </td>
                            <td> <?= $linha['sexoAtor'] ?> </td>
                            <td> <?= $linha['cidadeAtor'] ?> </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            <?php
            }
            ?>

            <br><br>

            <h1>NOVELAS</h1>

            <?php
            if (mysqli_num_rows($dados2) > 0) {
            ?>
                <table class="c-main__table">
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>N° CAPITULOS</th>
                        <th>DT. PRIMEIRO CAP.</th>
                        <th>DT. ULTIMO CAP.</th>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_assoc($dados2)) {
                    ?>
                        <tr>
                            <td> <?= $linha['codigo']?> </td>
                            <td> <?= $linha['nomeNovela']?> </td>
                            <td> <?= $linha['numeroCapitulo']?> </td>
                            <td> <?= $linha['dataPriCap']?> </td>
                            <td> <?= $linha['dataUltiCap']?> </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            <?php
            }
            ?>

        </div>

    </section>
</body>

</html>