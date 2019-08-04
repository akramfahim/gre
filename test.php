<?php
   include "header.php";

      ob_start();
     session_start();
     include("inc/config.php");
     include("inc/CSRF_Protect.php");
     $csrf = new CSRF_Protect();
     $error_msg = '';
     $succss_msg = '';

     /* Level One Question Barron*/
    $ques_id='';
    $correct_ans = '';

    $statementOne = $pdo->prepare("SELECT * FROM level_one_question ORDER BY RAND() limit 1");
    $statementOne->execute();
    $resultOne = $statementOne->fetchAll(PDO::FETCH_ASSOC);

    /* Get Random First Question */
    $ques_id = $resultOne[0]['id'];
    $random_question =  $resultOne[0]['question'];
    $correct_ans = $resultOne[0]['answer'];


    $ModalQuestionOne = $pdo->prepare("SELECT * FROM level_one_question_option where level_one_question_option.question_id = ".$ques_id." limit 4");
    $ModalQuestionOne->execute();
    $resultModalOne = $ModalQuestionOne->fetchAll(PDO::FETCH_ASSOC); 

    if (isset($_POST['test_submit'])) {
    	$answer = $_POST['answer'];

    	echo $correct_ans."<br>";
    	echo $answer."<br>";

    	if ($answer == $correct_ans) {
    		$succss_msg = "Your Answer is Correct";
    	}else{
    		$error_msg = "Oppps! Your Answer is not Correct";
    	}
    }

    




   require 'navbar.php'; 
?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-sm-12 offset-md-3">
			<?php if ($error_msg): ?>
				<div class="alert alert-danger">
					<h3><?php echo $error_msg; ?></h3>
				</div>
			<?php endif ?>

			<?php if ($succss_msg): ?>
				<div class="alert alert-success">
					<h3><?php echo $succss_msg; ?></h3>
				</div>
			<?php endif ?>
			
			<div class="card my-5">
			    <div class="card-header">
			    	<h2 class="text-center">Test Your Vocabs Range</h2>
				</div>
			    <div class="card-body">
			    	<form action="" method="post">
						
						<h5>Q: <b> <?php echo $random_question;  ?> ?</b></h5>
        				<hr>

                        <input type="hidden" name="question_id" value="<?php echo $ques_id ?>">

                        <?php foreach ($resultModalOne as $row3) {
                            
                        ?>
                       	<input type="radio" class="form-check-group" name="answer" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>

                        <button type="submit" class="btn btn-block btn-primary mt-3" name="test_submit">Submit</button>
                    </form>
			    </div> 
			    <div class="card-footer">
			    	<a href="signin.php">Login for more words</a>
			    </div>
			</div>
		</div>
	</div>
</div>      

<?php
   include "footer.php";
?>
      