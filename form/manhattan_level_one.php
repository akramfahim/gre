<?php 
	ob_start();
    session_start();
   	include("../inc/config.php");

   	/* Level One Question Barron*/
    	$ques_id='';
        $ques_id_two='';
        $ques_id_three='';

        $correct_ans = '';
        $correct_ans_two = '';
        $correct_ans_three = '';


        if (isset($_POST['submit'])) {
             if(empty($_POST['answer0']) || empty($_POST['answer1']) || empty($_POST['answer2']) ) {
                $error_message = 'You Must Answer All The Question';
            } else {
                    $user_id = $_POST['user_id'];

                    $ques_id = $_POST['question_id0'];
                    $ques_id_two = $_POST['question_id1'];
                    $ques_id_three = $_POST['question_id2'];

                    
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

                    /*echo $correct_ans."<br>";
                    echo $correct_ans_two."<br>";
                    echo $correct_ans_three."<br><hr>";*/


                    $answer = $_POST['answer0'];
                    $answer2 = $_POST['answer1'];
                    $answer3 = $_POST['answer2'];

                    /*echo $answer."<br>";
                    echo $answer2."<br>";
                    echo $answer3."<br><hr>";*/
                  /* Level 1 Test */
                if ($answer == $correct_ans && $answer2 == $correct_ans_two && $answer3 == $correct_ans_three ){

                    $sql1 = $pdo->prepare("SELECT * FROM level_settings WHERE user_id=? AND type='manhattan'");
                    $sql1->execute(array($_POST['user_id']));
                    $totalrow = $sql1->rowCount();              
                    if($totalrow) {
                        $_SESSION['error_message'] = 'Your Already Completed Level One';
                        header('Location: ../manhattan_course.php');
                    }else{

                        $sql = $pdo->prepare("INSERT INTO level_settings (level_One,user_id,type) VALUES (?,?,?)");
                        $sql->execute(array('Completed',$_POST['user_id'],'manhattan'));

                        $_SESSION['success_message'] = 'You Passed Level One Now';
                        header('Location: ../manhattan_course.php');

                    }
                    // unset($_POST['answer']);
                  }else{
                    $_SESSION['error_message'] = 'Your answers are not correct';
                    header('Location: ../manhattan_course.php');

                }
                /* Level 1 Test End */
            }
        }

 ?>