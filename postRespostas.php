<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    // session_start();

    $PerguntaR = $_POST['pergunta'];
    $PerguntaRR = $PerguntaR[1];
    $idUserReceb = $PerguntaRR["id_user"];

    $_SESSION['text'] = "Respostas enviadas!";

    // header('LOCATION: pageUser.php?id='.$idUserReceb.'');



    include_once('config.php');



    // $sql2 = "SELECT * FROM results WHERE id_user = $idUserReceb";
    // $result2 = $conexao->query($sql2);

    // while($user_data2 = mysqli_fetch_assoc($result2)){
    //     // print_r("Passou pelo while");

    //             $questSel[$i] = $user_data2['id_quest'];
    //             $i++;

    // }
    // print_r($questSel);


    // $PerguntaR = $_POST['pergunta'];
    // $PerguntaRR = $PerguntaR[0];
    // $questNumbRecebR = $PerguntaRR["questNumb"];


    // print_r($questNumbRecebR);
    // var_dump($_POST);

    // $count = $questNumbRecebR - 1;


    $PerguntaR = $_POST['pergunta'];
    $Respost1R = $_POST['Respost1'];
    // $PerguntaRR = $PerguntaR[$t];
    // $codQuestReceb = $PerguntaRR["codQuest"];

    $countQuest = count($PerguntaR);

    $countQuest = $countQuest + 3;

    for ($t = 0; $t < $countQuest; $t++) {
        //RespostList

        //Recebe código ID da questão
        $PerguntaR = $_POST['pergunta'];
        $PerguntaRR = $PerguntaR[$t];
        $codQuestReceb = $PerguntaRR["codQuest"];

        //Recebo código ID do Usuario que respondeu a questão
        $PerguntaR = $_POST['pergunta'];
        $PerguntaRR = $PerguntaR[$t];
        $idUserReceb = $PerguntaRR["id_user"];

        //Recebe o valor da resposta número 1
        $Respost1R = $_POST['Respost1'];
        $Respost1RR = $Respost1R[$t];
        $RespostReceb1 = $Respost1RR["valor"];

        //Recebe o valor da resposta número 2
        $Respost2R = $_POST['Respost2'];
        $Respost2RR = $Respost2R[$t];
        $RespostReceb2 = $Respost2RR["valor"];

        //Recebe o valor da resposta número 3
        $Respost3R = $_POST['Respost3'];
        $Respost3RR = $Respost3R[$t];
        $RespostReceb3 = $Respost3RR["valor"];

        //Recebe o valor da reposta da caixa de seleção
        $Respost1S = $_POST['RespostList1'];
        $Respost1Select = $Respost1S[$t];
        $RespostSelect1 = $Respost1Select["valor"];
        //Recebe o valor da reposta da caixa de seleção
        $Respost2S = $_POST['RespostList2'];
        $Respost2Select = $Respost2S[$t];
        $RespostSelect2 = $Respost2Select["valor"];
        //Recebe o valor da reposta da caixa de seleção
        $Respost3S = $_POST['RespostList3'];
        $Respost3Select = $Respost3S[$t];
        $RespostSelect3 = $Respost3Select["valor"];
        //Recebe o valor da reposta da caixa de seleção    
        $Respost4S = $_POST['RespostList4'];
        $Respost4Select = $Respost4S[$t];
        $RespostSelect4 = $Respost4Select["valor"];


        // print_r($codQuestReceb);
        // print_r($RespostReceb1);
        // print_r($RespostReceb2);
        // print_r($RepostReceb3);

        // print_r($countQuest);
        // print_r($PerguntaR);
        // print_r($Respost1R);
        // print_r($Respost1S);
        // print_r($Respost2S);
        // print_r($Respost3S);
        // print_r($Respost4S);

        $teste = [
            '1' => $RespostReceb1,
            '2' => $RespostReceb2,
            '3' => $RespostReceb3,
            '4' => $RespostSelect1,
            '5' => $RespostSelect2,
            '6' => $RespostSelect3,
            '7' => $RespostSelect4
        ];

        print_r($teste);
        $verificacao = 0;
        for ($y = 0; $y < 7; $y++) {

            if (empty($teste[$y])) {
            } else {

                print_r("A pergunta tem respostas: " . $codQuestReceb);
                $verificacao = 1;
            }
        }

        // for($countNull = 1; $countNull < 4; $countNull){
        //     $teste = is_null(${'Respost'.$countNull.'S'});
        //     if($teste != 1){
        //         $null = 1;
        //         break;
        //     }

        // }


        // $teste1 = is_null($RespostReceb1);
        // $teste2 = is_null($RespostSelect1);
        // $teste3 = is_null($RespostSelect2);
        // $teste4 = is_null($RespostSelect3);
        // $teste5 = is_null($RespostSelect4);


        // print_r('<br>');
        // print_r("----------------------------------------------------");
        // print_r('<br>');
        // print_r($null);
        // print_r('<br>');
        // print_r("----------------------------------------------------");
        // print_r('<br>');


            if($verificacao != 1){
                //Teste de valor nulo
                print_r('<br>');
                // print_r("a reposta da pergunta ". $codQuestReceb. "é : ");
                // print_r($teste);

                print_r("A pergunta ". $codQuestReceb . " é nula");
                print_r('<br>');

            }else{

                //Imprime valores recibidos para teste 


                $result = mysqli_query($conexao, "INSERT INTO results(id_quest, id_user, resposta_1, resposta_2, resposta_3, respostaSelect_1, respostaSelect_2, respostaSelect_3, respostaSelect_4, respostaSelect_5, respostaSelect_6, respostaSelect_7, respostaSelect_8) 
                VALUES ('$codQuestReceb','$idUserReceb','$RespostReceb1','$RespostReceb2','$RespostReceb3','$RespostSelect1','$RespostSelect2','$RespostSelect3','$RespostSelect4','$RespostSelect5','$RespostSelect6','$RespostSelect7','$RespostSelect8')");



        }

    }






    ?>
</body>

</html>