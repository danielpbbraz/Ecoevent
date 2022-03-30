<?php
    if(isset($_POST['submit']))
    {
        // print_r('Nome do evento :' . $_POST['nomeEvento']);
        // print_r('<br>');
        // print_r('Nome da empresa :' . $_POST['nomeEmpresa']);
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
        
        // $id = $_POST['id'];
        $nomeEvento = $_POST['nomeEvento'];
        $nomeEmpresa = $_POST['nomeEmpresa'];
        $cnpjEmpresa = $_POST['cnpjEmpresa'];
        $enderecoEvento = $_POST['endEvento'];
        $siteEvento = $_POST['siteEvento'];
        $dataInicial = $_POST['dataInicial'];
        $dataFinal = $_POST['dataFinal'];

        $result = mysqli_query($conexao, "INSERT INTO evento(nomeEvento, nomeEmpresa, 
        cnpjEmpresa,enderecoEvento, siteEvento, dataInicial, dataFinal) 
        VALUES ('$nomeEvento','$nomeEmpresa','$cnpjEmpresa','$enderecoEvento','$siteEvento','$dataInicial','$dataFinal')");
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

    <title>Form Evento</title>
</head>

<!--
 Evento: 
* Nome do evento
* Nome da empresa
* CNPJ
* Endereço do envento
* Site do envento
* Data de incio e termino 
-->

<body>

    <div class="box" id="form-evento">
        <form action="form_evento.php" method="POST">
            <!-- <fieldset> -->
                <legend><b>Formulário Evento</b></legend>
                <br>

                <div class="inputBox">
                <input type="text" name="nomeEvento" id="nomeEvento" class="inputUser" required>
                <label for="nomeEvento">Nome Evento</label>
                </div>
                <br>
                <div class="inputBox">
                <input type="text" name="nomeEmpresa" id="nomeEmpresa" class="inputUser" required>
                <label for="nomeEmpresa">Nome empresa</label>
                </div>
                <br>
                <div class="inputBox">
                <input type="text" name="cnpjEmpresa" id="cnpjEmpresa" class="inputUser" required>
                <label for="cnpjEmpresa">CNPJ</label>
                </div>
                <br>
                <div class="inputBox">
                <input type="text" name="endEvento" id="endEvento" class="inputUser" required>
                <label for="endEvento">Endereço evento</label>
                </div>
                <br>
                <div class="inputBox">
                <input type="text" name="siteEvento" id="siteEvento" class="inputUser" required>
                <label for="siteEvento">Site evento</label>
                </div>
                <br>
                <div class="inputBox">
                <input type="date" name="dataInicial" id="dataInicial" class="inputUser" required>
                <label for="dataInicial">data inicial</label>
                </div>
                <br>
                <div class="inputBox">
                <input type="date" name="dataFinal" id="dataFinal" class="inputUser" required>
                <label for="dataFinal">data final</label>
                </div> 
                <br>
                <input type="submit" name="submit" id="submit">
            <!-- </fieldset> -->
        </form>
    </div>

</body>





</html>