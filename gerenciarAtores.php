<?php
include('conexao.php');

if(isset($_POST['addAtor'])) {
    $add = "insert into ator (nomeAtor, idade, salario, sexoAtor, cidadeAtor)
    values ('".$_POST['nomeAtor']."', '".$_POST['idade']."', '".$_POST['salario']."', '".$_POST['sexoAtor']."', '".$_POST['cidadeAtor']."')";
    mysqli_query($conexao, $add);
}

if(isset($_POST['deletar'])) {
    mysqli_query($conexao, "delete from ator where codigo = '".$_POST['deletar']."'");
}

$sql = "select * from ator order by nomeAtor";
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
                <div class="c-gerenciador__iten active">
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
            Atores e Atrizes
            <a href="adicionarAtores.html"><button class="c-main__button">ADD</button></a>
        </div>
        <div class="c-main__container">

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
                        <th></th>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_assoc($dados)) {
                    ?>
                        <tr>
                            <td> <?= $linha['codigo']?> </td>
                            <td> <?= $linha['nomeAtor']?> </td>
                            <td> <?= $linha['idade']?> </td>
                            <td>R$ <?= $linha['salario']?> </td>
                            <td> <?= $linha['sexoAtor']?> </td>
                            <td> <?= $linha['cidadeAtor']?> </td>
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