<?php 
		
		ob_start();
    	session_start();
    	include("../inc/config.php");

		/* Level Three Question Barron*/
        $level_three_ques_id='';
        $level_three_ques_id_two='';
        $level_three_ques_id_three='';

        $level_three_correct_ans = '';
        $level_three_correct_ans_two = '';
        $level_three_correct_ans_three = '';

        
        /* Level 3 Test */
        if (isset($_POST['level_three_submit'])) {
            if(empty($_POST['answer0']) || empty($_POST['answer1']) || empty($_POST['answer2']) ) {
               $error_message = 'You Must Answer All The Question';
                }  else {
                    
                $user_id = $_POST['user_id'];

                $level_three_ques_id = $_POST['question_id0'];
                $level_three_ques_id_two = $_POST['question_id1'];
                $level_three_ques_id_three = $_POST['question_id2'];

                /* Getting Correct Answer related to the question */
                $stmt_one = $pdo->prepare("SELECT answer FROM question WHERE id=?");
                $stmt_one->execute(array($level_three_ques_id));
                $resultOne = $stmt_one->fetch();
                $level_three_correct_ans = $resultOne['answer'];

                $stmt_two = $pdo->prepare("SELECT answer FROM question WHERE id=?");
                $stmt_two->execute(array($level_three_ques_id_two));
                $resultTwo = $stmt_two->fetch();
                $level_three_correct_ans_two = $resultTwo['answer'];

                $stmt_three = $pdo->prepare("SELECT answer FROM question WHERE id=?");
                $stmt_three->execute(array($level_three_ques_id_three));
                $resultThree = $stmt_three->fetch();
                $level_three_correct_ans_three = $resultThree['answer'];


                $level_three_answer = $_POST['answer0'];
                $level_three_answer2 = $_POST['answer1'];
                $level_three_answer3 = $_POST['answer2'];

                if (
                    $level_three_answer  == $level_three_correct_ans  
                    && $level_three_answer2 == $level_three_correct_ans_two 
                    && $level_three_answer3 == $level_three_correct_ans_three
                ) {

                    $level_three_sql1 = $pdo->prepare("SELECT * FROM level_settings WHERE user_id=? AND type='magoosh'");
                    $level_three_sql1->execute(array($_POST['user_id']));
                    $level_three_totalrow = $level_three_sql1->rowCount();              
                    if($level_three_totalrow) {

                        $level_three_sql = $pdo->prepare("UPDATE level_settings SET level_Three=? WHERE user_id= ?");
                        $level_three_sql->execute(array('Completed',$_POST['user_id']));

                        $_SESSION['success_message'] = 'You Passed Level Three Now!!';
                        header('Location:../magoosh_course.php');

                        /*echo "You Passes";*/


                    }else{
                        $_SESSION['error_message'] = 'You Have not Completed Level Two Yet';
                        header('Location:../magoosh_course.php');
                    }
                    // unset($_POST['answer']);
                  }else{
                    $_SESSION['error_message'] = 'Your ALL Answers are not correct';
                    header('Location:../magoosh_course.php');
                    // unset($_POST['answer']);
                }
            }        
        }        
        /* Level 3 Test end */
 ?>