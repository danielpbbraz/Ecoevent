<?php
    if(!empty($_GET['id']))
    {
        include_once('config.php');

        $id= $_GET['id'];

        $sqlSelect = "SELECT * FROM evento WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))  
           
            {
            $nomeEvento = $user_data['nomeEvento'];
            $nomeEmpresa = $user_data['nomeEmpresa'];
            $cnpjEmpresa = $user_data['cnpjEmpresa'];
            $enderecoEvento = $user_data['enderecoEvento'];  
            $siteEvento = $user_data['siteEvento'];
            $dataInicial = $user_data['dataInicial'];
            $dataFinal = $user_data['dataFinal'];  
            }

        }
        else
        {
            header('Location: eventos.php');
        }



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
    <a href="eventos.php">Voltar</a>
    <div class="box" id="form-evento">
        <form action="save_edit.php" method="POST">
            <fieldset>
                <legend><b>Formulário Evento</b></legend>
                <br>

                <div class="inputBox">
                    <input type="text" name="nomeEvento" id="nomeEvento" class="inputUser" value="<?php echo $nomeEvento ?>" required>
                    <label for="nomeEvento">Nome Evento</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="nomeEmpresa" id="nomeEmpresa" class="inputUser" value="<?php echo $nomeEmpresa ?>" required>
                    <label for="nomeEmpresa">Nome empresa</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="cnpjEmpresa" id="cnpjEmpresa" class="inputUser" value="<?php echo $cnpjEmpresa ?>"  required>
                    <label for="cnpjEmpresa">CNPJ</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="enderecoEvento" id="enderecoEvento" class="inputUser" value="<?php echo $enderecoEvento ?>"   required>
                    <label for="enderecoEvento">Endereço evento</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="siteEvento" id="siteEvento" class="inputUser" value="<?php echo $siteEvento ?>"   required>
                    <label for="siteEvento">Site evento</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="date" name="dataInicial" id="dataInicial" class="inputUser" value="<?php echo $dataInicial ?>"  value="<?php echo $dataInicial ?>   required>
                    <label for="dataInicial">data inicial</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="date" name="dataFinal" id="dataFinal" class="inputUser" value="<?php echo $dataFinal ?>"   required>
                    <label for="dataFinal">data final</label>
                </div>
                <br>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" name="update" id="update">
            </fieldset>
        </form>
    </div>

</body>





</html>