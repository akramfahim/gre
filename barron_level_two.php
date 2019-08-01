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

        /*$level_two_statementOne = $pdo->prepare("SELECT * FROM level_two_question_barron ORDER BY RAND() limit 3");
        $level_two_statementOne->execute();
        $level_two_resultOne = $level_two_statementOne->fetchAll(PDO::FETCH_ASSOC);*/

        /* Get Random First Question */
        /*$level_two_ques_id = $level_two_resultOne[0]['id'];
        $level_two_random_question =  $level_two_resultOne[0]['question'];
        $level_two_correct_ans = $level_two_resultOne[0]['answer'];*/

        /* Get Random Second Question */
        /*$level_two_ques_id_two = $level_two_resultOne[1]['id'];
        $level_two_random_question_two =  $level_two_resultOne[1]['question'];
        $level_two_correct_ans_two = $level_two_resultOne[1]['answer'];*/

        /* Get Random Third Question */
        /*$level_two_ques_id_three = $level_two_resultOne[2]['id'];
        $level_two_random_question_three =  $level_two_resultOne[2]['question'];
        $level_two_correct_ans_three = $level_two_resultOne[2]['answer'];*/

        /*echo $level_two_correct_ans."<br>";
        echo $level_two_correct_ans_two."<br>";
        echo $level_two_correct_ans_three."<br><hr>";*/

        /* Level 2 Test */
        if (isset($_POST['level_two_submit'])) {
        	if(empty($_POST['level_two_answer']) || empty($_POST['level_two_answer2']) || empty($_POST['level_two_answer3']) ) {
                $error_message = 'You Must Answer All The Question';

            } else {
        			
        		$user_id = $_POST['user_id'];

        		$level_two_ques_id = $_POST['level_two_ques_id'];
        		$level_two_ques_id_two = $_POST['level_two_ques_id_two'];
        		$level_two_ques_id_three = $_POST['level_two_ques_id_three'];

        		$level_two_sql_one = $pdo->prepare("SELECT answer FROM level_two_question_barron WHERE question_id=?");
        		$level_two_sql_one->execute(array($level_two_ques_id));
        		$level_two_correct_ans = $level_two_sql_one->fetch();
        		$corr_ans_one = $level_two_correct_ans['answer'];

        		echo $corr_ans_one;;


                $level_two_answer = $_POST['level_two_answer'];
                $level_two_answer2 = $_POST['level_two_answer2'];
                $level_two_answer3 = $_POST['level_two_answer3'];

                /*echo $level_two_answer."<br>";
                echo $level_two_answer2."<br>";
                echo $level_two_answer3."<br><hr>";*/

        		if (
                	$level_two_answer  == $level_two_correct_ans  
                	|| $level_two_answer2 == $level_two_correct_ans_two 
                	|| $level_two_answer3 == $level_two_correct_ans_three
                ) {

                    $level_two_sql1 = $pdo->prepare("SELECT * FROM barron_word_settings WHERE user_id=?");
                    $level_two_sql1->execute(array($_POST['user_id']));
                    $level_two_totalrow = $level_two_sql1->rowCount();              
                    if($level_two_totalrow) {

                    	/*$level_two_sql = $pdo->prepare("UPDATE barron_word_settings SET levelTwo=? WHERE user_id= ?");
                        $level_two_sql->execute(array('Completed',$_POST['user_id']));
                       
                        $_SESSION['success_message'] = 'You Passed Level Two Now!!';
                  		header('Location:single_course.php');*/

                  		echo "You Passed";

                    }else{
                    
                    	/*$_SESSION['error_message'] = 'You Have not Completed Level One Yet';
                  		header('Location:single_course.php');*/
                  		echo "You Failed level 1";

                    }
                    // unset($_POST['answer']);
                  }else{

                    /*$_SESSION['error_message'] = 'Your Level Two Answer is not correct';
                  	header('Location:single_course.php');*/
                  	echo "Your Answers are wrong";
                    // unset($_POST['answer']);
                }
            }        
        }        
        /* Level 2 Test end */
 ?>