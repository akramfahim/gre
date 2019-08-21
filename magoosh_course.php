<?php 
	require 'header.php';

	ob_start();
    session_start();
    include("inc/config.php");
    include("inc/CSRF_Protect.php");
    $csrf = new CSRF_Protect();
    $error_message = '';
    $success_message = '';
    $error_message1 = '';
    $success_message1 = '';
    $loggedIn= true;

    $user_id = $_SESSION['user']['id'];

    $level_one_pass = false;
    $level_one_check_message ='';
    $level_two_pass = false;
    $level_two_check_message ='';
    $level_three_pass = false;
    $level_three_check_message ='';
    $level_four_pass = false;
    $level_four_check_message ='';
    $level_four_pass = false;

    // Check if the user is logged in or not
    if(!isset($_SESSION['user'])) {
        $loggedIn = false;
        header('location: signin.php');
        exit;
    	}else{
       		$loggedIn = true;
    	}


        /* Level Check whether he or She Passed The Level or Not */
        $level_sql = $pdo->prepare("SELECT * FROM level_settings WHERE user_id=? And type='barron'");
        $level_sql->execute(array($user_id));
        $level_pass = $level_sql->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($level_pass)) {
                if ($level_pass[0]['level_One'] == 'Completed') {
                    $level_one_pass = true;
                    
                    if ($level_pass[0]['level_Two'] == 'Completed') {
                    	$level_two_pass = true;

                        if ($level_pass[0]['level_Three'] == 'Completed') {
                            $level_three_pass = true;

                            if ($level_pass[0]['level_Four'] == 'Completed') {
                                $level_four_pass = true;

                                if ($level_pass[0]['level_Five'] == 'Completed') {
                                    
                                    $level_five_pass = true;
                                    $user_status = $pdo->prepare("SELECT * FROM settings WHERE user_id=?");
                                    $user_status->execute(array($user_id));
                                    $totalrow = $user_status->rowCount();              
                                    if($totalrow){
                                        $_SESSION['error_message'] = 'Your Already Completed Magoosh Level';
                                    }else{
                                        
                                        $status = $pdo->prepare("INSERT INTO settings (magoosh,user_id) VALUES (?,?)");
                                        $status->execute(array("Completed",$user_id));

                                    }

                                } else {
                                    $level_five_pass = false; 
                                } 
                            } else {
                                $level_four_pass = false;
                                $level_four_check_message = "Please Complete Level Four";
                            }
                            
                        }else{
                            $level_three_pass = false;
                            $level_three_check_message = "Please Complete Level Three";
                        }

                    } else {
                    	$level_two_pass = false;
                    	$level_two_check_message = "You Have not Completed Level Two Words Yet";
                    }
                    
                }else{
                	$level_one_pass = false;
                    $level_one_check_message="You Have not completed Level One Words Yet";
                }
        }




	require 'navbar.php';
