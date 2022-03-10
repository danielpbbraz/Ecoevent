<!DOCTYPE html>
<html lang="pt">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="stylesheet" type="text/css" href="estilo_login.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body class="bodyForm">
     

<?php

include_once('config.php');


$sql = "SELECT * FROM perguntas";

$result = $conexao->query($sql);
$user_data;


 $type = 'text';

class QuestionHelper {

    public function getQuestion($type,$perguntaIni, $alter_1,$alter_2,$alter_3,$alter_4) {
      /* 
      
      TIPOS DE PERGUNTAS

      1  = Multiplaescolha (SIMPLES)
      2  = Dissertativa
      3  = Multiplaescolha (CONDICIONAL)
      4  = Dissertativa (INT)
      5  = Dissetativa (Boolean)
      
      */
      switch ($type) {
            case '1':
                return $this->Type1($perguntaIni,$alter_1,$alter_2,$alter_3,$alter_4);
                break;
            case '2':
                return $this->Type2($perguntaIni,$alter_1,$alter_2,$alter_3,$alter_4);
                break;
           //  case 'date':
           //      return $this->getQuestionDate($options);
           //      break;
            case 'select':
                // ...
                break;
        }
    }

    private function Type1($perguntaIni,$alter_1,$alter_2,$alter_3,$alter_4) {

           $html = '<div class="boxForm" id="formSave">';
           $html .= '<h1> '.$perguntaIni.' </h1>';
           $html .= '<br>';
           $html .= '<input type = "checkbox" id = "alter_1" name = "alter_1" value = "'.$alter_1.'">';
           $html .= '<label class="labelForm" for = "alter_1"> '.$alter_1.' </label>';
           $html .= '<br>';
           $html .= '<input type = "checkbox" id = "alter_1" name = "alter_1" value = "'.$alter_2.'">';
           $html .= '<label class="labelForm" for = "alter_1"> '.$alter_2.' </label>';
           $html .= '<br>';
           $html .= '<input type = "checkbox" id = "alter_1" name = "alter_1" value = "'.$alter_3.'">';
           $html .= '<label class="labelForm" for = "alter_1"> '.$alter_3.' </label>';
           $html .= '<br>';
           $html .= '<input type = "checkbox" id = "alter_1" name = "alter_1" value = "'.$alter_4.'">';
           $html .= '<label class="labelForm" for = "alter_1"> '.$alter_4.' </label>';
           $html .= '<br>';
           $html .= '</div>';
           return $html;
    }
    private function Type2($perguntaIni,$alter_1,$alter_2,$alter_3,$alter_4) {

      $html = '<div class="boxForm" id="formSave">';
      $html .= '<h1> '.$perguntaIni.' </h1>';
      $html .= '<br>';
      $html .= '<input type = "text" id = "dissert" name = "dissert">';
      $html .= '<br>';
      $html .= '</div>';
      return $html;
}
}

$questionHelper = new QuestionHelper();


?>

<!-- <h1>Formulário</h1> -->

<form action="#">
<?php 
      
      while($user_data = mysqli_fetch_assoc($result)){ 
           $tipo = $user_data['tipoPergunta'];
           
      echo $questionHelper->getQuestion($tipo,$user_data['perguntaIni'],$user_data['alter_1'],$user_data['alter_2'],$user_data['alter_3'],$user_data['alter_4']);
      // break;
 }
     ?>
<input class="submitForm" type="submit" value="Enviar">

</form>

</body>
</html>

