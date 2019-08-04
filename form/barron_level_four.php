<?php 
		
		ob_start();
    	session_start();
    	include("../inc/config.php");

		/* Level Three Question Barron*/
        $level_four_ques_id='';
        $level_four_ques_id_two='';
        $level_four_ques_id_three='';

        $level_four_correct_ans = '';
        $level_four_correct_ans_two = '';
        $level_four_correct_ans_three = '';

        
        /* Level 3 Test */
        if (isset($_POST['level_four_submit'])) {
            if(empty($_POST['level_four_answer']) || empty($_POST['level_four_answer2']) || empty($_POST['level_four_answer3']) ) {
                $error_message = 'You Must Answer All The Question';
            } else {
                    
                $user_id = $_POST['user_id'];

                $level_four_ques_id = $_POST['level_four_ques_id'];
                $level_four_ques_id_two = $_POST['level_four_ques_id_two'];
                $level_four_ques_id_three = $_POST['level_four_ques_id_three'];

                /* Getting Correct Answer related to the question */
                $stmt_one = $pdo->prepare("SELECT answer FROM level_four_question_barron WHERE id=?");
                $stmt_one->execute(array($level_four_ques_id));
                $resultOne = $stmt_one->fetch();
                $level_four_correct_ans = $resultOne['answer'];

                $stmt_two = $pdo->prepare("SELECT answer FROM level_four_question_barron WHERE id=?");
                $stmt_two->execute(array($level_four_ques_id_two));
                $resultTwo = $stmt_two->fetch();
                $level_four_correct_ans_two = $resultTwo['answer'];

                $stmt_three = $pdo->prepare("SELECT answer FROM level_four_question_barron WHERE id=?");
                $stmt_three->execute(array($level_four_ques_id_three));
                $resultThree = $stmt_three->fetch();
                $level_four_correct_ans_three = $resultThree['answer'];


                $level_four_answer = $_POST['level_four_answer'];
                $level_four_answer2 = $_POST['level_four_answer2'];
                $level_four_answer3 = $_POST['level_four_answer3'];

                if (
                    $level_four_answer  == $level_four_correct_ans  
                    && $level_four_answer2 == $level_four_correct_ans_two 
                    && $level_four_answer3 == $level_four_correct_ans_three
                ) {

                    $level_four_sql1 = $pdo->prepare("SELECT * FROM barron_word_settings WHERE user_id=?");
                    $level_four_sql1->execute(array($_POST['user_id']));
                    $level_four_totalrow = $level_four_sql1->rowCount();              
                    if($level_four_totalrow) {

                        $level_four_sql = $pdo->prepare("UPDATE barron_word_settings SET levelFour=? WHERE user_id= ?");
                        $level_four_sql->execute(array('Completed',$_POST['user_id']));

                        $_SESSION['success_message'] = 'You Passed Level Four Now!!';
                        header('Location:../single_course.php');

                        /*echo "You Passes";*/


                    }else{
                        $_SESSION['error_message'] = 'You Have not Completed Level Three Yet';
                        header('Location:../single_course.php');
                    }
                    // unset($_POST['answer']);
                  }else{
                    $_SESSION['error_message'] = 'Your Level 4 Answers are not correct';
                    header('Location:../single_course.php');
                    // unset($_POST['answer']);
                }
            }        
        }        
        /* Level 4 Test end */
 ?>
