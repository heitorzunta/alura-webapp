<?php

require '../src/Artigo.php';
require '../services/connection.php';
require '../services/Redirection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $artigo = new Artigo($mysql);
    $artigo->editaArtigo($_POST['id'], $_POST['titulo'], $_POST['conteudo']);
    Redirection::redirecionar('../admin/index.php');
}

$artigo = new Artigo($mysql);
$artigoAtual= $artigo->encontrarCorpoArtigo($_GET['id']);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Editar Artigo</h1>
        <form action="editar-artigo.php" method="post">
            <p>
                <label for="titulo">Digite o novo título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?php echo $artigoAtual['titulo']; ?>"/>
            </p>
            <p>
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="titulo"> <?php echo $artigoAtual['conteudo']; ?> </textarea>
            </p>
            <p>
                <input type="hidden" name="id" value="<?php echo $artigoAtual['id']; ?>" />
            </p>
            <p>
                <button class="botao">Editar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>