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

      // Check if the user is logged in or not
        if(!isset($_SESSION['user'])) {
            $loggedIn = false;
            header('location: signin.php');
            exit;
        }else{
        	$loggedIn = true;
        }

    	$ques_id='';
        $correct_ans = '';
        $correct_ans_two = '';
        $correct_ans_three = '';

        $statementOne = $pdo->prepare("SELECT * FROM level_one_question ORDER BY RAND() limit 3");
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

        if (isset($_POST['submit'])) {
            if(empty($_POST['answer']) || empty($_POST['answer2']) || empty($_POST['answer3']) ) {
                $error_message = 'You Must Answer All The Question';
            } else {
                  $user_id = $_POST['user_id'];
                  $answer = $_POST['answer'];
                  $answer2 = $_POST['answer2'];
                  $answer3 = $_POST['answer3'];

                  if ($answer == $correct_ans && $answer2 == $correct_ans_two && $answer3 == $correct_ans_three ) {

                    $sql1 = $pdo->prepare("SELECT * FROM barron_word_settings WHERE user_id=?");
                    $sql1->execute(array($_POST['user_id']));
                    $totalrow = $sql1->rowCount();              
                    if($totalrow) {
                        $error_message .= 'You already Passed Level 1';
                    }else{

                        $sql = $pdo->prepare("INSERT INTO barron_word_settings (levelOne,user_id) VALUES (?,?)");
                        $sql->execute(array('Completed',$_POST['user_id']));
                        $success_message = "Your Answer is Correct !!";

                    }
                    unset($_POST['answer']);
                  }else{
                    $error_message = "Your All Answer is not correct" ;
                    unset($_POST['answer']);
                  }
              }
        }


        /* Level One Check whether he or She Passed The Level or Not */

        $level_sql = $pdo->prepare("SELECT * FROM barron_word_settings WHERE user_id=?");
        $level_sql->execute(array($user_id));
        $level_pass = $level_sql->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($level_pass)) {
                if ($level_pass[0]['levelOne'] == 'Completed') {
                    $level_one_pass = true;
                }else{
                	$level_one_pass = false;
                    $level_one_check_message="You Have not completed Level One Words Yet";
                }
            }




	require 'navbar.php';
