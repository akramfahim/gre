<?php 

   ob_start();
  session_start();
  include("../inc/config.php");
      if(!isset($_SESSION['user'])) {
        $loggedIn = false;
        header('location: signin.php');
        exit;
    	}else{
       		$loggedIn = true;
    	}

   if (isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];

         $ques_id = $_POST['question_id0'];
         $ques_id_two = $_POST['question_id1'];
         $ques_id_three = $_POST['question_id2'];
         $ques_id_four = $_POST['question_id3'];
         $ques_id_five = $_POST['question_id4'];

        
        /* Get Correct ans of specific question */
        $stmt_one = $pdo->prepare("SELECT answer,question from question where id=?");
        $stmt_one->execute(array($ques_id));
        $resultOne = $stmt_one->fetch();
        $correct_ans = $resultOne['answer'];
        $question1 = $resultOne['question'];

        $stmt_two = $pdo->prepare("SELECT answer,question from question where id=?");
        $stmt_two->execute(array($ques_id_two));
        $resultTwo = $stmt_two->fetch();
        $correct_ans_two = $resultTwo['answer'];
        $question2 = $resultTwo['question'];

        $stmt_three = $pdo->prepare("SELECT answer,question from question where id=?");
        $stmt_three->execute(array($ques_id_three));
        $resultThree = $stmt_three->fetch();
        $correct_ans_three = $resultThree['answer'];
        $question3 = $resultThree['question'];

         $stmt_four = $pdo->prepare("SELECT answer,question from question where id=?");
        $stmt_four->execute(array($ques_id_four));
        $resultfour = $stmt_four->fetch();
        $correct_ans_four = $resultfour['answer'];
        $question4 = $resultfour['question'];

        $stmt_five = $pdo->prepare("SELECT answer,question from question where id=?");
        $stmt_five->execute(array($ques_id_five));
        $resultfive = $stmt_five->fetch();
         $correct_ans_five = $resultfive['answer'];
        $question5 = $resultfive['question'];



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
          $status = $pdo->prepare("INSERT INTO exam (user_id,score,type) VALUES (?,?,?)");
          $status->execute(array($user_id,$score,"mcq"));

     }
 ?>

<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>GRE | Home</title>
      
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
   </head>
   <body class="bg-falcon">
 <div class="container mt-4">
 	<div class="card">
 		<div class="card-header d-flex justify-content-between">
 			<h5 class="text-white">Exam Paper</h5>
 			<h5 class="text-white border p-1">Score : <?php echo $score; ?></h5>
 		</div>
 		<div class="card-body">
 			<table class="table">
	  <thead>
	    <tr>
	      <th class="w-25">Question</th>
	      <th>Your Answer</th>
	      <th>Correct Answer</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <td><?php echo $question1; ?></td>
	      <td class="font-weight-bold text-<?php echo $answer == $correct_ans ? 'success' : 'danger'; ?>"><?php echo $answer; ?></td>
	      <td><?php echo $correct_ans; ?></td>
	    </tr>
	    <tr>
	      <td><?php echo $question2; ?></td>
	      <td class="font-weight-bold text-<?php echo $answer2 == $correct_ans_two ? 'success' : 'danger'; ?>"><?php echo $answer2; ?></td>
	      <td><?php echo $correct_ans_two;  ?></td>
	    </tr>
	    <tr>
	      <td><?php echo $question3; ?></td>
	      <td class="font-weight-bold text-<?php echo $answer3 == $correct_ans_three ? 'success' : 'danger'; ?>"><?php echo $answer3; ?></td>
	      <td><?php echo $correct_ans_three; ?></td>
	    </tr>
	    <tr>
	      <td ><?php echo $question4; ?></td>
	      <td class="font-weight-bold text-<?php echo $answer4 == $correct_ans_four ? 'success' : 'danger'; ?>"><?php echo $answer4; ?></td>
	      <td><?php echo  $correct_ans_four; ?></td>
	    </tr>
	    <tr>
	      <td><?php echo $question5; ?></td>
	      <td class="font-weight-bold text-<?php echo $answer5 == $correct_ans_five ? 'success' : 'danger'; ?>"><?php echo $answer5; ?></td>
	      <td><?php echo $correct_ans_five; ?></td>
	    </tr>
	</tbody>
	</table>
 		</div>
 		    <div class="card-footer">
      <a href="../allTest.php" class="btn btn-primary">Back</a>
    </div>
 	</div>
 </div>