?>

	<div class="container-fluid my-3" style="height: 100vh">
		<div class="heading_section my-3">
			<h2 class="text-center">Magoosh Word Practice</h2>
			<p class="text-center">Each Level Has 5 words</p>
		</div>
		<hr>
		<div class="row">
			<div class="col-3">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link active" id="v-pills-one-tab" data-toggle="pill" href="#v-pills-one" role="tab" aria-controls="v-pills-one" aria-selected="true">
						Level 1
					</a>
					<a class="nav-link" id="v-pills-two-tab" data-toggle="pill" href="#v-pills-two" role="tab" aria-controls="v-pills-two" aria-selected="false">
						Level 2
					</a>
					<a class="nav-link" id="v-pills-three-tab" data-toggle="pill" href="#v-pills-three" role="tab" aria-controls="v-pills-three" aria-selected="false">
						Level 3
					</a>
					<a class="nav-link" id="v-pills-four-tab" data-toggle="pill" href="#v-pills-four" role="tab" aria-controls="v-pills-four" aria-selected="false">
						Level 4
					</a>
					<a class="nav-link" id="v-pills-five-tab" data-toggle="pill" href="#v-pills-five" role="tab" aria-controls="v-pills-five" aria-selected="false">
						Level 5
					</a>
				</div>
			</div>
			<div class="col-9">
				<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="v-pills-one" role="tabpanel" aria-labelledby="v-pills-one-tab">
						
						<h1 class="text-center p-3">Level One Words</h1>
						
                        <?php 
                            if (!empty($_SESSION['success_message'])) {
                                echo '<div class="alert alert-success"><h3 class="text-center text-white"> '.$_SESSION['success_message'].'</h3></div>';
                                unset($_SESSION['success_message']);
                            }
    
                            if (!empty($_SESSION['error_message'])) {
                                echo '<div class="alert alert-danger"><h3 class="text-center text-white"> '.$_SESSION['error_message'].'</h3></div>';
                                unset($_SESSION['error_message']);
                            }
                        ?>
						<!-- Horizontal tab level 1-->
						<nav>
							<div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-0-tab" data-toggle="tab" href="#nav-0" role="tab" aria-controls="nav-0" aria-selected="true">One</a>

								<a class="nav-item nav-link" id="nav-1-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1" aria-selected="false">Two</a>

								<a class="nav-item nav-link" id="nav-2-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">Three</a>

								<a class="nav-item nav-link" id="nav-3-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3" aria-selected="false">Four</a>

								<a class="nav-item nav-link" id="nav-4-tab" data-toggle="tab" href="#nav-4" role="tab" aria-controls="nav-4" aria-selected="false">Five</a>
							</div>
						</nav>
						

						<?php
                                
                                $statement = $pdo->prepare("SELECT * FROM `word_table` WHERE type='magoosh' AND level='one' limit 5");
                                $statement->execute();
                                $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                                ?>

						<div class="tab-content text-dark" id="nav-tabContent">
							<?php
								foreach ($results as $key => $result) {
								?>	
							<div class="tab-pane fade show h-75 <?php if($key==0) echo 'active'; ?>" id="nav-<?php echo $key ?>" role="tabpane<?php echo $key ?>" aria-labelledby="nav-<?php echo $key ?>-tab">
                             <div class="container">
                                 	<div class="col-12 col-md-10 col-sm-12  offset-md-1">
                                 		<h1 class="text-center text-white p3 mt-3">	
                                 			<?php echo $result['word']; ?> 
                                 		</h1>
                                 		<h3 class="text-center">
                                 			<?php echo $result['description']; ?> 
                                 		</h3>
                                 	</div>
                                 </div>
							</div>
						<?php } ?>
						</div>
						<!-- Horizontal tab Ends-->
						<div class="row justify-content-center my-5">
							<button class="btn btn-outline-info font-weight-bold text-white p-3 mb-3" data-toggle="modal" data-target="#myModalOne">
								TAKE LEVEL 1 TEST
							</button>
						</div>
					</div>

					<div class="tab-pane fade" id="v-pills-two" role="tabpanel" aria-labelledby="v-pills-two-tab">
						

						<h1 class="text-center p-3">Level Two Words</h1>

                        <?php if (!$level_one_pass) :?> 

                                <div class="alert alert-danger text-center text-white p-5">
                                    <h1>You Have not Completed Level 1 Yet</h1>
                                </div>

                            <?php else: ?>
						
						<!-- Horizontal tab level 2-->
						<nav>
							<div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-levelTwo-0-tab" data-toggle="tab" href="#nav-levelTwo-0" role="tab" aria-controls="nav-0" aria-selected="true">One</a>

								<a class="nav-item nav-link" id="nav-levelTwo-1-tab" data-toggle="tab" href="#nav-levelTwo-1" role="tab" aria-controls="nav-1" aria-selected="false">Two</a>

								<a class="nav-item nav-link" id="nav-levelTwo-2-tab" data-toggle="tab" href="#nav-levelTwo-2" role="tab" aria-controls="nav-2" aria-selected="false">Three</a>

								<a class="nav-item nav-link" id="nav-levelTwo-3-tab" data-toggle="tab" href="#nav-levelTwo-3" role="tab" aria-controls="nav-3" aria-selected="false">Four</a>

								<a class="nav-item nav-link" id="nav-levelTwo-4-tab" data-toggle="tab" href="#nav-levelTwo-4" role="tab" aria-controls="nav-4" aria-selected="false">Five</a>
							</div>
						</nav>
						

				<?php
                                
                    $statement = $pdo->prepare("SELECT * FROM `word_table` WHERE type='magoosh' AND level='two' limit 5");
                    $statement->execute();
                    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                  ?>

					<div class="tab-content text-dark" id="nav-tabContent">
						<?php
							foreach ($results as $key => $result) {
							?>	
						<div class="tab-pane fade show h-75 <?php if($key==0) echo 'active'; ?>" id="nav-levelTwo-<?php echo $key ?>" role="tabpane<?php echo $key ?>" aria-labelledby="nav-levelTwo-<?php echo $key ?>-tab">
                         <div class="container">
                             	<div class="col-12 col-md-10 col-sm-12  offset-md-1">
                             		<h1 class="text-center text-white p3 mt-3">	
                             			<?php echo $result['word']; ?> 
                             		</h1>
                             		<h3 class="text-center">
                             			<?php echo $result['description']; ?> 
                             		</h3>
                             	</div>
                             </div>
						</div>
					<?php } ?>
					</div>
						<!-- Horizontal tab Ends-->
						<div class="row justify-content-center my-5">
							<button class="btn btn-outline-info font-weight-bold text-white p-3 mb-3" data-toggle="modal" data-target="#myModalTwo">
								TAKE LEVEL 2 TEST
							</button>
						</div>

                        <?php endif; ?>
					</div>

					<div class="tab-pane fade" id="v-pills-three" role="tabpanel" aria-labelledby="v-pills-three-tab">
						
						<h1 class="text-center p-3">Level Three Words</h1>
							
							<?php if (!$level_two_pass) :?> 

								<div class="alert alert-danger text-center text-white p-5">
                                	<h1>You Have not Completed Level 2 Yet</h1>
                              	</div>

							<?php else: ?>

							<?php if( (isset($error_message)) && ($error_message!='') ): ?>
                              <div class="alert alert-danger text-center">

                                <h3><?php echo $error_message; ?></h3>
                              </div>
                            <?php endif; ?>

                            
						<!-- Horizontal tab level 3-->
						<nav>
							<div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-levelThree-0-tab" data-toggle="tab" href="#nav-levelThree-0" role="tab" aria-controls="nav-0" aria-selected="true">One</a>

								<a class="nav-item nav-link" id="nav-levelThree-1-tab" data-toggle="tab" href="#nav-levelThree-1" role="tab" aria-controls="nav-1" aria-selected="false">Two</a>

								<a class="nav-item nav-link" id="nav-levelThree-2-tab" data-toggle="tab" href="#nav-levelThree-2" role="tab" aria-controls="nav-2" aria-selected="false">Three</a>

								<a class="nav-item nav-link" id="nav-levelThree-3-tab" data-toggle="tab" href="#nav-levelThree-3" role="tab" aria-controls="nav-3" aria-selected="false">Four</a>

								<a class="nav-item nav-link" id="nav-levelThree-4-tab" data-toggle="tab" href="#nav-levelThree-4" role="tab" aria-controls="nav-4" aria-selected="false">Five</a>
							</div>
						</nav>
						

				<?php
                                
                    $statement = $pdo->prepare("SELECT * FROM `word_table` WHERE type='magoosh' AND level='three' limit 5");
                    $statement->execute();
                    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                  ?>

					<div class="tab-content text-dark" id="nav-tabContent">
						<?php
							foreach ($results as $key => $result) {
							?>	
						<div class="tab-pane fade h-75 <?php if($key==0) echo 'active show'; ?>" id="nav-levelThree-<?php echo $key ?>" role="tabpane<?php echo $key ?>" aria-labelledby="nav-levelThree-<?php echo $key ?>-tab">
                         <div class="container">
                             	<div class="col-12 col-md-10 col-sm-12  offset-md-1">
                             		<h1 class="text-center text-white p3 mt-3">	
                             			<?php echo $result['word']; ?> 
                             		</h1>
                             		<h3 class="text-center">
                             			<?php echo $result['description']; ?> 
                             		</h3>
                             	</div>
                             </div>
						</div>
					<?php } ?>
					</div>
						<!-- Horizontal tab Ends-->
						<div class="row justify-content-center my-5">
							<button class="btn btn-outline-info font-weight-bold text-white p-3 mb-3" data-toggle="modal" data-target="#myModalThree">
								TAKE LEVEL 3 TEST
							</button>
						</div>

						<?php endif ; ?>
					</div>

					<div class="tab-pane fade" id="v-pills-four" role="tabpanel" aria-labelledby="v-pills-four-tab">
						<h1 class="text-center p-3">Level Four Words</h1>
							
							<?php if (!$level_three_pass) :?> 

								<div class="alert alert-danger text-center text-white p-5">
                                	<h1>You Have not Completed Level 3 Yet</h1>
                              	</div>

							<?php else: ?>

                            
						<!-- Horizontal tab level 4-->
					<nav>
							<div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-levelFour-0-tab" data-toggle="tab" href="#nav-levelFour-0" role="tab" aria-controls="nav-0" aria-selected="true">One</a>

								<a class="nav-item nav-link" id="nav-levelFour-1-tab" data-toggle="tab" href="#nav-levelFour-1" role="tab" aria-controls="nav-1" aria-selected="false">Two</a>

								<a class="nav-item nav-link" id="nav-levelFour-2-tab" data-toggle="tab" href="#nav-levelFour-2" role="tab" aria-controls="nav-2" aria-selected="false">Three</a>

								<a class="nav-item nav-link" id="nav-levelFour-3-tab" data-toggle="tab" href="#nav-levelFour-3" role="tab" aria-controls="nav-3" aria-selected="false">Four</a>

								<a class="nav-item nav-link" id="nav-levelFour-4-tab" data-toggle="tab" href="#nav-levelFour-4" role="tab" aria-controls="nav-4" aria-selected="false">Five</a>
							</div>
						</nav>
						

				<?php
                                
                    $statement = $pdo->prepare("SELECT * FROM `word_table` WHERE type='magoosh' AND level='four' limit 5");
                    $statement->execute();
                    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                  ?>

					<div class="tab-content text-dark" id="nav-tabContent">
						<?php
							foreach ($results as $key => $result) {
							?>	
						<div class="tab-pane fade h-75 <?php if($key==0) echo 'active show'; ?>" id="nav-levelFour-<?php echo $key ?>" role="tabpane<?php echo $key ?>" aria-labelledby="nav-levelFour-<?php echo $key ?>-tab">
                         <div class="container">
                             	<div class="col-12 col-md-10 col-sm-12 offset-md-1">
                             		<h1 class="text-center text-white p3 mt-3">	
                             			<?php echo $result['word']; ?> 
                             		</h1>
                             		<h3 class="text-center">
                             			<?php echo $result['description']; ?> 
                             		</h3>
                             	</div>
                             </div>
						</div>
					<?php } ?>
					</div>
						<!-- Horizontal tab Ends-->
						<div class="row justify-content-center my-5">
							<button class="btn btn-outline-info font-weight-bold text-white p-3 mb-3" data-toggle="modal" data-target="#myModalFour">
								TAKE LEVEL 4 TEST
							</button>
						</div>

						<?php endif ; ?>
					</div>

					<div class="tab-pane fade" id="v-pills-five" role="tabpanel" aria-labelledby="v-pills-five-tab">
						<h1 class="text-center p-3">Level Five Words</h1>
							
							<?php if (!$level_four_pass) :?> 

								<div class="alert alert-danger text-center text-white p-5">
                                	<h1>You Have not Completed Level 4 Yet</h1>
                              	</div>

							<?php else: ?>
                            
						<!-- Horizontal tab -->
					<nav>
							<div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-levelThree-0-tab" data-toggle="tab" href="#nav-levelFive-0" role="tab" aria-controls="nav-0" aria-selected="true">One</a>

								<a class="nav-item nav-link" id="nav-levelFive-1-tab" data-toggle="tab" href="#nav-levelFive-1" role="tab" aria-controls="nav-1" aria-selected="false">Two</a>

								<a class="nav-item nav-link" id="nav-levelFive-2-tab" data-toggle="tab" href="#nav-levelFive-2" role="tab" aria-controls="nav-2" aria-selected="false">Five</a>

								<a class="nav-item nav-link" id="nav-levelFive-3-tab" data-toggle="tab" href="#nav-levelFive-3" role="tab" aria-controls="nav-3" aria-selected="false">Four</a>

								<a class="nav-item nav-link" id="nav-levelFive-4-tab" data-toggle="tab" href="#nav-levelFive-4" role="tab" aria-controls="nav-4" aria-selected="false">Five</a>
							</div>
						</nav>
						

				<?php
                                
                    $statement = $pdo->prepare("SELECT * FROM `word_table` WHERE type='magoosh' AND level='five' limit 5");
                    $statement->execute();
                    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                  ?>

					<div class="tab-content text-dark" id="nav-tabContent">
						<?php
							foreach ($results as $key => $result) {
							?>	
						<div class="tab-pane fade h-75 <?php if($key==0) echo 'active show'; ?>" id="nav-levelFive-<?php echo $key ?>" role="tabpane<?php echo $key ?>" aria-labelledby="nav-levelFive-<?php echo $key ?>-tab">
                         <div class="container">
                             	<div class="col-12 col-md-10 col-sm-12  offset-md-1">
                             		<h1 class="text-center text-white p3 mt-3">	
                             			<?php echo $result['word']; ?> 
                             		</h1>
                             		<h3 class="text-center">
                             			<?php echo $result['description']; ?> 
                             		</h3>
                             	</div>
                             </div>
						</div>
					<?php } ?>
					</div>
						<!-- Horizontal tab Ends-->
						<div class="row justify-content-center my-5">
							<button class="btn btn-outline-info font-weight-bold text-white p-3 mb-3" data-toggle="modal" data-target="#myModalFive">
								TAKE LEVEL 5 TEST
							</button>
						</div>

						<?php endif ; ?>
					</div>
				</div>
			</div>
		</div>

	</div>

