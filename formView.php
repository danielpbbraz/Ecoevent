<!DOCTYPE html>
<html lang="pt">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="stylesheet" type="text/css" href="estilo_login.css">
     <link rel="stylesheet" type="js" href="animation.js">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

     <title>Document</title>
</head>
<body class="bodyForm">

<script>

function ativaRadiofull(valor) {
 
    // alert(alternativa);
    document.getElementById('dissert-1').style.display = 'block';
    // document.getElementById('dissert-2').style.font.size = '15px';
 
}

</script>

<?php

include_once('config.php');

$idUser = $_GET['id'];

function getAlters ($data) {
    $count = 1;
    $limit = 150;
    $alters = [];

    do {
        if (!empty($data['alter_'.$count])) {
            $alters[$count] = $data['alter_' . $count];
        }
        $count++;
    } while ($count < $limit && !empty($data['alter_'.$count]));

    return $alters;

    }
// var_dump(getAlters($user_data));    



class QuestionHelper {
//public function getQuestion($type,$perguntaIni, $alter_1,$alter_2,$alter_3,$alter_4,$alter_5,$alter_6,$alter_7,$alter_8,$alter_9,$numAlternativas,$alternativaText,$alternativaCond)

//($tipo, $user_data['perguntaIni'], $alters, $user_data['numAlternativas'], $userData['alternativaText'])
    public function getQuestion($id,$type,$perguntaIni,$alters,$numAlternativas,$alternativaText,$alternativaCond,$codQuest) {
      /* 
      
      TIPOS DE PERGUNTAS

      1  = Multiplaescolha (SIMPLES)
      2  = Dissertativa
      3  = Lista suspensa com texto ao escolher
      4  = Dissertativa (INT)
      5  = Dissetativa (Boolean)
      
      */
      switch ($type) {
            case '1':
                return $this->Type1($id,$perguntaIni,$alters,$numAlternativas,$alternativaText,$codQuest);
                break;
            case '2':
                return $this->Type2($perguntaIni,$alters,$codQuest);
                break;
            case '3':
                return $this->Type3($perguntaIni,$alters,$numAlternativas,$alternativaCond,$codQuest,$alternativaText);
                break;
             case '4':
                 return $this->Type4($perguntaIni,$alters,$numAlternativas,$alternativaCond,$codQuest,$alternativaText);
                 break;
           //  case 'date':
           //      return $this->getQuestionDate($options);
           //      break;
            case 'select':
                // ...
                break;
        }
    }

    private function Type1($id,$perguntaIni,$alters,$numAlternativas,$alternativaText,$codQuest) {

           $html = '<div class="boxForm" id="formSave">';
           $html .= '<h1> '.$codQuest.' - '.$perguntaIni.' </h1>';
           $html .= '<br>';
           $numAlternativas = $numAlternativas + 1;
           for($i =1    ; $i < $numAlternativas; $i++){

            $html .= '<input type = "radio" id = "alter_1" name = "'.$codQuest.'" value = "'.$alters[$i].'">';
            $html .= '<label class="labelForm" for = "alter_1"> '.$alters[$i].' </label>';
            $html .= '<br>';
          }
           

          if(empty ($alternativaText)){
                echo $alternativaText;

            }else{
                $questin = $alters[$alternativaText];
                $html .= '<label class="labelForm" for = "alter_1"> '.$questin.' </label>';
                $html .= '<input type = "text" id = "dissert" name = "dissert">';
                
            }
           $html .= '<br>';
           $html .= '</div>';
           return $html;
    }


