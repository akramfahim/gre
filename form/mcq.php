<?php 

	ob_start();
    session_start();
   	include("../inc/config.php");

 

   if (isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];

         $ques_id = $_POST['question_id0'];
         $ques_id_two = $_POST['question_id1'];
         $ques_id_three = $_POST['question_id2'];
         $ques_id_four = $_POST['question_id3'];
         $ques_id_five = $_POST['question_id4'];

        
        /* Get Correct ans of specific question */
        $stmt_one = $pdo->prepare("SELECT answer from question where id=?");
        $stmt_one->execute(array($ques_id));
        $resultOne = $stmt_one->fetch();
        $correct_ans = $resultOne['answer'];

        $stmt_two = $pdo->prepare("SELECT answer from question where id=?");
        $stmt_two->execute(array($ques_id_two));
        $resultTwo = $stmt_two->fetch();
        $correct_ans_two = $resultTwo['answer'];

        $stmt_three = $pdo->prepare("SELECT answer from question where id=?");
        $stmt_three->execute(array($ques_id_three));
        $resultThree = $stmt_three->fetch();
        $correct_ans_three = $resultThree['answer'];

         $stmt_four = $pdo->prepare("SELECT answer from question where id=?");
        $stmt_four->execute(array($ques_id_four));
        $resultfour = $stmt_four->fetch();
        $correct_ans_four = $resultfour['answer'];

        $stmt_five = $pdo->prepare("SELECT answer from question where id=?");
        $stmt_five->execute(array($ques_id_five));
        $resultfive = $stmt_five->fetch();
        $correct_ans_five = $resultfive['answer'];



        $answer = $_POST['answer0'];
        $answer2 = $_POST['answer1'];
        $answer3 = $_POST['answer2'];
        $answer4 = $_POST['answer3'];
        $answer5 = $_POST['answer4'];
        $score=0;

         if ($answer == $correct_ans){
         	 $score++;
         }
         if ($answer2 == $correct_ans_two){
         	  $score++;
         }
         if ($answer3 == $correct_ans_three){
         	  $score++;
         }
         if ($answer4 == $correct_ans_four){
         	  $score++;
         }
         if ($answer5 == $correct_ans_five){
         	  $score++;
         }

         echo $score;
     }
 ?>