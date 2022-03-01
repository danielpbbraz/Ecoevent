<?php

    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nomeEvento = $_POST['nomeEvento'];
        $nomeEmpresa = $_POST['nomeEmpresa'];
        $cnpjEmpresa = $_POST['cnpjEmpresa'];
        $enderecoEvento = $_POST['enderecoEvento'];
        $siteEvento = $_POST['siteEvento'];
        $dataInicial = $_POST['dataInicial'];
        $dataFinal = $_POST['dataFinal'];

        $sqlUpdate = "UPDATE evento SET nomeEvento='$nomeEvento' , nomeEmpresa='$nomeEmpresa',cnpjEmpresa='$cnpjEmpresa',enderecoEvento='$enderecoEvento',siteEvento='$siteEvento',dataInicial='$dataInicial',dataFinal='$dataFinal' WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);


    }
    header('Location: eventos.php')

?>