<?php
session_start();

      // print_r($_REQUEST);
    
    //Se (ACESSA)
      if(isset($_POST['submit']) && !empty($_POST['nomeUser']) && !empty($_POST['senhaUser']))
    {
      include_once('config.php');
      $nomeUser = $_POST['nomeUser'];
      $senhaUser = $_POST['senhaUser'];

      // print_r('Nome: ' . $nomeUser);
      // print_r('<br>');
      // print_r('Senha: ' . $senhaUser);

      $sql = "SELECT * FROM usuario WHERE nomeUser = '$nomeUser' and senhaUser = '$senhaUser'";

      $result = $conexao->query($sql);
      $user_data = mysqli_fetch_assoc($result);
      $idUser = $user_data['id'];
      // print_r($sql);
      // print_r('<br>');
      // print_r($result);

      if(mysqli_num_rows($result) < 1)
      {
        unset($_SESSION['nomeUser']);
        unset($_SESSION['senhaUser']);
        header("location: Index.php?id=". $user_data['id']);
      }
      else{

        if($user_data['admUser'] == 1){

          $_SESSION['nomeUser'] = $nomeUser;
          $_SESSION['senhaUser'] = $senhaUser;
          header("location: menuHorizontal.php?id=". $user_data['id']);
        
        }else{
        
          $_SESSION['nomeUser'] = $nomeUser;
          $_SESSION['senhaUser'] = $senhaUser;
          header("Location: pageUser.php?id=". $user_data['id']);

        }

     }
      
      

    }
    else
    {
    //Se (NÃO ACESSA)
      header('Location: index.php'); 

    }
?>