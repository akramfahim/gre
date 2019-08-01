<?php 
	ob_start();
    session_start();
   	include("inc/config.php");

   	/* Level One Question Barron*/
    	$ques_id='';
        $correct_ans = '';
        $correct_ans_two = '';
        $correct_ans_three = '';

        $statementOne = $pdo->prepare("SELECT * FROM level_one_question ORDER BY RAND() limit 3");
        $statementOne->execute();
        $resultOne = $statementOne->fetchAll(PDO::FETCH_ASSOC);

        /* Get Random First Question */
        $ques_id = $resultOne[0]['id'];
        $random_question =  $resultOne[0]['question'];
        $correct_ans = $resultOne[0]['answer'];

        /* Get Random Second Question */
        $ques_id_two = $resultOne[1]['id'];
        $random_question_two =  $resultOne[1]['question'];
        $correct_ans_two = $resultOne[1]['answer'];

        /* Get Random Third Question */
        $ques_id_three = $resultOne[2]['id'];
        $random_question_three =  $resultOne[2]['question'];
        $correct_ans_three = $resultOne[2]['answer'];

                    /*echo $correct_ans."<br>";
                    echo $correct_ans_two."<br>";
                    echo $correct_ans_three."<br><hr>";*/

        /* Level 1 Test */
        if (isset($_POST['submit'])) {
            if(empty($_POST['answer']) || empty($_POST['answer2']) || empty($_POST['answer3']) ) {
                $error_message = 'You Must Answer All The Question';
            } else {
                    $user_id = $_POST['user_id'];
                    $answer = $_POST['answer'];
                    $answer2 = $_POST['answer2'];
                    $answer3 = $_POST['answer3'];

                  /*  echo $answer."<br>";
                    echo $answer2."<br>";
                    echo $answer3."<br><hr>";*/
                  /* Level 1 Test */
                if ($answer == $correct_ans || $answer2 == $correct_ans_two || $answer3 == $correct_ans_three ){

                    $sql1 = $pdo->prepare("SELECT * FROM barron_word_settings WHERE user_id=?");
                    $sql1->execute(array($_POST['user_id']));
                    $totalrow = $sql1->rowCount();              
                    if($totalrow) {
                        $_SESSION['error_message'] = 'Your Already Completed Level One';
                  		header('Location:single_course.php');
                    }else{

                        $sql = $pdo->prepare("INSERT INTO barron_word_settings (levelOne,user_id) VALUES (?,?)");
                        $sql->execute(array('Completed',$_POST['user_id']));

                        $_SESSION['success_message'] = 'You Passed Level One Now';
    					header('Location: single_course.php');

                    }
                    // unset($_POST['answer']);
                  }else{
                  	$_SESSION['error_message'] = 'Your answers are not correct';
                  	header('Location:single_course.php');

                }
                /* Level 1 Test End */
            }
        }
        /* Level 1 Test End*/

 ?>