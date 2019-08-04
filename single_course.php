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
        $level_sql = $pdo->prepare("SELECT * FROM barron_word_settings WHERE user_id=?");
        $level_sql->execute(array($user_id));
        $level_pass = $level_sql->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($level_pass)) {
                if ($level_pass[0]['levelOne'] == 'Completed') {
                    $level_one_pass = true;
                    
                    if ($level_pass[0]['levelTwo'] == 'Completed') {
                    	$level_two_pass = true;

                        if ($level_pass[0]['levelThree'] == 'Completed') {
                            $level_three_pass = true;

                            if ($level_pass[0]['levelFour'] == 'Completed') {
                                $level_four_pass = true;

                                if ($level_pass[0]['levelFive'] == 'Completed') {
                                    
                                    $level_five_pass = true;
                                    $user_status = $pdo->prepare("SELECT * FROM settings WHERE user_id=?");
                                    $user_status->execute(array($user_id));
                                    $totalrow = $user_status->rowCount();              
                                    if($totalrow){
                                        $_SESSION['error_message'] = 'Your Already Completed Barron Level';
                                    }else{
                                        
                                        $status = $pdo->prepare("INSERT INTO settings (barron,user_id) VALUES (?,?)");
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
                                    <h1>You Have not Completed Level 1 Yet</h1>
                                </div>

                            <?php else: ?>
						
						<!-- Horizontal tab -->
						<nav>
							<div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-six-tab" data-toggle="tab" href="#nav-six" role="tab" aria-controls="nav-six" aria-selected="true">One</a>

								<a class="nav-item nav-link" id="nav-seven-tab" data-toggle="tab" href="#nav-seven" role="tab" aria-controls="nav-seven" aria-selected="false">Two</a>

								<a class="nav-item nav-link" id="nav-eight-tab" data-toggle="tab" href="#nav-eight" role="tab" aria-controls="nav-eight" aria-selected="false">Three</a>

								<a class="nav-item nav-link" id="nav-nine-tab" data-toggle="tab" href="#nav-nine" role="tab" aria-controls="nav-nine" aria-selected="false">Four</a>

								<a class="nav-item nav-link" id="nav-ten-tab" data-toggle="tab" href="#nav-ten" role="tab" aria-controls="nav-ten" aria-selected="false">Five</a>
							</div>
						</nav>
						

						<?php
                                
                                $statementTwo = $pdo->prepare("SELECT * FROM level_two_word_barron where id BETWEEN 1 AND 5");
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

                            
						<!-- Horizontal tab -->
						<nav>
							<div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-eleven-tab" data-toggle="tab" href="#nav-eleven" role="tab" aria-controls="nav-eleven" aria-selected="true">One</a>

								<a class="nav-item nav-link" id="nav-twelve-tab" data-toggle="tab" href="#nav-twelve" role="tab" aria-controls="nav-twelve" aria-selected="false">Two</a>

								<a class="nav-item nav-link" id="nav-thirteen-tab" data-toggle="tab" href="#nav-thirteen" role="tab" aria-controls="nav-thirteen" aria-selected="false">Three</a>

								<a class="nav-item nav-link" id="nav-fourteen-tab" data-toggle="tab" href="#nav-fourteen" role="tab" aria-controls="nav-fourteen" aria-selected="false">Four</a>

								<a class="nav-item nav-link" id="nav-fifteen-tab" data-toggle="tab" href="#nav-fifteen" role="tab" aria-controls="nav-fifteen" aria-selected="false">Five</a>
							</div>
						</nav>
						

						<?php
                                
                                $level_three_statementTwo = $pdo->prepare("SELECT * FROM level_three_word_barron where id BETWEEN 1 AND 5");
                                $level_three_statementTwo->execute();
                                $resultTwo = $level_three_statementTwo->fetchAll(PDO::FETCH_ASSOC);
                                ?>

						<div class="tab-content text-dark" id="nav-tabContent">
							<div class="tab-pane fade show active h-75" id="nav-eleven" role="tabpanel" aria-labelledby="nav-eleven-tab">

                                 

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
							<div class="tab-pane fade h-75" id="nav-twelve" role="tabpanel" aria-labelledby="nav-twelve-tab">
								
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
							<div class="tab-pane fade h-75" id="nav-thirteen" role="tabpanel" aria-labelledby="nav-thirteen-tab">
								
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
							<div class="tab-pane fade h-75" id="nav-fourteen" role="tabpanel" aria-labelledby="nav-fourteen-tab">

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
							<div class="tab-pane fade h-75" id="nav-fifteen" role="tabpanel" aria-labelledby="nav-fifteen-tab">

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

                            
						<!-- Horizontal tab -->
						<nav>
							<div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-sixteen-tab" data-toggle="tab" href="#nav-sixteen" role="tab" aria-controls="nav-sixteen" aria-selected="true">One</a>

								<a class="nav-item nav-link" id="nav-seventeen-tab" data-toggle="tab" href="#nav-seventeen" role="tab" aria-controls="nav-seventeen" aria-selected="false">Two</a>

								<a class="nav-item nav-link" id="nav-eighteen-tab" data-toggle="tab" href="#nav-eighteen" role="tab" aria-controls="nav-eighteen" aria-selected="false">Three</a>

								<a class="nav-item nav-link" id="nav-nineteen-tab" data-toggle="tab" href="#nav-nineteen" role="tab" aria-controls="nav-nineteen" aria-selected="false">Four</a>

								<a class="nav-item nav-link" id="nav-twenty-tab" data-toggle="tab" href="#nav-twenty" role="tab" aria-controls="nav-twenty" aria-selected="false">Five</a>
							</div>
						</nav>
						

						<?php
                                
                                $statementTwo = $pdo->prepare("SELECT * FROM level_four_word_barron where id BETWEEN 1 AND 5");
                                $statementTwo->execute();
                                $resultTwo = $statementTwo->fetchAll(PDO::FETCH_ASSOC);
                                ?>

						<div class="tab-content text-dark" id="nav-tabContent">
							<div class="tab-pane fade show active h-75" id="nav-sixteen" role="tabpanel" aria-labelledby="nav-sixteen-tab">

                                 

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
							<div class="tab-pane fade h-75" id="nav-seventeen" role="tabpanel" aria-labelledby="nav-seventeen-tab">
								
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
							<div class="tab-pane fade h-75" id="nav-eighteen" role="tabpanel" aria-labelledby="nav-eighteen-tab">
								
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
							<div class="tab-pane fade h-75" id="nav-nineteen" role="tabpanel" aria-labelledby="nav-nineteen-tab">

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
							<div class="tab-pane fade h-75" id="nav-twenty" role="tabpanel" aria-labelledby="nav-twenty-tab">

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
								<a class="nav-item nav-link active" id="nav-tOne-tab" data-toggle="tab" href="#nav-tOne" role="tab" aria-controls="nav-tOne" aria-selected="true">One</a>

								<a class="nav-item nav-link" id="nav-tTwo-tab" data-toggle="tab" href="#nav-tTwo" role="tab" aria-controls="nav-tTwo" aria-selected="false">Two</a>

								<a class="nav-item nav-link" id="nav-tThree-tab" data-toggle="tab" href="#nav-tThree" role="tab" aria-controls="nav-tThree" aria-selected="false">Three</a>

								<a class="nav-item nav-link" id="nav-tFour-tab" data-toggle="tab" href="#nav-tFour" role="tab" aria-controls="nav-tFour" aria-selected="false">Four</a>

								<a class="nav-item nav-link" id="nav-tFive-tab" data-toggle="tab" href="#nav-tFive" role="tab" aria-controls="nav-tFive" aria-selected="false">Five</a>
							</div>
						</nav>
						

						<?php
                                
                                $statementTwo = $pdo->prepare("SELECT * FROM level_five_word_barron where id BETWEEN 1 AND 5");
                                $statementTwo->execute();
                                $resultTwo = $statementTwo->fetchAll(PDO::FETCH_ASSOC);
                                ?>

						<div class="tab-content text-dark" id="nav-tabContent">
							<div class="tab-pane fade show active h-75" id="nav-tOne" role="tabpanel" aria-labelledby="nav-tOne-tab">

                                 

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
							<div class="tab-pane fade h-75" id="nav-tTwo" role="tabpanel" aria-labelledby="nav-tTwo-tab">
								
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
							<div class="tab-pane fade h-75" id="nav-tThree" role="tabpanel" aria-labelledby="nav-tThree-tab">
								
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
							<div class="tab-pane fade h-75" id="nav-tFour" role="tabpanel" aria-labelledby="nav-tFour-tab">

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
							<div class="tab-pane fade h-75" id="nav-tFive" role="tabpanel" aria-labelledby="nav-tFive-tab">

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
                    /* Level One Question Barron*/
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

                    $ModalQuestionOne = $pdo->prepare("SELECT * FROM level_one_question_option where level_one_question_option.question_id = ".$ques_id." limit 4");
                    $ModalQuestionOne->execute();
                    $resultModalOne = $ModalQuestionOne->fetchAll(PDO::FETCH_ASSOC); 

                    $ModalQuestionTwo = $pdo->prepare("SELECT * FROM level_one_question_option where level_one_question_option.question_id = ".$ques_id_two." limit 4");
                    $ModalQuestionTwo->execute();
                    $resultModalTwo = $ModalQuestionTwo->fetchAll(PDO::FETCH_ASSOC); 

                    $ModalQuestionThree = $pdo->prepare("SELECT * FROM level_one_question_option where level_one_question_option.question_id = ".$ques_id_three." limit 4");
                    $ModalQuestionThree->execute();
                    $resultModalThree = $ModalQuestionThree->fetchAll(PDO::FETCH_ASSOC); ?>

                    <form action="form/barron_level_one.php" method="post">
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


                $level_two_statementOne = $pdo->prepare("SELECT * FROM level_two_question_barron ORDER BY RAND() limit 3");
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
                    $level_two_ModalQuestionOne = $pdo->prepare("SELECT * FROM level_two_question_option_barron where level_two_question_option_barron.question_id = ".$level_two_ques_id." limit 4");
                    $level_two_ModalQuestionOne->execute();
                    $level_two_resultModalOne = $level_two_ModalQuestionOne->fetchAll(PDO::FETCH_ASSOC); 

                    $level_two_ModalQuestionTwo = $pdo->prepare("SELECT * FROM level_two_question_option_barron where level_two_question_option_barron.question_id = ".$level_two_ques_id_two." limit 4");
                    $level_two_ModalQuestionTwo->execute();
                    $level_two_resultModalTwo = $level_two_ModalQuestionTwo->fetchAll(PDO::FETCH_ASSOC); 

                    $level_two_ModalQuestionThree = $pdo->prepare("SELECT * FROM level_two_question_option_barron where level_two_question_option_barron.question_id = ".$level_two_ques_id_three." limit 4");
                    $level_two_ModalQuestionThree->execute();
                    $level_two_resultModalThree = $level_two_ModalQuestionThree->fetchAll(PDO::FETCH_ASSOC); ?>

                    <form action="form/barron_level_two.php" method="post">
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

                $level_three_statementOne = $pdo->prepare("SELECT * FROM level_three_question_barron ORDER BY RAND() limit 3");
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


                    $level_three_ModalQuestionOne = $pdo->prepare("SELECT * FROM level_three_question_option_barron where level_three_question_option_barron.question_id = ".$level_three_ques_id." limit 4");
                    $level_three_ModalQuestionOne->execute();
                    $level_three_resultModalOne = $level_three_ModalQuestionOne->fetchAll(PDO::FETCH_ASSOC); 

                    $level_three_ModalQuestionTwo = $pdo->prepare("SELECT * FROM level_three_question_option_barron where level_three_question_option_barron.question_id = ".$level_three_ques_id_two." limit 4");
                    $level_three_ModalQuestionTwo->execute();
                    $level_three_resultModalTwo = $level_three_ModalQuestionTwo->fetchAll(PDO::FETCH_ASSOC); 

                    $level_three_ModalQuestionThree = $pdo->prepare("SELECT * FROM level_three_question_option_barron where level_three_question_option_barron.question_id = ".$level_three_ques_id_three." limit 4");
                    $level_three_ModalQuestionThree->execute();
                    $level_three_resultModalThree = $level_three_ModalQuestionThree->fetchAll(PDO::FETCH_ASSOC); ?>

                    <form action="form/barron_level_three.php" method="post">

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

                $level_four_statementOne = $pdo->prepare("SELECT * FROM level_four_question_barron ORDER BY RAND() limit 3");
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


                    $level_four_ModalQuestionOne = $pdo->prepare("SELECT * FROM level_four_question_option_barron where level_four_question_option_barron.question_id = ".$level_four_ques_id." limit 4");
                    $level_four_ModalQuestionOne->execute();
                    $level_four_resultModalOne = $level_four_ModalQuestionOne->fetchAll(PDO::FETCH_ASSOC); 

                    $level_four_ModalQuestionTwo = $pdo->prepare("SELECT * FROM level_four_question_option_barron where level_four_question_option_barron.question_id = ".$level_four_ques_id_two." limit 4");
                    $level_four_ModalQuestionTwo->execute();
                    $level_four_resultModalTwo = $level_four_ModalQuestionTwo->fetchAll(PDO::FETCH_ASSOC); 

                    $level_four_ModalQuestionThree = $pdo->prepare("SELECT * FROM level_four_question_option_barron where level_four_question_option_barron.question_id = ".$level_four_ques_id_three." limit 4");
                    $level_four_ModalQuestionThree->execute();
                    $level_four_resultModalThree = $level_four_ModalQuestionThree->fetchAll(PDO::FETCH_ASSOC); ?>

                    <form action="form/barron_level_four.php" method="post">

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

                $level_five_statementOne = $pdo->prepare("SELECT * FROM level_five_question_barron ORDER BY RAND() limit 3");
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


                    $level_five_ModalQuestionOne = $pdo->prepare("SELECT * FROM level_five_question_option_barron where level_five_question_option_barron.question_id = ".$level_five_ques_id." limit 4");
                    $level_five_ModalQuestionOne->execute();
                    $level_five_resultModalOne = $level_five_ModalQuestionOne->fetchAll(PDO::FETCH_ASSOC); 

                    $level_five_ModalQuestionTwo = $pdo->prepare("SELECT * FROM level_five_question_option_barron where level_five_question_option_barron.question_id = ".$level_five_ques_id_two." limit 4");
                    $level_five_ModalQuestionTwo->execute();
                    $level_five_resultModalTwo = $level_five_ModalQuestionTwo->fetchAll(PDO::FETCH_ASSOC); 

                    $level_five_ModalQuestionThree = $pdo->prepare("SELECT * FROM level_five_question_option_barron where level_five_question_option_barron.question_id = ".$level_five_ques_id_three." limit 4");
                    $level_five_ModalQuestionThree->execute();
                    $level_five_resultModalThree = $level_five_ModalQuestionThree->fetchAll(PDO::FETCH_ASSOC); ?>

                    <form action="form/barron_level_five.php" method="post">

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