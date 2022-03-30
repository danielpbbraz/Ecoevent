<?php
include 'menuHorizontal.php';
include_once('config.php');
    $idP = $_GET['id'];
    // print_r($idP);
    $sql = "SELECT * FROM usuario WHERE eventoEmp = $idP";

    $result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo_login.css">
    <title>Eco Event | Eventos</title>
</head>

<body>
    <?php
    
    $arquivo = 'resultados.xls';

    $html = '';
    $html .= '<table border="1">';


    
    $html .= '</table>';

    
    ?>
</body>

</html>