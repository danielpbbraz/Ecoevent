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
    function verificCheck(valor) {

        // alert(valor);

        let valorSeparado2 = valor.split(" ");

        let i = valorSeparado2[0];
        let o = valorSeparado2[1];
        let text1 = valorSeparado2[2];
        let number = valorSeparado2[3];
        let lista = valorSeparado2[4];
        let cond = valorSeparado2[5];

        let text = valorSeparado2[1] + 1;
        let numb = valorSeparado2[1] + 2;
        let list = valorSeparado2[1] + 3;

        console.log(text1);
        console.log(number);

        if (i == cond) {
            document.getElementById(text).style.display = 'block';

        }
        if (text1 == 1) {
            document.getElementById(text).style.display = 'block';
        }
        if (number == 1) {
            document.getElementById(numb).style.display = 'block';
        }
        if (lista != null) {
            document.getElementById(list).style.display = 'block';
        }



    }
    function verificRadio(valor) {

        // alert(valor);
        //value = "'.$i.' '.$alternativaCond.' '.$codQuest.' '.$alternativaText.' '.$alternativaNumber.' '.$alternativaList1.' '.$alternativaCond.
        var valorSeparado = valor.split(" ");

        let x = valorSeparado[0]; //$i
        let y = valorSeparado[1]; //$alternativaCond
        let z = valorSeparado[2]; //$codQuest
        let a = valorSeparado[3]; //$alternativaText
        let b = valorSeparado[4]; //$alternativaNumber
        let c = valorSeparado[5]; //$alternativaList1
        let d = valorSeparado[6]; //$alternativaCond


        // let text = valorSeparado[2] + 2;
        // let numb = valorSeparado[1] + 1;
        // let list = valorSeparado[1] + 3;


        // alert(x);
        // alert(y);

        if (y == 99) {
            document.getElementById(z).style.display = 'block';
        } else if (x == y) {
            document.getElementById(z).style.display = 'block';
            // alert("aparece");
        } else {
            document.getElementById(z).style.display = 'none';
            // alert("Ñ aparece");  
        }
    }
    </script>

    <!-- action="postRespostas.php" -->



    <?php
    //   Acre, Alagoas, Amapá, Amazonas, Bahia, Ceará, Distrito Federal, Espírito Santos, Goiás, Maranhão, Mato Grosso, Mato Grosso do Sul, Minas Gerais, Pará, Paraíba, Paraná, Pernambuco, Piauí, Rio de Janeiro, Rio Grande do Norte, Rio Grande do Sul, Rondônia, Roraima, Santa Catarina, São Paulo, Sergipe, Tocantins.
    







include_once('config.php');


$REG = [
    '1' => 'Acre',
    '2' => 'Alagoas',
    '3' => 'Amapá',
    '4' =>'Amazonas',
    '5' =>'Bahia',
    '6' =>'Ceará',
    '7' =>'Distrito Federal',
    '8' => 'Espírito Santos',
    '9' =>'Goiás',
    '10' =>'Maranhão',
    '11' =>'Mato Grosso',
    '12' =>'Mato Grosso do Sul',
    '13' =>'Minas Gerais',
    '14' =>'Pará',
    '15' =>'Paraíba',
    '16' =>'Paraná',
    '17' =>'Pernambuco',
    '18' =>'Piauí',
    '19' =>'Rio de Janeiro',
    '20' =>'Rio Grande do Norte',
    '21' =>'Rio Grande do Sul',
    '22' =>'Rondônia',
    '23' =>'Roraima',
    '24' =>'Santa Catarina',
    '25' =>'São Paulo',
    '26' =>'Sergipe',
    '27' => 'Tocantins'
];

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

    function getAltersList ($data) {
        $count = 1;
        $limit = 12;
        $altersList = [];
    
        do {
            if (!empty($data['alterList_'.$count])) {
                $altersList[$count] = $data['alterList_' . $count];
            }
            $count++;
        } while ($count < $limit && !empty($data['alterList_'.$count]));
    
        return $altersList;
    
        }
        function getAltersList2 ($data) {
            $count = 1;
            $limit = 10;
            $altersList2 = [];
        
            do {
                if (!empty($data['alterList2_'.$count])) {
                    $altersList2[$count] = $data['alterList2_' . $count];
                }
                $count++;
            } while ($count < $limit && !empty($data['alterList2_'.$count]));
        
            return $altersList2;
        
            }
