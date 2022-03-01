<?php
include 'menuHorizontal.php';
include_once('config.php');


    $sql = "SELECT * FROM perguntas ORDER BY id ASC";

    $result = $conexao->query($sql);

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
                        echo "<td>".$user_data['valorPonto']."</td>";
                        // echo "<td><input type='text'>
                        // <input type='submit' name='submit' id='submit' href='google.com'>  
                    //     echo '<td><form action="/action_page.php">
                    //     <label for="cars"></label>
                    //     <select id="cars" name="cars">
                    //       <option value=>Volvo</option>
                    //       <option value="saab">Saab</option>
                    //       <option value="fiat">Fiat</option>
                    //       <option value="audi">Audi</option>
                    //     </select>
                    //   </form></td>';
                        // </td>";

                        echo "<td> 
                                 
                             </td>";

                        echo "<td>

                                <a class='btn btn-sm btn-primary' type='submit' name='submit' id='submit' href='setarPerg.php?id=$user_data[id]'>

                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check' viewBox='0 0 16 16'>
                                <path d='M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z'/>
                              </svg>
</a>
                        
                        </td>";
                    }
                    
                ?>


            </tbody>
        </table>

    </div>

</html>