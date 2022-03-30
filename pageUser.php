<?php
include_once('config.php');

    // session_start();

    // if(isset($_SESSION['text'])){
    //     $teste = $_SESSION['text'];
    //     // alertPerguntas($teste);
    //     print_r($teste);
    // }else{
    //     print_r("vamos lá!");
    // }

    $idUser= $_GET['id'];
    $sql = "SELECT * FROM formsave ORDER BY userForm = 51 ";
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
    <link rel="stylesheet" type="js" href="animation.js">
    <script src="animation.js">

        function alertPerguntas($teste) {
            alert($teste);
        }

    </script>

    <title>Document</title>
</head>

<body id="bodyMenu">

    <div id="lateralBar">   

    <?php

    


    while($user_data = mysqli_fetch_assoc($result))  {
              
        if($user_data['userForm'] ==  $idUser){
        echo "<a class='formUserNav' href='formView.php?id=51'>".$user_data['nomeForm']."</a>";
    }
    }
        ?>

    </div>


</body>

</html>