// var_dump(getAlters($user_data));    



class QuestionHelper {
//public function getQuestion($type,$perguntaIni, $alter_1,$alter_2,$alter_3,$alter_4,$alter_5,$alter_6,$alter_7,$alter_8,$alter_9,$numAlternativas,$alternativaText,$alternativaCond)

//($tipo, $user_data['perguntaIni'], $alters, $user_data['numAlternativas'], $userData['alternativaText'])
    public function getQuestion($id,$type,$perguntaIni,$alters,$numAlternativas,$alternativaText,$alternativaCond,$codQuest,$alternativaNumber,$altersList,$altersList2,$alternativaList1,$alternativaList2,$alternativaList3,$alternativaList4,$alternativaList5,$loopList,$alterListName1,$alterListName2,$count,$numberName1,$alterListName3,$multiplaName,$textName,$alternativaDate,$textName1,$textName2,$textName3,$textName4,$textName5,$questNumb) {
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
                return $this->Type1($id,$perguntaIni,$alters,$numAlternativas,$alternativaText,$codQuest,$alternativaNumber,$alternativaCond,$altersList,$alternativaList1,$count,$multiplaName,$questNumb);
                break;
             case '2':
                return $this->Type2($perguntaIni,$alters,$codQuest,$count,$alternativaText,$alternativaNumber,$loopList,$alterListName1,$alterListName2,$alterListName3,$alternativaDate,$textName1,$textName2,$textName3,$textName4,$textName5,$questNumb);
                break;
            case '3':
                return $this->Type3($perguntaIni,$alters,$numAlternativas,$alternativaCond,$codQuest,$alternativaText,$alternativaNumber,$altersList,$alternativaList1,$count,$questNumb);
                break;
             case '4':
                 return $this->Type4($perguntaIni,$alters,$numAlternativas,$alternativaCond,$codQuest,$alternativaText,$alternativaNumber,$altersList,$altersList2,$alternativaList1,$alternativaList2,$alternativaList3,$alternativaList4,$alternativaList5,$alterListName1,$alterListName2,$loopList,$count,$numberName1,$alterListName3,$textName,$questNumb);
                 break;
           //  case 'date':
           //      return $this->getQuestionDate($options);
           //      break;
            case 'select':
                // ... 
                break;
        }
    }
    //multipla escolha com condicional ao CAMPO DE TEXTO e CAMPO NUMÉRICO
    public function Type1($id,$perguntaIni,$alters,$numAlternativas,$alternativaText,$codQuest,$alternativaNumber,$alternativaCond,$altersList,$alternativaList1,$count,$multiplaName,$questNumb) {

        
        
        print_r($count);
        $idUser = $_GET['id'];
        $html ='<input type="hidden" name="pergunta['.$count.'][questNumb]" value="'.$questNumb.'">';
                $html .= '<div class="boxForm" id="formSave">';
                $html .= '<h1> '.$codQuest.' - '.$perguntaIni.' </h1>';
                $html .= '<br>';
                
                //Conta quantas alterenativas tem a questão
                $numAlternativas = $numAlternativas + 1;
                $html .= '<h5> '.$multiplaName.' </h5>';
           //Imprime repitadamento as alternativas baseado no número de questões 
           for($i =1; $i < $numAlternativas; $i++){
                $html .= '<input onchange="verificRadio(this.id)" type = "radio" id = "'.$i.' '.$alternativaCond.' '.$codQuest.' '.$alternativaText.' '.$alternativaNumber.' '.$alternativaList1.' '.$alternativaCond.'" name = "Respost1['.$count.'][valor]" value = "'.$alters[$i].'">';
                $html .='<input type="hidden" class="" name="pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
                $html .='<input type="hidden" name="pergunta['.$count.'][id_user]" value="'.$idUser.'">';
                
                $html .= '<label class="labelForm" for = "alter_1"> '.$alters[$i].' </label>';
                $html .= '<br>';
         
        }   
            if(empty ($alternativaText)){
                // print_r('Sem alternativa de texto a ser exibida');
                // echo $alternativaText;

                    
                
                if (!empty ($alternativaNumber)){
                    $numb = 1;
                    $questin = $alters[$alternativaNumber];
                    $html .= '<div id="'.$codQuest.'" style="display: none">';
                    $html .= '<label class="labelForm" for = "alter_1"> '.$questin.' </label>';
                    $html .= '<input type = "number" id = "test1" name = "Respost2['.$count.'][valor]" min="1" max="99">'; 
                    $html .='<input type="hidden" name="pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
                $html .='<input type="hidden" name="pergunta['.$count.'][id_user]" value="'.$idUser.'">';
                    $html .= '</div>';
                    $html .= '<br>';
                    // print_r('Sem alternativa numerica a ser exibida');
                }   
                if(!empty ($alternativaList1)){
                    // $questin = $alters[$alternativaText];]
                    $list = 3;
                    $html .= '<div id="'.$codQuest.'" style="display: none">';
                    $html .='<input type="hidden" class="" name="Respost2['.$count.'][codQuest]" value="'.$codQuest.'">';
                    $html .='<input type="hidden" name="pergunta['.$count.'][id_user]" value="'.$idUser.'">';
                    $html .= '<select name = "pergunta['.$count.'][valor]" value = "'.$i.'">';

                    $k = 1;
                    $alternativaLista = $alternativaList1 + 1;
                    while($alternativaLista > $k){
                        $html .= '<option> '.$altersList[$k].' </option>';
                    $k++;
                    }
                    $html .= '</select>';
                    $html .= '</div>';
                }

            }else{
                // $questin = $alters[$alternativaText];
                $text = 2;
                $html .= '<div id="'.$codQuest.'" style="display: none">';
                $html .= '<label class="labelForm" for = "alter_1"> </label>';
                $html .= '<input type = "text" id = "test1" name = "Respost2['.$count.'][valor]" max="5" >'; 
                $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
                $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
                $html .= '</div>';
                $html .= '<br>';
            }               
            
                

                $html .= '<br>';
                $html .= '</div>';
                return $html;
    
    }
    //dissertativo TEXTO e NUMÉRICO
    public function Type2($perguntaIni,$alters,$codQuest,$count,$alternativaText,$alternativaNumber,$loopList,$alterListName1,$alterListName2,$alterListName3,$alternativaDate,$textName1,$textName2,$textName3,$textName4,$textName5,$questNumb) {

    

        $idUser = $_GET['id'];
        
        print_r($count);
        $html ='<input type="hidden" name="pergunta['.$count.'][questNumb]" value="'.$questNumb.'">';
      $html .= '<div class="boxForm" id="formSave">';
      $html .= '<h1> '.$codQuest.' - '.$perguntaIni.' </h1>';
      $html .= '<br>';
      //texto
      

      if($alternativaNumber == 1){
        //$html .= '<h5> '.$alterListName1.' </h5>';
        $html .= '<input type = "number" id = "dissert" name = "Respost1['.$count.'][valor]">';
        $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
        $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
        $html .= '<br>';
        }
      if($alternativaText == 1){
        $html .= '<h5> '.$alterListName1.' </h5>';
        $html .= '<input type = "text" id = "dissert" name = "Respost1['.$count.'][valor]">';
        $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
        $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
        $html .= '<br>';
        $loop = $loopList + 1;
        if($loopList == 4){
                
            $t = 3;
            for($rr = 2; $loop > $rr; $rr++){
                $html .= '<h5> '.${'textName'.$rr}.' </h5>';
                $html .= '<input type = "text" id = "dissert" name = "Respost'.$t.'['.$count.'][valor]">';
                $t++;
                $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
                $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
                $html .= '<br>';

            }

        }
      //número  
    }
        if($alternativaDate == 1){
            $html .= '<input type = "date" id = "dissert" name = "Respost1['.$count.'][valor]">';
            $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
            $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
            $html .= '<br>';
            }

      $html .= '</div>';
      return $html;
}

    
public function Type3($perguntaIni,$alters,$numAlternativas,$alternativaCond,$codQuest,$alternativaText,$alternativaNumber,$altersList,$alternativaList1,$count,$questNumb) {
    
    $idUser = $_GET['id'];
    print_r($count);
    //qualquer alternativa ira exibir no final uma aba de text
        // print_r($alters[$alternativaText]);
        $html  = '<div class="boxForm" id="formSave">';
        $html .= '<h1> '.$codQuest.' - '.$perguntaIni.' </h1>';
        $html .= '<br>';
        $numAlternativas = $numAlternativas + 1; 
        $html .='<input type="hidden" name="pergunta['.$count.'][questNumb]" value="'.$questNumb.'">';
        for($i =1; $i < $numAlternativas; $i++){
                
            

                $html .= '<input onchange="verificCheck(this.id)" type = "checkbox" id = "'.$i.' '.$codQuest.$i.' '.$alternativaText.' '.$alternativaNumber.' '.$alternativaList1.' '.$alternativaCond.'"  name = "RespostList'.$i.'['.$count.'][valor]" value = "'.$alters[$i].'">';
                $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
                $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
                $html .= '<label class="labelForm" for = "alter_1"> '.$alters[$i].' </label>';
                $html .= '<br>';
                if(!empty ($alternativaText)){
 
                    // $questin = $alters[$alternativaText];
                    $text = 1;
                    $html .= '<div id="'.$codQuest.$i.$text.'" style="display: none">';
                    $html .= '<label class="labelForm" for = "alter_1"> </label>';
                    $html .= '<input type = "text" id = "test1" name = "Respost2['.$count.'][valor]" min="1" max="99">'; 
                    $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
                    $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
                    $html .= '</div>';


                }
                if(!empty ($alternativaNumber)){
                        // $questin = $alters[$alternativaText];]
                        $numb = 2;
                        $html .= '<div id="'.$codQuest.$i.$numb.'" style="display: none">';
                        $html .= '<label class="labelForm" for = "alter_1"></label>';
                        $html .= '<input type = "number" id = "test1" name = "Respost2['.$count.'][valor]" min="1" max="99">'; 
                        $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
                        $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
                        $html .= '</div>';
  
                    }
                    if(!empty ($alternativaList1)){
                        // $questin = $alters[$alternativaText];]
                        $list = 3;
                        $html .= '<div id="'.$codQuest.$i.$list.'" style="display: none">';
                        $html .='<input type="hidden"name="Respost1['.$count.'][valor]" value="'.$idUser.'">';
                        $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
                        $html .= '<select name = "pergunta['.$count.'][valor]">';

                        $k = 1;
                        $alternativaLista = $alternativaList1 + 1;
                        while($alternativaLista > $k){
                            $html .= '<option> '.$altersList[$k].' </option>';
                        $k++;
                    }
                    $html .= '</select>';
                    $html .= '</div>';
                    }
                }
       //consumo total por fonte de energia utilizada por kWh  
        $html .= '<br>';
        $html .= '</div>';
        


    return $html;
}


