<?php
include_once('config.php');
include('selectPerguntas.php');
   
   //Captura o ID da url e concatena com "questao_"
    $idPergunta = $_GET['id'];
    $idUser = $_GET['idUser'];
    $questao = 'questao_'.$idUser;

    $usuarioSelecti = "SELECT id FROM usuario WHERE id = $idUser";
    $usuarioSelect = $conexao->query($usuarioSelecti);
    $userTable = mysqli_fetch_assoc($usuarioSelect);
    $userTableView = $userTable['id'];
    // print_r('Isto é uma variavel: '.$userTableView);

    $condicao = "SELECT * FROM formsave WHERE userForm = $idUser";
    $result = $conexao->query($condicao);
    
    print_r('<br>');
    print_r('O id do usuario é: '.$idUser);
    print_r('<br>');

    if($result->num_rows > 0){
        print_r('Com cadastro');
        print_r('<br>');

    }else{  
        print_r('Sem cadastro');
        print_r('<br>');
        $result = mysqli_query($conexao, "INSERT INTO formsave(userForm)  VALUES ('$userTableView')"); 
        // print_r('Usuario sem pergunta cadastrada');  
   
    }

    
    $verificacao = "SELECT * FROM formsave WHERE userForm = $idUser";
    $verificarNull = $conexao->query($verificacao);
    $perguntaNull = mysqli_fetch_assoc($verificarNull);
    // $VerifyNull = $perguntaNull['questao_'.$i];
    // print_r($VerifyNull);
    // print_r('A questão 1 é o id: ' . $VerifyNull);
        
    $i = 0;

   //VERIFICAR ESPAÇO NA TABELA VAZIO 
    while(!empty ($perguntaNull['questao_'.++$i])){
        print_r('<br>');
        print_r('Celula cheia'); 
        print_r('<br>');       
    }

    print_r('A celula vazia é: ' . $i);
    $e = 'questao_'.$i;
            
    
        
            $sqlUpdate = "UPDATE formsave SET  $e=$idPergunta WHERE userForm=$idUser";
            $result = $conexao->query($sqlUpdate);
            print_r('Funcionou');
   

   
   

                
            
 





    // $sqlUpdate = "UPDATE formsave SET questao_1='teste' WHERE id_form='1'";

    // $result = $conexao->query($sqlUpdate);



    // print_r('Usuario sem pergunta cadastrada');     


    
?>