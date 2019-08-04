<?php 

	ob_start();
    session_start();
   	include("../inc/config.php");

   	/* Level One Question Barron*/
    	$ques_id='';
        $correct_ans = '';

	if (isset($_POST['test_submit'])) {
    	
    	$answer = $_POST['answer'];
    	$ques_id = $_POST['question_id'];

                    
        /* Get Correct ans of specific question */
        $stmt_one = $pdo->prepare("SELECT answer from level_one_question where id=?");
        $stmt_one->execute(array($ques_id));
        $resultOne = $stmt_one->fetch();
        $correct_ans = $resultOne['answer'];

    	if ($answer == $correct_ans) {
    		$_SESSION['success_message'] = 'Your Answer is Correct';
            header('Location:../test.php');
    	}else{
    		$_SESSION['error_message'] = 'Your Answer is Wrong';
            header('Location:../test.php');
    	}
    }
?>