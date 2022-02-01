<?php
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
        
        $nomeUser = $_POST['nome'];
        $emailUser = $_POST['email'];
       

        $result = mysqli_query($conexao, "INSERT INTO usuario(nomeUser, emailUser) 
        VALUES ('$nomeUser','$emailUser')");
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
            <fieldset>
                <legend><b>Formulário Usuario</b></legend>
                <br>
                <div class="inputBox">
                <input type="text" name="nome" id="nome" class="inputUser" required>
                <label for="nome">Nome</label>
                </div>
                <br>
                <div class="inputBox">
                <input type="text" name="email" id="email" class="inputUser" required>
                <label for="email">email</label>
                </div>
                <br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>

</body>





</html>