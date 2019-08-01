<?php 
	ob_start();
    session_start();
   	include("inc/config.php");

   	/* Level Two Question Barron*/
    	$level_two_ques_id='';
    	$level_two_ques_id_two='';
    	$level_two_ques_id_three='';

        $level_two_correct_ans = '';
        $level_two_correct_ans_two = '';
        $level_two_correct_ans_three = '';

        /* Level 2 Test */
        if (isset($_POST['level_two_submit'])) {
        	if(empty($_POST['level_two_answer']) || empty($_POST['level_two_answer2']) || empty($_POST['level_two_answer3']) ) {
                $error_message = 'You Must Answer All The Question';

            } else {
        			
        		$user_id = $_POST['user_id'];

        		$level_two_ques_id = $_POST['level_two_ques_id'];
        		$level_two_ques_id_two = $_POST['level_two_ques_id_two'];
        		$level_two_ques_id_three = $_POST['level_two_ques_id_three'];


                /* Getting Correct Answer related to the question */
                $stmt_one = $pdo->prepare("SELECT answer FROM level_two_question_barron WHERE id=?");
                $stmt_one->execute(array($level_two_ques_id));
                $resultOne = $stmt_one->fetch();
                $level_two_correct_ans = $resultOne['answer'];

                $stmt_two = $pdo->prepare("SELECT answer FROM level_two_question_barron WHERE id=?");
                $stmt_two->execute(array($level_two_ques_id_two));
                $resultTwo = $stmt_two->fetch();
                $level_two_correct_ans_two = $resultTwo['answer'];

                $stmt_three = $pdo->prepare("SELECT answer FROM level_two_question_barron WHERE id=?");
                $stmt_three->execute(array($level_two_ques_id_three));
                $resultThree = $stmt_three->fetch();
                $level_two_correct_ans_three = $resultThree['answer'];

                

                $level_two_answer = $_POST['level_two_answer'];
                $level_two_answer2 = $_POST['level_two_answer2'];
                $level_two_answer3 = $_POST['level_two_answer3'];


        		if (
                	$level_two_answer  == $level_two_correct_ans  
                	&& $level_two_answer2 == $level_two_correct_ans_two 
                	&& $level_two_answer3 == $level_two_correct_ans_three
                ) {

                    $level_two_sql1 = $pdo->prepare("SELECT * FROM barron_word_settings WHERE user_id=?");
                    $level_two_sql1->execute(array($_POST['user_id']));
                    $level_two_totalrow = $level_two_sql1->rowCount();              
                    if($level_two_totalrow) {

                    	$level_two_sql = $pdo->prepare("UPDATE barron_word_settings SET levelTwo=? WHERE user_id= ?");
                        $level_two_sql->execute(array('Completed',$_POST['user_id']));
                       
                        $_SESSION['success_message'] = 'You Passed Level Two Now!!';
                  		header('Location:single_course.php');

                  		/*echo "You Passed";*/

                    }else{
                    
                    	$_SESSION['error_message'] = 'You Have not Completed Level One Yet';
                  		header('Location:single_course.php');
                  		/*echo "You Failed level 1";*/

                    }
                    // unset($_POST['answer']);
                  }else{

                    $_SESSION['error_message'] = 'Your Level Two Answers are not correct';
                  	header('Location:single_course.php');
                  	/*echo "Your Answers are wrong";*/
                    // unset($_POST['answer']);
                }
            }        
        }        
        /* Level 2 Test end */
 ?>