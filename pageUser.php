<?php
include_once('config.php');

    $idUser= $_GET['id'];
    $sql = "SELECT * FROM formsave ORDER BY userForm = $idUser ";
    $result = $conexao->query($sql);

    // print_r($result);
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo_login.css">
    <title>Document</title>
</head>

<body id="bodyMenu">

    <div id="lateralBar">
    
    

    <?php

    while($user_data = mysqli_fetch_assoc($result))  {
              
        if($user_data['userForm'] == $idUser){
        echo '<a class="formUserNav" href="formView.php">'.$user_data['nomeForm'].'</a>';
    }
    }
        ?>

    </div>


</body>

</html>