?>

	<div class="container-fluid my-3" style="height: 100vh">
		<div class="heading_section my-3">
			<h2 class="text-center">Barron Word Practice</h2>
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
							

							<?php if( (isset($error_message)) && ($error_message!='') ): ?>
                              <div class="alert alert-danger text-center text-white">

                                <h3><?php echo $error_message; ?></h3>
                              </div>
                            <?php endif; ?>

                            <?php if($success_message): ?>
                              <div class="alert alert-success text-center text-white">
								<h3><?php echo $success_message; ?></h3>
                              </div>
                            <?php endif; ?>
						<!-- Horizontal tab -->
						<nav>
							<div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">One</a>

								<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Two</a>

								<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Three</a>

								<a class="nav-item nav-link" id="nav-four-tab" data-toggle="tab" href="#nav-four" role="tab" aria-controls="nav-contact" aria-selected="false">Four</a>

								<a class="nav-item nav-link" id="nav-five-tab" data-toggle="tab" href="#nav-five" role="tab" aria-controls="nav-contact" aria-selected="false">Five</a>
							</div>
						</nav>
						

						<?php
                                
                                $statement = $pdo->prepare("SELECT * FROM level_one_word_barron where id BETWEEN 1 AND 5");
                                $statement->execute();
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);

                                ?>

						<div class="tab-content text-dark" id="nav-tabContent">
							<div class="tab-pane fade show active h-75" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                 

                                 <div class="container">
                                 	<div class="col-12 col-md-10 col-sm-12  offset-md-1">
                                 		<h1 class="text-center text-white p3 mt-3">
                                 			<?php echo $result[0]['word_name']; ?>		
                                 		</h1>
                                 		<h3 class="text-center">
                                 			<?php echo $result[0]['description']; ?>
                                 		</h3>
                                 	</div>
                                 </div>

							</div>
							<div class="tab-pane fade h-75" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
								
								<div class="container">
                                 	<div class="col-12 col-md-10 col-sm-12  offset-md-1">
										<h1 class="text-center text-white p3 mt-3">
											<?php echo $result[1]['word_name']; ?>
										</h1>
	                               		<h3 class="text-center">
	                                		<?php echo $result[1]['description']; ?>	
	                                	</h3>
	                                </div>
	                            </div>

							</div>
							<div class="tab-pane fade h-75" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
								
								<div class="container">
                                 	<div class="col-12 col-md-10 col-sm-12  offset-md-1">
										<h1 class="text-center text-white p3 mt-3">
											<?php echo $result[2]['word_name']; ?>
										</h1>
	                               		<h3 class="text-center">
	                                		<?php echo $result[2]['description']; ?>	
	                                	</h3>
	                                </div>
	                            </div>

							</div>
							<div class="tab-pane fade h-75" id="nav-four" role="tabpanel" aria-labelledby="nav-contact-tab">

								<div class="container">
                                 	<div class="col-12 col-md-10 col-sm-12  offset-md-1">
										<h1 class="text-center text-white p3 mt-3">
											<?php echo $result[3]['word_name']; ?>
										</h1>
	                               		<h3 class="text-center">
	                                		<?php echo $result[3]['description']; ?>	
	                                	</h3>
	                                </div>
	                            </div>

							</div>
							<div class="tab-pane fade h-75" id="nav-five" role="tabpanel" aria-labelledby="nav-contact-tab">

								<div class="container">
                                 	<div class="col-12 col-md-10 col-sm-12  offset-md-1">
										<h1 class="text-center text-white p3 mt-3">
											<?php echo $result[4]['word_name']; ?>
										</h1>
	                               		<h3 class="text-center">
	                                		<?php echo $result[4]['description']; ?>	
	                                	</h3>
	                                </div>
	                            </div>

							</div>
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
                                	<h1>You Have not Completed Level 1 Words Yet</h1>
                              	</div>

							<?php else: ?>

							<?php if( (isset($error_message)) && ($error_message!='') ): ?>
                              <div class="alert alert-danger text-center">

                                <h3><?php echo $error_message; ?></h3>
                              </div>
                            <?php endif; ?>

                            <?php if($success_message): ?>
                              <div class="alert alert-success text-center text-white">
								<h3><?php echo $success_message; ?></h3>
                              </div>
                            <?php endif; ?>
						<!-- Horizontal tab -->
						<nav>
							<div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-six-tab" data-toggle="tab" href="#nav-six" role="tab" aria-controls="nav-six" aria-selected="true">One</a>

								<a class="nav-item nav-link" id="nav-seven-tab" data-toggle="tab" href="#nav-seven" role="tab" aria-controls="nav-seven" aria-selected="false">Two</a>

								<a class="nav-item nav-link" id="nav-eight-tab" data-toggle="tab" href="#nav-eight" role="tab" aria-controls="nav-eight" aria-selected="false">Three</a>

								<a class="nav-item nav-link" id="nav-nine" data-toggle="tab" href="#nav-nine" role="tab" aria-controls="nav-nine" aria-selected="false">Four</a>

								<a class="nav-item nav-link" id="nav-ten-tab" data-toggle="tab" href="#nav-ten" role="tab" aria-controls="nav-ten" aria-selected="false">Five</a>
							</div>
						</nav>
						

						<?php
                                
                                $statementTwo = $pdo->prepare("SELECT * FROM level_one_word_barron where id BETWEEN 6 AND 10");
                                $statementTwo->execute();
                                $resultTwo = $statementTwo->fetchAll(PDO::FETCH_ASSOC);
                                ?>

						<div class="tab-content text-dark" id="nav-tabContent">
							<div class="tab-pane fade show active h-75" id="nav-six" role="tabpanel" aria-labelledby="nav-six-tab">

                                 

                                 <div class="container">
                                 	<div class="col-12 col-md-10 col-sm-12  offset-md-1">
                                 		<h1 class="text-center text-white p3 mt-3">
                                 			<?php echo $resultTwo[0]['word_name']; ?>		
                                 		</h1>
                                 		<h3 class="text-center">
                                 			<?php echo $resultTwo[0]['description']; ?>
                                 		</h3>
                                 	</div>
                                 </div>

							</div>
							<div class="tab-pane fade h-75" id="nav-seven" role="tabpanel" aria-labelledby="nav-seven-tab">
								
								<div class="container">
                                 	<div class="col-12 col-md-10 col-sm-12  offset-md-1">
										<h1 class="text-center text-white p3 mt-3">
											<?php echo $resultTwo[1]['word_name']; ?>
										</h1>
	                               		<h3 class="text-center">
	                                		<?php echo $resultTwo[1]['description']; ?>	
	                                	</h3>
	                                </div>
	                            </div>

							</div>
							<div class="tab-pane fade h-75" id="nav-eight" role="tabpanel" aria-labelledby="nav-eight-tab">
								
								<div class="container">
                                 	<div class="col-12 col-md-10 col-sm-12  offset-md-1">
										<h1 class="text-center text-white p3 mt-3">
											<?php echo $resultTwo[2]['word_name']; ?>
										</h1>
	                               		<h3 class="text-center">
	                                		<?php echo $resultTwo[2]['description']; ?>	
	                                	</h3>
	                                </div>
	                            </div>

							</div>
							<div class="tab-pane fade h-75" id="nav-nine" role="tabpanel" aria-labelledby="nav-nine-tab">

								<div class="container">
                                 	<div class="col-12 col-md-10 col-sm-12  offset-md-1">
										<h1 class="text-center text-white p3 mt-3">
											<?php echo $resultTwo[3]['word_name']; ?>
										</h1>
	                               		<h3 class="text-center">
	                                		<?php echo $resultTwo[3]['description']; ?>	
	                                	</h3>
	                                </div>
	                            </div>

							</div>
							<div class="tab-pane fade h-75" id="nav-ten" role="tabpanel" aria-labelledby="nav-ten-tab">

								<div class="container">
                                 	<div class="col-12 col-md-10 col-sm-12  offset-md-1">
										<h1 class="text-center text-white p3 mt-3">
											<?php echo $resultTwo[4]['word_name']; ?>
										</h1>
	                               		<h3 class="text-center">
	                                		<?php echo $resultTwo[4]['description']; ?>	
	                                	</h3>
	                                </div>
	                            </div>

							</div>
						</div>
						<!-- Horizontal tab Ends-->
						<div class="row justify-content-center my-5">
							<button class="btn btn-outline-info font-weight-bold text-white p-3 mb-3" data-toggle="modal" data-target="#myModalOne">
								TAKE LEVEL 2 TEST
							</button>
						</div>

						<?php endif ; ?>
					</div>

					<div class="tab-pane fade" id="v-pills-three" role="tabpanel" aria-labelledby="v-pills-three-tab">
						<h1>Hello 3</h1>
					</div>

					<div class="tab-pane fade" id="v-pills-four" role="tabpanel" aria-labelledby="v-pills-four-tab">
						<h1>Hello 4</h1>
					</div>

					<div class="tab-pane fade" id="v-pills-five" role="tabpanel" aria-labelledby="v-pills-five-tab">
						<h1>Hello 5</h1>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- The Modal -->
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
                    $ModalQuestionOne = $pdo->prepare("SELECT * FROM level_one_question_option where level_one_question_option.question_id = ".$ques_id." limit 4");
                    $ModalQuestionOne->execute();
                    $resultModalOne = $ModalQuestionOne->fetchAll(PDO::FETCH_ASSOC); 

                    $ModalQuestionTwo = $pdo->prepare("SELECT * FROM level_one_question_option where level_one_question_option.question_id = ".$ques_id_two." limit 4");
                    $ModalQuestionTwo->execute();
                    $resultModalTwo = $ModalQuestionTwo->fetchAll(PDO::FETCH_ASSOC); 

                    $ModalQuestionThree = $pdo->prepare("SELECT * FROM level_one_question_option where level_one_question_option.question_id = ".$ques_id_three." limit 4");
                    $ModalQuestionThree->execute();
                    $resultModalThree = $ModalQuestionThree->fetchAll(PDO::FETCH_ASSOC); ?>

                    <form action="" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
						
						<h5>Q: <b> <?php echo $random_question;  ?> ?</b></h5>
        				<hr>

                        <?php foreach ($resultModalOne as $row3) {
                            
                        ?>
                       	<input type="radio" class="form-check-group" name="answer" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>

                        <br><hr>

                        <h5>Q: <b> <?php echo $random_question_two;  ?> ?</b></h5>
        				<hr>

                        <?php foreach ($resultModalTwo as $row3) {
                            
                        ?>
                       	<input type="radio" class="form-check-group" name="answer2" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>
						
						<br><hr>

                        <h5>Q: <b> <?php echo $random_question_three;  ?> ?</b></h5>
        				<hr>

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

	<?php require 'footer.php'; ?>