public function Type4($perguntaIni,$alters,$numAlternativas,$alternativaCond,$codQuest,$alternativaText,$alternativaNumber,$altersList,$altersList2,$alternativaList1,$alternativaList2,$alternativaList3,$alternativaList4,$alternativaList5,$alterListName1,$alterListName2,$loopList,$count,$numberName1,$alterListName3,$textName1
) {
    $idUser = $_GET['id'];
    $REG = [
        '1' => 'Acre',
        '2' => 'Alagoas',
        '3' => 'Amapá',
        '4' =>'Amazonas',
        '5' =>'Bahia',
        '6' =>'Ceará',
        '7' =>'Distrito Federal',
        '8' => 'Espírito Santos',
        '9' =>'Goiás',
        '10' =>'Maranhão',
        '11' =>'Mato Grosso',
        '12' =>'Mato Grosso do Sul',
        '13' =>'Minas Gerais',
        '14' =>'Pará',
        '15' =>'Paraíba',
        '16' =>'Paraná',
        '17' =>'Pernambuco',
        '18' =>'Piauí',
        '19' =>'Rio de Janeiro',
        '20' =>'Rio Grande do Norte',
        '21' =>'Rio Grande do Sul',
        '22' =>'Rondônia',
        '23' =>'Roraima',
        '24' =>'Santa Catarina',
        '25' =>'São Paulo',
        '26' =>'Sergipe',
        '27' => 'Tocantins'
    ];
    $EMPREG = [
        //Diretoria, gerência, coordenação, supervisão, administrativo, operacional, trainees, aprendizes, estagiários. 
        '1' => 'Diretoria',
        '2' => 'Gerência',
        '3' => 'Coordenação',
        '4' => 'Supervisão',
        '5' => 'Administrativo',
        '6' => 'Operacional',
        '7' => 'Trainee',
        '8' => 'Aprendizes',
        '9' => 'Estagiários'
    ];
    $DEST = [
        //Diretoria, gerência, coordenação, supervisão, administrativo, operacional, trainees, aprendizes, estagiários. 
        '1' => 'Coleta urbana',
        '2' => 'Corpos hídricos (ex. rios)',
        '3' => 'Lagoas',
        '4' => 'Coleta terceirizada',
        '5' => 'Outros'
    ];
    $DEST1 = [
        //Diretoria, gerência, coordenação, supervisão, administrativo, operacional, trainees, aprendizes, estagiários. 
        '1' => 'Aterro sanitário',
        '2' => 'Coleta urbana',
        '3' => 'Compostagem',
        '4' => 'Cooperativa',
        '5' => 'Empresa especializada',
        '6' => 'Reciclagem',

    ];
    

    print_r($count);
    $html = '<div class="boxForm" id="formSave">';
    $html .= '<h1> '.$codQuest.' - '.$perguntaIni.' </h1>';
    $html .= '<br>';
    $numAlternativas = $numAlternativas + 1;

    if($loopList == 2){
        for($ii = 0; $loopList>$ii; $ii++){
        $ss = $ii + 1;
     $html .= '<h5> '.${'alterListName'.$ss}.' </h5>';

    if(!empty($alternativaText)){ 
        $text = 1;
        
        $html .= '<div id="'.$codQuest.$text.'">';
        $html .= '<label class="labelForm" for = "alter_1"></label>';
        $html .= '<input type = "text" id = "test1" name = "pergunta['.$count.'][valor]" min="1" max="99">'; 
        $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
        $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
        $html .= '</div>';   
    }
    if(!empty($alternativaNumber)){
        //print_r("alertando");
        $numb = 2;
        $html .= '<div id="'.$codQuest.$numb.'" >';
        $html .= '<label class="labelForm" for = "alter_1"></label>';
        $html .= '<input type = "number" id = "test1" name = "pergunta['.$count.'][valor]" min="1" max="99">'; 
        $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
        $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
        $html .= '</div>';
    }
    if(!empty($alternativaList1)){
    
        $list = 3;
        $html .= '<div id="'.$codQuest.$list.'" >';
        $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
        $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
        $html .= '<select name = "pergunta['.$count.'][valor]">';
      
        $k = 1;
        $alternativaLista = $alternativaList1 + 1;
        while($alternativaLista > $k){
            $html .= '<option> '.$altersList[$k].' </option>';
        $k++;
    }
    $html .= '</select>';
    $html .= '</div>';
    }
    if(!empty($alternativaList2)){
        $list2 = 3;
        $html .= '<div id="'.$codQuest.$list2.'">';
        $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
        $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
        $html .= '<select name = "pergunta['.$count.'][valor]">';

        $c = 1;
        $alternativaLista2 = $alternativaList2 + 1;
        while($alternativaList2 > $c){
            $html .= '<option> '.$altersList2[$c].' </option>';
        $c++;
    }
    $html .= '</select>';
    $html .= '</div>';
    }
    if(!empty($alternativaList3)){
        $list3 = 3;
        
        if($alternativaList3 == "REG"){
            //print_r("é o REG");
            $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
            $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
            $html .= '<select name = "pergunta['.$count.'][valor]">';

            for($i = 1; $i < 27 ; $i++){
                $html .= '<option> '.$REG[$i].' </option>';
            }
            $html .= '</select>';
            
        }if($alternativaList3 == "EMPREG"){
            //print_r("é o EMPREG");
            $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
            $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
            $html .= '<select name = "pergunta['.$count.'][valor]">';

            for($l = 1; $l < 9 ; $l++){
                $html .= '<option> '.$EMPREG[$l].' </option>';
            }
            $html .= '</select>';
        }
    $html .= '</div>';
    }
    if(!empty($alternativaList4)){
        $list4 = 4;
        
        if($alternativaList4 == "REG"){
            //print_r("é o REG");
            $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
            $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
            $html .= '<select name = "pergunta['.$count.'][valor]">';

            for($i = 1; $i < 27 ; $i++){
                $html .= '<option> '.$REG[$i].' </option>';
            }
            $html .= '</select>';
            
        }if($alternativaList4 == "EMPREG"){
            //print_r("é o EMPREG");
            $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
            $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
            $html .= '<select name = "pergunta['.$count.'][valor]">';

            for($l = 0; $l < 9 ; $l++){
                $html .= '<option> '.$REG[$l].' </option>';
            }
            $html .= '</select>';
        }
    $html .= '</div>';
    }
}}else{
    

    if(!empty($alternativaText)){ 
        $text = 1;
        $html .= '<h5> '.$textName1.' </h5>';
        $html .= '<div id="'.$codQuest.$text.'">';
        $html .= '<label class="labelForm" for = "alter_1"></label>';
        $html .= '<input type = "text" id = "test1" name = "pergunta['.$count.'][valor]" min="1" max="99">'; 
        $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
        $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
        $html .= '</div>';   
    }
    if(!empty($alternativaNumber)){
        //print_r("alertando");
        $numb = 2;
        $html .= '<h5> '.$numberName1.' </h5>';
        $html .= '<div id="'.$codQuest.$numb.'" >';
        $html .= '<label class="labelForm" for = "alter_1"></label>';
        $html .= '<input type = "number" id = "test1" name = "pergunta['.$count.'][valor]" min="1" max="99">'; 
        $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
        $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
        $html .= '</div>';
    }
    if(!empty($alternativaList1)){
    
        $list = 3;
        $html .= '<h5> '.$alterListName1.' </h5>';
        $html .= '<div id="'.$codQuest.$list.'" >';
        $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
        $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
        $html .= '<select name = "pergunta['.$count.'][valor]">';
 
        $k = 1;
        $alternativaLista = $alternativaList1 + 1;
        while($alternativaLista > $k){
            $html .= '<option> '.$altersList[$k].' </option>';
        $k++;
    }
    $html .= '</select>';
    $html .= '</div>';
    }
    if(!empty($alternativaList2)){
        $list2 = 3;
        $html .= '<h5> '.$alterListName2.' </h5>';
        $html .= '<div id="'.$codQuest.$list2.'">';
        $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
        $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
        $html .= '<select name = "pergunta['.$count.'][valor]">';

        $c = 1;
        $alternativaLista2 = $alternativaList2 + 1;
        while($alternativaList2 > $c){
            $html .= '<option> '.$altersList2[$c].' </option>';
        $c++;
    }
    $html .= '</select>';
    $html .= '</div>';
    }
    if(!empty($alternativaList3)){
        $list3 = 3;
        
        if($alternativaList3 == "REG"){
            //print_r("é o REG");
            $html .= '<h5> '.$alterListName2.' </h5>';
            $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
            $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
            $html .= '<select name = "pergunta['.$count.'][valor]">';

            for($i = 1; $i < 27 ; $i++){
                $html .= '<option> '.$REG[$i].' </option>';
            }
            $html .= '</select>';
            
        }if($alternativaList3 == "EMPREG"){
            //print_r("é o EMPREG");
            $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
            $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
            $html .= '<select name = "pergunta['.$count.'][valor]">';

            for($l = 1; $l < 9 ; $l++){
                $html .= '<option> '.$EMPREG[$l].' </option>';
            }
            $html .= '</select>';
        }if($alternativaList3 == "DEST"){
            //print_r("é o EMPREG");
            $html .= '<h5> '.$alterListName3.' </h5>';
            $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
            $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
            $html .= '<select name = "pergunta['.$count.'][valor]">';

            for($l = 1; $l < 5 ; $l++){
                $html .= '<option> '.$DEST[$l].' </option>';
            }
            $html .= '</select>';
        }
        if($alternativaList3 == "DEST1"){
            //print_r("é o EMPREG");
            $html .= '<h5> '.$alterListName3.' </h5>';
            $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
            $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
            $html .= '<select name = "pergunta['.$count.'][valor]">';

            for($l = 1; $l < 6 ; $l++){
                $html .= '<option> '.$DEST1[$l].' </option>';
            }
            $html .= '</select>';
        }
    $html .= '</div>';
    }
    if(!empty($alternativaList4)){
        $list4 = 4;
        
        if($alternativaList4 == "REG"){
            //print_r("é o REG");
            $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
            $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
            $html .= '<select name = "pergunta['.$count.'][valor]">';

            for($i = 1; $i < 27 ; $i++){
                $html .= '<option> '.$REG[$i].' </option>';
            }
            $html .= '</select>';
            
        }if($alternativaList4 == "EMPREG"){
            //print_r("é o EMPREG");
            $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
            $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
            $html .= '<select name = "pergunta['.$count.'][valor]">';

            for($l = 0; $l < 9 ; $l++){
                $html .= '<option> '.$REG[$l].' </option>';
            }
            $html .= '</select>';
        }
        if($alternativaList4 == "DEST1"){
            //print_r("é o EMPREG");
            $html .= '<h5> '.$alterListName3.' </h5>';
            $html .='<input type="hidden"name=" pergunta['.$count.'][id_user]" value="'.$idUser.'">';
            $html .='<input type="hidden" name=" pergunta['.$count.'][codQuest]" value="'.$codQuest.'">';
            $html .= '<select name = "pergunta['.$count.'][valor]">';

            for($l = 1; $l < 5 ; $l++){
                $html .= '<option> '.$DEST1[$l].' </option>';
            }
            $html .= '</select>';
        }
    $html .= '</div>';
    }
}

    $html .= '<br>';
    $html .= '</div>';
    return $html;
}


}

