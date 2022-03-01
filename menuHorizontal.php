<?php
    // session_start();
    //     // print_r($_SESSION);
    //     if((!isset($_SESSION['nomeUser']) == true) and (!isset($_SESSION['senhaUser']) == true))
    //     {
    //         unset($_SESSION['nomeUser']);
    //         unset($_SESSION['senhaUser']);
    //         header('Location: Index.php');
    //     }
    //     $logado = $_SESSION['nomeUser']; 
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" type="text/css" href="estilo_login.css">
    <link rel="stylesheet" type="js" href="animation.js">
    <script src="animation.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body id="bodyMenu">

    <div id="nav_s">
        <header>
            <a href="#" class="btnAbrir" onclick="abrirMenu()">&#9776; Abrir</a>
        </header>
        <nav id="menu">
            <a href="#" onclick="fecharMenu()">&times; Fechar</a>
            <a href="form_evento.php">Cadastro de <strong>evento</strong></a>
            <a href="eventos.php">Lista de <strong>eventos</strong></a>
            <a href="form_usuario.php">Cadastro de <strong>usuário</strong></a>
            <a href="perguntas.php">Listagem de <strong>perguntas</strong></a>
            <a href="sair.php">Sair</a>
            <a href="#">topico 3</a>
        </nav>
    </div>
    <main id="conteudo">









    </main>

</body>

</html>