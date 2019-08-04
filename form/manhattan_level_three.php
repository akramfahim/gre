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
            if(empty($_POST['level_three_answer']) || empty($_POST['level_three_answer2']) || empty($_POST['level_three_answer3']) ) {
                $error_message = 'You Must Answer All The Question';
            } else {
                    
                $user_id = $_POST['user_id'];

                $level_three_ques_id = $_POST['level_three_ques_id'];
                $level_three_ques_id_two = $_POST['level_three_ques_id_two'];
                $level_three_ques_id_three = $_POST['level_three_ques_id_three'];

                /* Getting Correct Answer related to the question */
                $stmt_one = $pdo->prepare("SELECT answer FROM manhattan_level_three_question WHERE id=?");
                $stmt_one->execute(array($level_three_ques_id));
                $resultOne = $stmt_one->fetch();
                $level_three_correct_ans = $resultOne['answer'];

                $stmt_two = $pdo->prepare("SELECT answer FROM manhattan_level_three_question WHERE id=?");
                $stmt_two->execute(array($level_three_ques_id_two));
                $resultTwo = $stmt_two->fetch();
                $level_three_correct_ans_two = $resultTwo['answer'];

                $stmt_three = $pdo->prepare("SELECT answer FROM manhattan_level_three_question WHERE id=?");
                $stmt_three->execute(array($level_three_ques_id_three));
                $resultThree = $stmt_three->fetch();
                $level_three_correct_ans_three = $resultThree['answer'];


                $level_three_answer = $_POST['level_three_answer'];
                $level_three_answer2 = $_POST['level_three_answer2'];
                $level_three_answer3 = $_POST['level_three_answer3'];

                if (
                    $level_three_answer  == $level_three_correct_ans  
                    && $level_three_answer2 == $level_three_correct_ans_two 
                    && $level_three_answer3 == $level_three_correct_ans_three
                ) {

                    $level_three_sql1 = $pdo->prepare("SELECT * FROM manhattan_word_settings WHERE user_id=?");
                    $level_three_sql1->execute(array($_POST['user_id']));
                    $level_three_totalrow = $level_three_sql1->rowCount();              
                    if($level_three_totalrow) {

                        $level_three_sql = $pdo->prepare("UPDATE manhattan_word_settings SET levelThree=? WHERE user_id= ?");
                        $level_three_sql->execute(array('Completed',$_POST['user_id']));

                        $_SESSION['success_message'] = 'You Passed Level Three Now!!';
                        header('Location:../manhattan_course.php');

                        /*echo "You Passes";*/


                    }else{
                        $_SESSION['error_message'] = 'You Have not Completed Level Two Yet';
                        header('Location:../manhattan_course.php');
                    }
                    // unset($_POST['answer']);
                  }else{
                    $_SESSION['error_message'] = 'Your ALL Answers are not correct';
                    header('Location:../manhattan_course.php');
                    // unset($_POST['answer']);
                }
            }        
        }        
        /* Level 3 Test end */
 ?>