<!--====================== The Modal One =========================================================-->
<div class="modal fade" id="myModalOne">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      	<div class="modal-header">
        	<h4 class="modal-title">Level One Questions</h4>
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>

      <!-- Modal body -->
      	<div class="modal-body">

			<?php
                    /* Level One Question magoosh*/
                    $ques_id='';
                    $correct_ans = '';
                    $correct_ans_two = '';
                    $correct_ans_three = '';

                    $statementOne = $pdo->prepare("SELECT * FROM magoosh_level_one_question ORDER BY RAND() limit 3");
                    $statementOne->execute();
                    $resultOne = $statementOne->fetchAll(PDO::FETCH_ASSOC);

                    /* Get Random First Question */
                    $ques_id = $resultOne[0]['id'];
                    $random_question =  $resultOne[0]['question'];
                    $correct_ans = $resultOne[0]['answer'];

                    /* Get Random Second Question */
                    $ques_id_two = $resultOne[1]['id'];
                    $random_question_two =  $resultOne[1]['question'];
                    $correct_ans_two = $resultOne[1]['answer'];

                    /* Get Random Third Question */
                    $ques_id_three = $resultOne[2]['id'];
                    $random_question_three =  $resultOne[2]['question'];
                    $correct_ans_three = $resultOne[2]['answer'];

                    $ModalQuestionOne = $pdo->prepare("SELECT * FROM magoosh_level_one_question_option where magoosh_level_one_question_option.question_id = ".$ques_id." limit 4");
                    $ModalQuestionOne->execute();
                    $resultModalOne = $ModalQuestionOne->fetchAll(PDO::FETCH_ASSOC); 

                    $ModalQuestionTwo = $pdo->prepare("SELECT * FROM magoosh_level_one_question_option where magoosh_level_one_question_option.question_id = ".$ques_id_two." limit 4");
                    $ModalQuestionTwo->execute();
                    $resultModalTwo = $ModalQuestionTwo->fetchAll(PDO::FETCH_ASSOC); 

                    $ModalQuestionThree = $pdo->prepare("SELECT * FROM magoosh_level_one_question_option where magoosh_level_one_question_option.question_id = ".$ques_id_three." limit 4");
                    $ModalQuestionThree->execute();
                    $resultModalThree = $ModalQuestionThree->fetchAll(PDO::FETCH_ASSOC); ?>

                    <form action="form/magoosh_level_one.php" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
						
						<h5>Q: <b> <?php echo $random_question;  ?> ?</b></h5>
        				<hr>

                        <input type="hidden" name="question_id" value="<?php echo $ques_id ?>">

                        <?php foreach ($resultModalOne as $row3) {
                            
                        ?>
                       	<input type="radio" class="form-check-group" name="answer" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>

                        <br><hr>

                        <h5>Q: <b> <?php echo $random_question_two;  ?> ?</b></h5>
        				<hr>
                        
                        <input type="hidden" name="question_id_two" value="<?php echo $ques_id_two ?>">

                        <?php foreach ($resultModalTwo as $row3) {
                            
                        ?>
                       	<input type="radio" class="form-check-group" name="answer2" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>
						
						<br><hr>

                        <h5>Q: <b> <?php echo $random_question_three;  ?> ?</b></h5>
        				<hr>

                        <input type="hidden" name="question_id_three" value="<?php echo $ques_id_three ?>">

                        <?php foreach ($resultModalThree as $row3) {
                            
                        ?>
                       	<input type="radio" class="form-check-group" name="answer3" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>

      	</div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button class="btn btn-success btn-block" type="submit" name="submit"> Submit </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
					</form>
    </div>
  </div>
</div>

<!--====================== My Modal Two ==========================================================-->
<div class="modal fade" id="myModalTwo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      	<div class="modal-header">
        	<h4 class="modal-title">Level Two Questions</h4>
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>
		
      <!-- Modal body -->
      	<div class="modal-body">
			
			<?php

                /* Getting Level 2 Question randomly with answer */
                $level_two_ques_id='';
                $level_two_ques_id_two='';
                $level_two_ques_id_three='';


                $level_two_statementOne = $pdo->prepare("SELECT * FROM magoosh_level_two_question ORDER BY RAND() limit 3");
                $level_two_statementOne->execute();
                $level_two_resultOne = $level_two_statementOne->fetchAll(PDO::FETCH_ASSOC);

                /* Get Random First Question */
                $level_two_ques_id = $level_two_resultOne[0]['id'];
                $level_two_random_question =  $level_two_resultOne[0]['question'];

                /* Get Random Second Question */
                $level_two_ques_id_two = $level_two_resultOne[1]['id'];
                $level_two_random_question_two =  $level_two_resultOne[1]['question'];

                /* Get Random Third Question */
                $level_two_ques_id_three = $level_two_resultOne[2]['id'];
                $level_two_random_question_three =  $level_two_resultOne[2]['question'];


                    /* Getting Level 2 Question option */
                    $level_two_ModalQuestionOne = $pdo->prepare("SELECT * FROM magoosh_level_two_question_option where magoosh_level_two_question_option.question_id = ".$level_two_ques_id." limit 4");
                    $level_two_ModalQuestionOne->execute();
                    $level_two_resultModalOne = $level_two_ModalQuestionOne->fetchAll(PDO::FETCH_ASSOC); 

                    $level_two_ModalQuestionTwo = $pdo->prepare("SELECT * FROM magoosh_level_two_question_option where magoosh_level_two_question_option.question_id = ".$level_two_ques_id_two." limit 4");
                    $level_two_ModalQuestionTwo->execute();
                    $level_two_resultModalTwo = $level_two_ModalQuestionTwo->fetchAll(PDO::FETCH_ASSOC); 

                    $level_two_ModalQuestionThree = $pdo->prepare("SELECT * FROM magoosh_level_two_question_option where magoosh_level_two_question_option.question_id = ".$level_two_ques_id_three." limit 4");
                    $level_two_ModalQuestionThree->execute();
                    $level_two_resultModalThree = $level_two_ModalQuestionThree->fetchAll(PDO::FETCH_ASSOC); ?>

                    <form action="form/magoosh_level_two.php" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
						
						<h5>Q: <b> <?php echo $level_two_random_question;  ?> ?</b></h5>
        				<hr>
                        <input type="hidden" name="level_two_ques_id" value="<?php echo $level_two_ques_id ?>">

                        <?php foreach ($level_two_resultModalOne as $row3) {
                            
                        ?>
                       	<input type="radio" class="form-check-group" name="level_two_answer" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>

                        <br><hr>

                        <h5>Q: <b> <?php echo $level_two_random_question_two;  ?> ?</b></h5>
        				<hr>
                        <input type="hidden" name="level_two_ques_id_two" value="<?php echo $level_two_ques_id_two ?>">

                        <?php foreach ($level_two_resultModalTwo as $row3) {
                            
                        ?>
                       	<input type="radio" class="form-check-group" name="level_two_answer2" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>
						
						<br><hr>

                        <h5>Q: <b> <?php echo $level_two_random_question_three;  ?> ?</b></h5>
        				<hr>
                        <input type="hidden" name="level_two_ques_id_three" value="<?php echo $level_two_ques_id_three ?>">

                        <?php foreach ($level_two_resultModalThree as $row3) {
                            
                        ?>
                       	<input type="radio" class="form-check-group" name="level_two_answer3" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>

      	</div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button class="btn btn-success btn-block" type="submit" name="level_two_submit"> Submit </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
					</form>
    </div>
  </div>
</div>

<!--====================== My Modal Three =======================================================-->
<div class="modal fade" id="myModalThree">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      	<div class="modal-header">
        	<h4 class="modal-title">Level Three Questions</h4>
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>
		
      <!-- Modal body -->
      	<div class="modal-body">
			
			<?php

            /* Level Three Question Barron*/
                $level_three_ques_id='';
                $level_three_ques_id_two='';
                $level_three_ques_id_three='';

                $level_three_statementOne = $pdo->prepare("SELECT * FROM magoosh_level_three_question ORDER BY RAND() limit 3");
                $level_three_statementOne->execute();
                $level_three_resultOne = $level_three_statementOne->fetchAll(PDO::FETCH_ASSOC);

                /* Get Random First Question */
                $level_three_ques_id = $level_three_resultOne[0]['id'];
                $level_three_random_question =  $level_three_resultOne[0]['question'];

                /* Get Random Second Question */
                $level_three_ques_id_two = $level_three_resultOne[1]['id'];
                $level_three_random_question_two =  $level_three_resultOne[1]['question'];

                /* Get Random Third Question */
                $level_three_ques_id_three = $level_three_resultOne[2]['id'];
                $level_three_random_question_three =  $level_three_resultOne[2]['question'];


                    $level_three_ModalQuestionOne = $pdo->prepare("SELECT * FROM magoosh_level_three_question_option where magoosh_level_three_question_option.question_id = ".$level_three_ques_id." limit 4");
                    $level_three_ModalQuestionOne->execute();
                    $level_three_resultModalOne = $level_three_ModalQuestionOne->fetchAll(PDO::FETCH_ASSOC); 

                    $level_three_ModalQuestionTwo = $pdo->prepare("SELECT * FROM magoosh_level_three_question_option where magoosh_level_three_question_option.question_id = ".$level_three_ques_id_two." limit 4");
                    $level_three_ModalQuestionTwo->execute();
                    $level_three_resultModalTwo = $level_three_ModalQuestionTwo->fetchAll(PDO::FETCH_ASSOC); 

                    $level_three_ModalQuestionThree = $pdo->prepare("SELECT * FROM magoosh_level_three_question_option where magoosh_level_three_question_option.question_id = ".$level_three_ques_id_three." limit 4");
                    $level_three_ModalQuestionThree->execute();
                    $level_three_resultModalThree = $level_three_ModalQuestionThree->fetchAll(PDO::FETCH_ASSOC); ?>

                    <form action="form/magoosh_level_three.php" method="post">

                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
						
						<h5>Q: <b> <?php echo $level_three_random_question;  ?> ?</b></h5>
        				<hr>

                        <input type="hidden" name="level_three_ques_id" value="<?php echo $level_three_ques_id ?>">

                        <?php foreach ($level_three_resultModalOne as $row3) {
                            
                        ?>
                       	<input type="radio" class="form-check-group" name="level_three_answer" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>

                        <br><hr>

                        <h5>Q: <b> <?php echo $level_three_random_question_two;  ?> ?</b></h5>
        				<hr>

                        <input type="hidden" name="level_three_ques_id_two" value="<?php echo $level_three_ques_id_two ?>">

                        <?php foreach ($level_three_resultModalTwo as $row3) {
                            
                        ?>
                       	
                            <input type="radio" class="form-check-group" name="level_three_answer2" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>
						
						<br><hr>

                        <h5>Q: <b> <?php echo $level_three_random_question_three;  ?> ?</b></h5>
        				<hr>

                        <input type="hidden" name="level_three_ques_id_three" value="<?php echo $level_three_ques_id_three ?>">

                        <?php foreach ($level_three_resultModalThree as $row3) {
                            
                        ?>
                       	<input type="radio" class="form-check-group" name="level_three_answer3" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>

      	</div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button class="btn btn-success btn-block" type="submit" name="level_three_submit"> Submit </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
					</form>
    </div>
  </div>
</div>

<!--====================== My Modal Four End ====================================================-->
<div class="modal fade" id="myModalFour">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Level Four Questions</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
      <!-- Modal body -->
        <div class="modal-body">
            
            <?php

            /* Level Three Question Barron*/
                $level_four_ques_id='';
                $level_four_ques_id_two='';
                $level_four_ques_id_three='';

                $level_four_statementOne = $pdo->prepare("SELECT * FROM magoosh_level_four_question ORDER BY RAND() limit 3");
                $level_four_statementOne->execute();
                $level_four_resultOne = $level_four_statementOne->fetchAll(PDO::FETCH_ASSOC);

                /* Get Random First Question */
                $level_four_ques_id = $level_four_resultOne[0]['id'];
                $level_four_random_question =  $level_four_resultOne[0]['question'];

                /* Get Random Second Question */
                $level_four_ques_id_two = $level_four_resultOne[1]['id'];
                $level_four_random_question_two =  $level_four_resultOne[1]['question'];

                /* Get Random Third Question */
                $level_four_ques_id_three = $level_four_resultOne[2]['id'];
                $level_four_random_question_three =  $level_four_resultOne[2]['question'];


                    $level_four_ModalQuestionOne = $pdo->prepare("SELECT * FROM magoosh_level_four_question_option where magoosh_level_four_question_option.question_id = ".$level_four_ques_id." limit 4");
                    $level_four_ModalQuestionOne->execute();
                    $level_four_resultModalOne = $level_four_ModalQuestionOne->fetchAll(PDO::FETCH_ASSOC); 

                    $level_four_ModalQuestionTwo = $pdo->prepare("SELECT * FROM magoosh_level_four_question_option where magoosh_level_four_question_option.question_id = ".$level_four_ques_id_two." limit 4");
                    $level_four_ModalQuestionTwo->execute();
                    $level_four_resultModalTwo = $level_four_ModalQuestionTwo->fetchAll(PDO::FETCH_ASSOC); 

                    $level_four_ModalQuestionThree = $pdo->prepare("SELECT * FROM magoosh_level_four_question_option where magoosh_level_four_question_option.question_id = ".$level_four_ques_id_three." limit 4");
                    $level_four_ModalQuestionThree->execute();
                    $level_four_resultModalThree = $level_four_ModalQuestionThree->fetchAll(PDO::FETCH_ASSOC); ?>

                    <form action="form/magoosh_level_four.php" method="post">

                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
                        
                        <h5>Q: <b> <?php echo $level_four_random_question;  ?> ?</b></h5>
                        <hr>

                        <input type="hidden" name="level_four_ques_id" value="<?php echo $level_four_ques_id ?>">

                        <?php foreach ($level_four_resultModalOne as $row3) {
                            
                        ?>
                        <input type="radio" class="form-check-group" name="level_four_answer" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>

                        <br><hr>

                        <h5>Q: <b> <?php echo $level_four_random_question_two;  ?> ?</b></h5>
                        <hr>

                        <input type="hidden" name="level_four_ques_id_two" value="<?php echo $level_four_ques_id_two ?>">

                        <?php foreach ($level_four_resultModalTwo as $row3) {
                            
                        ?>
                        
                            <input type="radio" class="form-check-group" name="level_four_answer2" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>
                        
                        <br><hr>

                        <h5>Q: <b> <?php echo $level_four_random_question_three;  ?> ?</b></h5>
                        <hr>

                        <input type="hidden" name="level_four_ques_id_three" value="<?php echo $level_four_ques_id_three ?>">

                        <?php foreach ($level_four_resultModalThree as $row3) {
                            
                        ?>
                        <input type="radio" class="form-check-group" name="level_four_answer3" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>

        </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-success btn-block" type="submit" name="level_four_submit"> Submit </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
                    </form>
    </div>
  </div>
</div>

<!--====================== My Modal Five End ====================================================-->
<div class="modal fade" id="myModalFive">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Level Five Questions</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
      <!-- Modal body -->
        <div class="modal-body">
            
            <?php

            /* Level Three Question Barron*/
                $level_five_ques_id='';
                $level_five_ques_id_two='';
                $level_five_ques_id_three='';

                $level_five_statementOne = $pdo->prepare("SELECT * FROM magoosh_level_five_question ORDER BY RAND() limit 3");
                $level_five_statementOne->execute();
                $level_five_resultOne = $level_five_statementOne->fetchAll(PDO::FETCH_ASSOC);

                /* Get Random First Question */
                $level_five_ques_id = $level_five_resultOne[0]['id'];
                $level_five_random_question =  $level_five_resultOne[0]['question'];

                /* Get Random Second Question */
                $level_five_ques_id_two = $level_five_resultOne[1]['id'];
                $level_five_random_question_two =  $level_five_resultOne[1]['question'];

                /* Get Random Third Question */
                $level_five_ques_id_three = $level_five_resultOne[2]['id'];
                $level_five_random_question_three =  $level_five_resultOne[2]['question'];


                    $level_five_ModalQuestionOne = $pdo->prepare("SELECT * FROM magoosh_level_five_question_option where magoosh_level_five_question_option.question_id = ".$level_five_ques_id." limit 4");
                    $level_five_ModalQuestionOne->execute();
                    $level_five_resultModalOne = $level_five_ModalQuestionOne->fetchAll(PDO::FETCH_ASSOC); 

                    $level_five_ModalQuestionTwo = $pdo->prepare("SELECT * FROM magoosh_level_five_question_option where magoosh_level_five_question_option.question_id = ".$level_five_ques_id_two." limit 4");
                    $level_five_ModalQuestionTwo->execute();
                    $level_five_resultModalTwo = $level_five_ModalQuestionTwo->fetchAll(PDO::FETCH_ASSOC); 

                    $level_five_ModalQuestionThree = $pdo->prepare("SELECT * FROM magoosh_level_five_question_option where magoosh_level_five_question_option.question_id = ".$level_five_ques_id_three." limit 4");
                    $level_five_ModalQuestionThree->execute();
                    $level_five_resultModalThree = $level_five_ModalQuestionThree->fetchAll(PDO::FETCH_ASSOC); ?>

                    <form action="form/magoosh_level_five.php" method="post">

                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
                        
                        <h5>Q: <b> <?php echo $level_five_random_question;  ?> ?</b></h5>
                        <hr>

                        <input type="hidden" name="level_five_ques_id" value="<?php echo $level_five_ques_id ?>">

                        <?php foreach ($level_five_resultModalOne as $row3) {
                            
                        ?>
                        <input type="radio" class="form-check-group" name="level_five_answer" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>

                        <br><hr>

                        <h5>Q: <b> <?php echo $level_five_random_question_two;  ?> ?</b></h5>
                        <hr>

                        <input type="hidden" name="level_five_ques_id_two" value="<?php echo $level_five_ques_id_two ?>">

                        <?php foreach ($level_five_resultModalTwo as $row3) {
                            
                        ?>
                        
                            <input type="radio" class="form-check-group" name="level_five_answer2" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>
                        
                        <br><hr>

                        <h5>Q: <b> <?php echo $level_five_random_question_three;  ?> ?</b></h5>
                        <hr>

                        <input type="hidden" name="level_five_ques_id_three" value="<?php echo $level_five_ques_id_three ?>">

                        <?php foreach ($level_five_resultModalThree as $row3) {
                            
                        ?>
                        <input type="radio" class="form-check-group" name="level_five_answer3" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>

        </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-success btn-block" type="submit" name="level_five_submit"> Submit </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
                    </form>
    </div>
  </div>
</div>

<?php require 'footer.php'; ?>