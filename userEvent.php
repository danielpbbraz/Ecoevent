<?php
include 'menuHorizontal.php';
include_once('config.php');
    $idP = $_GET['id'];

    $sql = "SELECT * FROM usuario WHERE eventoEmp = $idP ORDER BY id ASC";

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
    <a href="eventos.php">Voltar</a>

    <div id="event">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Evento</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    while($user_data = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['nomeUser']."</td>";
                        echo "<td>".$user_data['emailUser']."</td>";
                        echo "<td>".$user_data['senhaUser']."</td>";
                        echo "<td>".$user_data['eventoEmp']."</td>";
                        echo "<td>                       
                        <a class='btn btn-sm btn-primary' href='selectPerguntas.php?id=$user_data[id]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
</svg>
</a>
                        </td>";
                    }
                ?>
            </tbody>
        </table>

    </div>



</body>

</html>