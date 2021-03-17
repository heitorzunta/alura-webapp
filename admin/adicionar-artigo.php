<?php

// FUTURAMENTE IMPLEMENTAR AUTOLOAD
require '../services/connection.php';
require '../src/Artigo.php';
require '../services/redirection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$artigo = new Artigo($mysql);
	$artigo->adicionarArtigo($_POST['titulo'], $_POST['conteudo']);

	//POST REDIRECT GET

	/*
		         O PRG Pattern (Post/Redirect/Get) é utilizado justamente para resolvermos este tipo de problema. Este padrão consiste basicamente em separar realmente o processamento das informações que chegam através do formulário, da página de resposta que será entregue ao cliente.

		        Abaixo temos o mais simples que redireciona para uma pagina ja em GET

	*/
	//Este aqui e mais usual recarrega a mesma página em GET ou dispara um 303 caso nao encontre-a;
	// header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
	// exit();

    Redirection::redirecionar('../admin/index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <form action="adicionar-artigo.php" method="post">
            <p>
                <label for="">Digite o título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo"></textarea>
            </p>
            <p>
                <button class="botao">Criar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>