    private function Type2($perguntaIni,$alters,$codQuest) {

      $html = '<div class="boxForm" id="formSave">';
      $html .= '<h1> '.$codQuest.' - '.$perguntaIni.' </h1>';
      $html .= '<br>';
      $html .= '<input type = "text" id = "dissert" name = "dissert">';
      $html .= '<br>';
      $html .= '</div>';
      return $html;
}

    
private function Type3($perguntaIni,$alters,$numAlternativas,$alternativaCond,$codQuest,$alternativaText) {

    //qualquer alternativa ira exibir no final uma aba de text
        // print_r($alters[$alternativaText]);
        $html = '<div class="boxForm" id="formSave">';
        $html .= '<h1> '.$codQuest.' - '.$perguntaIni.' </h1>';
        $html .= '<br>';
        $numAlternativas = $numAlternativas + 1;
        $html .='    <select onchange="ativaRadiofull(this.value)" id="list" >   ';     

        for($i =1    ; $i < $numAlternativas; $i++){
        $html .= '<option id="list"  value="'.$i.'">'.$alters[$i].'</option>';    
         $html .= '<br>';
       }
       
       
       $html .= '<input type = "text"  id ="dissert-1" placeholder="'.$alters[$alternativaText].'" name = "dissert">';
       $html .= '<br>';
    
    
       //consumo total por fonte de energia utilizada por kWh 
       $html .='    </select>   '; 
        $html .= '<br>';
        $html .= '</div>';
        


    return $html;
}


private function Type4($perguntaIni,$alters,$numAlternativas,$alternativaCond,$codQuest,$alternativaText) {

    $html = '<div class="boxForm" id="formSave">';
    $html .= '<h1> '.$codQuest.' - '.$perguntaIni.' </h1>';
    $html .= '<br>';
    $numAlternativas = $numAlternativas + 1;

    for($i =1    ; $i < $numAlternativas; $i++){

        $html .= '<input onchange="verificRadio(this.value)" type = "radio" id = "alter_1" name = "'.$codQuest.'" value="'.$i.'">';
        $html .= '<label class="labelForm" for = "alter_1"> '.$alters[$i].' </label>';
        $html .= '<br>';
      }

   if(empty ($alternativaText)){
    echo $alternativaText;

}else{
    $questin = $alters[$alternativaText];
    $html .= '<label class="labelForm" for = "alter_1"> '.$questin.' </label>';
    $html .= '<input type = "text" id = "dissert" name = "dissert">';
    
}

   $html .='    </select>   '; 
    $html .= '<br>';
    $html .= '</div>';
    return $html;
}


}

$questionHelper = new QuestionHelper();


?>

<!-- <h1>Formulário</h1> -->

<form id=formVisual action="#">
<?php 

    $sql1 = "SELECT * FROM formsave WHERE userForm = $idUser";
    $result1 = $conexao->query($sql1);
    $r = 1;
    $m = 0;
    while($user_data1 = mysqli_fetch_assoc($result1)){
        
            
        while(!empty($user_data1['questao_'.$r])){
            
            // print_r($r . 'De questões');
            ${'quest_'.$r} = $user_data1['questao_'.$r];     
            
            $r++;
       }
            $questNumb = $r ;
        //    print_r('Numero de questões por formulario: '.$r);
            
            // $quest_1=$user_data1['questao_1'];
            

            // print_r("<br>"); print_r($quest_2); print_r("<br>");print_r($quest_3);print_r("<br>");print_r($quest_4);print_r("<br>");print_r($quest_5);print_r("<br>");print_r($quest_6);print_r("<br>");print_r($quest_7);print_r("<br>");
            $r++;
    }

    

    for($i =1; $i < $questNumb; $i++){
    
    
    $teste = ${'quest_'.$i};
    // $teste = $quest_1;
    // print_r($teste);
    $sql = "SELECT * FROM perguntas WHERE id = $teste";
    $result = $conexao->query($sql);
   
    $user_data;    

    while($user_data = mysqli_fetch_assoc($result)){

        $tipo = $user_data['tipoPergunta'];
        // print_r($user_data['alter_1']);
        // print_r('Id da questão vindo do formsave: ' . $teste);
        // print_r('<br>');
        // print_r('Id da questão vindo do perguntas: '. $user_data['id']);
        $data = $user_data;
        $alters = getAlters($data);

        echo $questionHelper->getQuestion($data['id'],$tipo, $data['perguntaIni'], $alters, $data['numAlternativas'], $data['alternativaText'], $data['condAlter'],$data['codQuest']);
        // echo $questionHelper->getQuestion($tipo,$user_data['perguntaIni'],$user_data['alter_1'],$user_data['alter_2'],$user_data['alter_3'],$user_data['alter_4'],$user_data['alter_5'],$user_data['alter_6'],$user_data['alter_7'],$user_data['alter_8'],$user_data['alter_9'],$user_data['numAlternativas'],$user_data['alternativaText'],$user_data['alternativaCond']);

    }

}
//     while($user_data = mysqli_fetch_assoc($result)){ 
//         print_r('Não entrou no if: ');
//         print_r($user_data['id']); //1
//         print_r("<br>");

//         if($user_data['id'] == $quest_1){
//             $i++;
// print_r('O id da pergunta é: ');
// print_r($quest_1);
// print_r("<br>");

//         }
//     }
        
//     echo $questionHelper->getQuestion($tipo,$user_data['perguntaIni'],$user_data['alter_1'],$user_data['alter_2'],$user_data['alter_3'],$user_data['alter_4']);
      // break;
 
     ?>
<input class="submitForm" type="submit"  value="Enviar">

</form>

</body>
</html>

