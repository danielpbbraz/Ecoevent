<?php
include_once('config.php');
    
    // header('Location: criar_form.php');
    $id = $_GET['id'];
    $questao = 'questao_'.$id;

    print_r($questao);

    $sqlSelect = "SELECT * FROM evento WHERE id=$id";
    $result1 = $conexao->query($sqlSelect);


    $result = mysqli_query($conexao, "INSERT INTO formsave($questao) 
        VALUES ('$questao')");

?>