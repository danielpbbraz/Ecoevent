<?php
include 'menuHorizontal.php';
include_once('config.php');

    $idUser = $_GET['id'];  
    $idEvent = $_GET['id2'];
    // $sqlSelectPrimary = "SELECT * FROM formsave WHERE id=$id";   

    $sql = "SELECT * FROM perguntas ORDER BY id ASC";

    $result = $conexao->query($sql);
     

    $sql1 = "SELECT * FROM formsave WHERE eventoSel = $idEvent";
    $result1 = $conexao->query($sql1);

    $i = 1;
    
    while($user_data1 = mysqli_fetch_assoc($result1)){
        // print_r("Passou pelo while");
        
        while(!empty ($user_data1['questao_'.$i])){

                $quest[$i] = $user_data1['questao_'.$i];
                print_r($user_data1['questao_'.$i]);
                $i++;
            }

        $reg = 1;
        }
        // print_r($quest);

    // function verificarSelecionado($id){
    
            
    //         $idEvent = $_GET['id2'];
    //         $sql1 = "SELECT * FROM formsave WHERE eventoSel = $idEvent";
    //         $result1 = $conexao->query($sql1);


    //         while($user_data1 = mysqli_fetch_assoc($result1)){

    //             $i = 1;
    //             while(!empty ('questao_'.$i)){
    //                 if($user_data1['questao_'.$i] == $id){
    //                     print_r("Já foi utilizada");
    //                 }



    //             $i++;
    //         }


    // print_r($result);
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
    <script>

    function mudarCor(id){

        document.getElementById(id).style.background.color = 'green';
    }


    </script>

    <div id="event">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Tema</th>
                    <th scope="col">Questão</th>
                    <!-- <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th> -->
                    <th scope="col">Tipo</th>
                    <th scope="col">Valor</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php

                   $idUser = $_GET['id'];  
                   $idEvent = $_GET['id2'];

                    while($user_data = mysqli_fetch_assoc($result))
                    {


                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['tema']."</td>";
                        echo "<td>".$user_data['perguntaIni']."</td>";
                        // echo "<td>".$user_data['alter_1']."</td>";
                        // echo "<td>".$user_data['alter_2']."</td>";
                        // echo "<td>".$user_data['alter_3']."</td>";
                        // echo "<td>".$user_data['alter_4']."</td>";
                        // echo "<td>".$user_data['sub_alter_1']."</td>";
                        // echo "<td>".$user_data['sub_alter_2']."</td>";
                        // echo "<td>".$user_data['sub_alter_3']."</td>";
                        // echo "<td>".$user_data['sub_alter_4']."</td>";
                        echo "<td>".$user_data['tipoPergunta']."</td>";
                        //echo "<td>".$user_data['valorPonto']."</td>";            
                        if(!empty($quest)){
                        if(in_array($user_data['id'], $quest) == true){
                           
                            echo "<td>
                                
                            <a class='btn btn-danger' id='".$user_data['id']."' href='dsetarPerg.php?idQuest=$user_data[id]&idUser1=$idUser&idEvent1=$idEvent'>
           
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
  <path fill-rule='evenodd' d='M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z'/>
  <path fill-rule='evenodd' d='M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z'/>
</svg>
            </a>
                                            </td>";
                            
                        }else{

echo "<td>
                                
                            <a class='btn btn-success' id='' href='setarPerg.php?idQuest=$user_data[id]&idUser1=$idUser&idEvent1=$idEvent'>
           
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-lg' viewBox='0 0 16 16'>
  <path fill-rule='evenodd' d='M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z'/>
</svg>
            </a>
</td>";

                        }
                    }else{
                       
                        
echo "<td>
                                
<a class='btn btn-success' id='' href='setarPerg.php?idQuest=$user_data[id]&idUser1=$idUser&idEvent1=$idEvent'>

<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-lg' viewBox='0 0 16 16'>
<path fill-rule='evenodd' d='M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z'/>
</svg>
</a>
</td>";

}
                
              
            
                
            
            
            }      
                    
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>