$questionHelper = new QuestionHelper();


?>
    <!-- <h1>Formulário</h1> -->
    <form action="postRespostas.php" id=formVisual method="POST">
   
   <?php 

    $procura = "SELECT * FROM results WHERE id_user = $idUser";
    $resultado = $conexao->query($procura);
    $r = 1;
    $m = 0;
    while($userdata = mysqli_fetch_assoc($resultado)){
        
            
        // while(!empty($userdata['id_quest'])){
            
            // print_r($r . 'De questões');
    $verificaQuest[$r] = $userdata['id_quest'];           


    // }
            // $questNumb = $r ;
            $r++;
    }

    print_r($verificaQuest);



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
            $r++;
    }


    $count = 0;
    for($i =1; $i < $questNumb; $i++){
    
    
    $teste = ${'quest_'.$i};
    // $teste = $quest_1;
    // print_r($teste);
    $sql = "SELECT * FROM perguntas WHERE id = $teste";
    $result = $conexao->query($sql);
   
    $user_data;    
    $s = 1;

    while($user_data = mysqli_fetch_assoc($result)){

        $tipo = $user_data['tipoPergunta'];
        // print_r($user_data['alter_1']);
        // print_r('Id da questão vindo do formsave: ' . $teste);
        // print_r('<br>');
        // print_r('Id da questão vindo do perguntas: '. $user_data['id']);
        $data = $user_data;
        $alters = getAlters($data);
        $altersList = getAltersList($data); 
        $altersList2 = getAltersList2($data); 
        $idQ = $data['codQuest'];

        
        if(in_array($data['codQuest'], $verificaQuest) == true){

            print_r("A pergunta de código ".$idQ." já foi respondida ");

        }else{

        // if($verific[$s] != null && 0 && "0"){


        
        echo $questionHelper->getQuestion($data['id'],$tipo, $data['perguntaIni'], $alters, $data['numAlternativas'], $data['alternativaText'], $data['condAlter'],$data['codQuest'],$data['alternativaNumber'],$altersList,$altersList2,$data['alternativaList1'],$data['alternativaList2'],$data['alternativaList3'],$data['alternativaList4'],$data['alternativaList5'],$data['loopList'],$data['alterListName1'],$data['alterListName2'],$count,$data['numberName1'],$data['alterListName3'],$data['multiplaName'],$data['textName1'],$data['alternativaDate'],$data['textName1'],$data['textName2'],$data['textName3'],$data['textName4'],$data['textName5'],$questNumb);
        // echo $questionHelper->getQuestion($tipo,$user_data['perguntaIni'],$user_data['alter_1'],$user_data['alter_2'],$user_data['alter_3'],$user_data['alter_4'],$user_data['alter_5'],$user_data['alter_6'],$user_data['alter_7'],$user_data['alter_8'],$user_data['alter_9'],$user_data['numAlternativas'],$user_data['alternativaText'],$user_data['alternativaCond']);
    //     $s++;
    // }else{
    //     $s++;
    }
    
    $count++;
}}
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
        
//     echo $questionHelper->getQuestion($tipo,$user_data['perguntaIni'],$user_data['alter_1'],$user_daSta['alter_2'],$user_data['alter_3'],$user_data['alter_4']);
      // break;
 
     ?>
        <input class="submitForm"  type="submit" value="Enviar">

    </form>

</body>

</html>