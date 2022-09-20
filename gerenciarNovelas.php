<?php
include('conexao.php');

if(isset($_POST['addNovela'])) {
    $add = "insert into novela (nomeNovela, numeroCapitulo, dataPriCap, dataUltiCap) 
    values ('".$_POST['nomeNovela']."', '".$_POST['numeroCapitulo']."', '".$_POST['dataPriCap']."', '".$_POST['dataUltiCap']."')";
    mysqli_query($conexao, $add);
}

if(isset($_POST['deletar'])) {
    mysqli_query($conexao, "delete from novela where codigo = '".$_POST['deletar']."'");
}

$sql = "select * from novela order by nomeNovela";
$dados = mysqli_query($conexao, $sql);
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
                <div class="c-gerenciador__iten ">
                    Home
                </div>
            </a>
            <a href="gerenciarAtores.php" class="c-gerenciador__a">
                <div class="c-gerenciador__iten">
                    Gerenciar Atores
                </div>
            </a>
            <a href="gerenciarNovelas.php" class="c-gerenciador__a">
                <div class="c-gerenciador__iten active">
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
            Novelas
            <a href="adicionarNovela.html"><button class="c-main__button">ADD</button></a>
        </div>
        <div class="c-main__container">

            <?php
            if (mysqli_num_rows($dados) > 0) {
            ?>
                <table class="c-main__table">
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>N° CAPITULOS</th>
                        <th>DT. PRIMEIRO CAP.</th>
                        <th>DT. ULTIMO CAP.</th>
                        <th></th>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_assoc($dados)) {
                    ?>
                        <tr>
                            <td> <?= $linha['codigo']?> </td>
                            <td> <?= $linha['nomeNovela']?> </td>
                            <td> <?= $linha['numeroCapitulo']?> </td>
                            <td> <?= $linha['dataPriCap']?> </td>
                            <td> <?= $linha['dataUltiCap']?> </td>
                            <td> <form action="" method="post"> 
                                <button class="c-main__table-bnt-ecxl" value="<?= $linha['codigo']?>" name="deletar"> <img src="imagem/lixeira.png" alt=""> </button> 
                            </form> </td>
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