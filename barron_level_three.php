<?php 
		
		ob_start();
    	session_start();
    	include("inc/config.php");

		$level_three_ques_id='';
        $level_three_correct_ans = '';
        $level_three_correct_ans_two = '';
        $level_three_correct_ans_three = '';

        $level_three_statementOne = $pdo->prepare("SELECT * FROM level_three_question_barron ORDER BY RAND() limit 3");
        $level_three_statementOne->execute();
        $level_three_resultOne = $level_three_statementOne->fetchAll(PDO::FETCH_ASSOC);

        /* Get Random First Question */
        $level_three_ques_id = $level_three_resultOne[0]['id'];
        $level_three_random_question =  $level_three_resultOne[0]['question'];
        $level_three_correct_ans = $level_three_resultOne[0]['answer'];

        /* Get Random Second Question */
        $level_three_ques_id_two = $level_three_resultOne[1]['id'];
        $level_three_random_question_two =  $level_three_resultOne[1]['question'];
        $level_three_correct_ans_two = $level_three_resultOne[1]['answer'];

        /* Get Random Third Question */
        $level_three_ques_id_three = $level_three_resultOne[2]['id'];
        $level_three_random_question_three =  $level_three_resultOne[2]['question'];
        $level_three_correct_ans_three = $level_three_resultOne[2]['answer'];
	/* Level 3 Test */
        if (isset($_POST['level_three_submit'])) {
            if(empty($_POST['level_three_answer']) || empty($_POST['level_three_answer2']) || empty($_POST['level_three_answer3']) ) {
                $error_message = 'You Must Answer All The Question';
            } else {
                    
                $user_id = $_POST['user_id'];
                $level_three_answer = $_POST['level_three_answer'];
                $level_three_answer2 = $_POST['level_three_answer2'];
                $level_three_answer3 = $_POST['level_three_answer3'];

                /*echo $level_three_answer."<br>";
                echo $level_three_answer2."<br>";
                echo $level_three_answer3."<br>";*/

                if (
                    $level_three_answer  == $level_three_correct_ans  
                    || $level_three_answer2 == $level_three_correct_ans_two 
                    || $level_three_answer3 == $level_three_correct_ans_three
                ) {

                    $level_three_sql1 = $pdo->prepare("SELECT * FROM barron_word_settings WHERE user_id=?");
                    $level_three_sql1->execute(array($_POST['user_id']));
                    $level_three_totalrow = $level_three_sql1->rowCount();              
                    if($level_three_totalrow) {

                        /*$level_three_sql = $pdo->prepare("UPDATE barron_word_settings SET levelThree=? WHERE user_id= ?");
                        $level_three_sql->execute(array('Completed',$_POST['user_id']));
                        $success_message = "Your Have Passed Level Three Now!!";*/

                        echo "You Passes";


                    }else{
                        $error_message = "You Have not Passed Level One Yet";

                        echo "You have no raw in db";
                    }
                    // unset($_POST['answer']);
                  }else{
                    $error_message = "Your Level Three Answer is not correct" ;
                    echo "Answer Is not Correct";
                    // unset($_POST['answer']);
                }
            }        
        }        
        /* Level 3 Test end */
 ?>