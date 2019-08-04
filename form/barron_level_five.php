<?php 
		
		ob_start();
    	session_start();
    	include("../inc/config.php");

		/* Level Three Question Barron*/
        $level_five_ques_id='';
        $level_five_ques_id_two='';
        $level_five_ques_id_three='';

        $level_five_correct_ans = '';
        $level_five_correct_ans_two = '';
        $level_five_correct_ans_three = '';

        
        /* Level 3 Test */
        if (isset($_POST['level_five_submit'])) {
            if(empty($_POST['level_five_answer']) || empty($_POST['level_five_answer2']) || empty($_POST['level_five_answer3']) ) {
                $error_message = 'You Must Answer All The Question';
            } else {
                    
                $user_id = $_POST['user_id'];

                $level_five_ques_id = $_POST['level_five_ques_id'];
                $level_five_ques_id_two = $_POST['level_five_ques_id_two'];
                $level_five_ques_id_three = $_POST['level_five_ques_id_three'];

                /* Getting Correct Answer related to the question */
                $stmt_one = $pdo->prepare("SELECT answer FROM level_five_question_barron WHERE id=?");
                $stmt_one->execute(array($level_five_ques_id));
                $resultOne = $stmt_one->fetch();
                $level_five_correct_ans = $resultOne['answer'];

                $stmt_two = $pdo->prepare("SELECT answer FROM level_five_question_barron WHERE id=?");
                $stmt_two->execute(array($level_five_ques_id_two));
                $resultTwo = $stmt_two->fetch();
                $level_five_correct_ans_two = $resultTwo['answer'];

                $stmt_three = $pdo->prepare("SELECT answer FROM level_five_question_barron WHERE id=?");
                $stmt_three->execute(array($level_five_ques_id_three));
                $resultThree = $stmt_three->fetch();
                $level_five_correct_ans_three = $resultThree['answer'];


                $level_five_answer = $_POST['level_five_answer'];
                $level_five_answer2 = $_POST['level_five_answer2'];
                $level_five_answer3 = $_POST['level_five_answer3'];

                if (
                    $level_five_answer  == $level_five_correct_ans  
                    && $level_five_answer2 == $level_five_correct_ans_two 
                    && $level_five_answer3 == $level_five_correct_ans_three
                ) {

                    $level_five_sql1 = $pdo->prepare("SELECT * FROM barron_word_settings WHERE user_id=?");
                    $level_five_sql1->execute(array($_POST['user_id']));
                    $level_five_totalrow = $level_five_sql1->rowCount();              
                    if($level_five_totalrow) {

                        $level_five_sql = $pdo->prepare("UPDATE barron_word_settings SET levelFive=? WHERE user_id= ?");
                        $level_five_sql->execute(array('Completed',$_POST['user_id']));

                        $_SESSION['success_message'] = 'You Have Successfully Complete All the Levels!!';
                        header('Location:../single_course.php');

                        /*echo "You Passes";*/


                    }else{
                        $_SESSION['error_message'] = 'You Have not Completed Level Four Yet';
                        header('Location:../single_course.php');
                    }
                    // unset($_POST['answer']);
                  }else{
                    $_SESSION['error_message'] = 'Your Level 5 Answers are not correct';
                    header('Location: ../single_course.php');
                    // unset($_POST['answer']);
                }
            }        
        }        
        /* Level 4 Test end */
 ?>
