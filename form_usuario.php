<?php
    $idUser = $_GET['id'];

    if(isset($_POST['submit']))
    {
        // print_r('Nome do evento :' . $_POST['nameEvento']);
        // print_r('<br>');
        // print_r('Nome da empresa :' . $_POST['nameEmpresa']);
        // print_r('<br>');
        // print_r('Cnpj da empresa :' . $_POST['cnpjEmpresa']);
        // print_r('<br>');
        // print_r('Nome da empresa :' . $_POST['endEvento']);
        // print_r('<br>');
        // print_r('Cnpj da empresa :' . $_POST['cnpjEmpresa']);
        // print_r('<br>');
        // print_r('Site do evento :' . $_POST['siteEvento']);
        // print_r('<br>');
        // print_r('Data incial :' . $_POST['dataInicial']);
        // print_r('<br>');
        // print_r('Data final :' . $_POST['dataFinal']);
        
        
        include_once('config.php');
        include 'menuHorizontal.php';
        
   
        $eventoEmp = $_POST['evento'];
        $nomeUser = $_POST['nome'];
        $emailUser = $_POST['email'];
        $senhaUser = $_POST['senha'];
        

        $result = mysqli_query($conexao, "INSERT INTO usuario(eventoEmp, nomeUser, emailUser , senhaUser) 
        VALUES ('$eventoEmp','$nomeUser','$emailUser','$senhaUser')");

        header('Location: eventos.php');
    }
?>
<!DOCTYPE html>
<html lang="pt">
<?php include 'menuHorizontal.php'; ?>

<head>
    <link rel="stylesheet" type="text/css" href="estilo_login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <script src="animation.js"></script>

    <title>Formulário | User</title>
</head>

<!--
 Usuario: 
* Nome
* E-mail
-->

<body>

    <div class="box" id="form-usuario">
        <form action="form_usuario.php" method="POST">
            <!-- <fieldset> -->
                <legend><b>Formulário Usuario</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" placeholder="nome" class="inputUser" required>
                    <label for="nome">Nome</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" placeholder="email" class="inputUser" required>
                    <label for="email">email</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="password" class="inputUser" placeholder="senha" required>
                    <label for="password">senha</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="number" name="evento" id="evento" placeholder="id evento" class="inputUser" required>
                    <label for="evento">Id evento</label>
                </div>
                <!-- <div class="inputBox">
                    <input type="hidden" name="evento"  class="inputUser" required>
                </div> -->
                <!-- <select name="event" id="event_1" class="inputUser">
                    <option>Exemplo 1</option>
                    <option>Exemplo 2</option>
                    <option>Exemplo 3</option>
                    <option>Exemplo 4</option>
                </select> -->

                <input type="submit" name="submit" id="submit" >
            <!-- </fieldset> -->
        </form>
    </div>

</body>





</html>