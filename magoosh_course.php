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
        $level_sql = $pdo->prepare("SELECT * FROM level_settings WHERE user_id=? And type='magoosh'");
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
                <a class="nav-link active" id="v-pills-one-tab" data-toggle="pill" href="#v-pills-one" role="tab"
                    aria-controls="v-pills-one" aria-selected="true">
                    Level 1
                </a>
                <a class="nav-link" id="v-pills-two-tab" data-toggle="pill" href="#v-pills-two" role="tab"
                    aria-controls="v-pills-two" aria-selected="false">
                    Level 2
                </a>
                <a class="nav-link" id="v-pills-three-tab" data-toggle="pill" href="#v-pills-three" role="tab"
                    aria-controls="v-pills-three" aria-selected="false">
                    Level 3
                </a>
                <a class="nav-link" id="v-pills-four-tab" data-toggle="pill" href="#v-pills-four" role="tab"
                    aria-controls="v-pills-four" aria-selected="false">
                    Level 4
                </a>
                <a class="nav-link" id="v-pills-five-tab" data-toggle="pill" href="#v-pills-five" role="tab"
                    aria-controls="v-pills-five" aria-selected="false">
                    Level 5
                </a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-one" role="tabpanel"
                    aria-labelledby="v-pills-one-tab">

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
                            <a class="nav-item nav-link active" id="nav-0-tab" data-toggle="tab" href="#nav-0"
                                role="tab" aria-controls="nav-0" aria-selected="true">One</a>

                            <a class="nav-item nav-link" id="nav-1-tab" data-toggle="tab" href="#nav-1" role="tab"
                                aria-controls="nav-1" aria-selected="false">Two</a>

                            <a class="nav-item nav-link" id="nav-2-tab" data-toggle="tab" href="#nav-2" role="tab"
                                aria-controls="nav-2" aria-selected="false">Three</a>

                            <a class="nav-item nav-link" id="nav-3-tab" data-toggle="tab" href="#nav-3" role="tab"
                                aria-controls="nav-3" aria-selected="false">Four</a>

                            <a class="nav-item nav-link" id="nav-4-tab" data-toggle="tab" href="#nav-4" role="tab"
                                aria-controls="nav-4" aria-selected="false">Five</a>
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
                        <div class="tab-pane fade show h-75 <?php if($key==0) echo 'active'; ?>"
                            id="nav-<?php echo $key ?>" role="tabpane<?php echo $key ?>"
                            aria-labelledby="nav-<?php echo $key ?>-tab">
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
                        <button class="btn btn-outline-info font-weight-bold text-white p-3 mb-3" data-toggle="modal"
                            data-target="#myModalOne">
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
                            <a class="nav-item nav-link active" id="nav-levelTwo-0-tab" data-toggle="tab"
                                href="#nav-levelTwo-0" role="tab" aria-controls="nav-0" aria-selected="true">One</a>

                            <a class="nav-item nav-link" id="nav-levelTwo-1-tab" data-toggle="tab"
                                href="#nav-levelTwo-1" role="tab" aria-controls="nav-1" aria-selected="false">Two</a>

                            <a class="nav-item nav-link" id="nav-levelTwo-2-tab" data-toggle="tab"
                                href="#nav-levelTwo-2" role="tab" aria-controls="nav-2" aria-selected="false">Three</a>

                            <a class="nav-item nav-link" id="nav-levelTwo-3-tab" data-toggle="tab"
                                href="#nav-levelTwo-3" role="tab" aria-controls="nav-3" aria-selected="false">Four</a>

                            <a class="nav-item nav-link" id="nav-levelTwo-4-tab" data-toggle="tab"
                                href="#nav-levelTwo-4" role="tab" aria-controls="nav-4" aria-selected="false">Five</a>
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
                        <div class="tab-pane fade show h-75 <?php if($key==0) echo 'active'; ?>"
                            id="nav-levelTwo-<?php echo $key ?>" role="tabpane<?php echo $key ?>"
                            aria-labelledby="nav-levelTwo-<?php echo $key ?>-tab">
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
                        <button class="btn btn-outline-info font-weight-bold text-white p-3 mb-3" data-toggle="modal"
                            data-target="#myModalTwo">
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
                            <a class="nav-item nav-link active" id="nav-levelThree-0-tab" data-toggle="tab"
                                href="#nav-levelThree-0" role="tab" aria-controls="nav-0" aria-selected="true">One</a>

                            <a class="nav-item nav-link" id="nav-levelThree-1-tab" data-toggle="tab"
                                href="#nav-levelThree-1" role="tab" aria-controls="nav-1" aria-selected="false">Two</a>

                            <a class="nav-item nav-link" id="nav-levelThree-2-tab" data-toggle="tab"
                                href="#nav-levelThree-2" role="tab" aria-controls="nav-2"
                                aria-selected="false">Three</a>

                            <a class="nav-item nav-link" id="nav-levelThree-3-tab" data-toggle="tab"
                                href="#nav-levelThree-3" role="tab" aria-controls="nav-3" aria-selected="false">Four</a>

                            <a class="nav-item nav-link" id="nav-levelThree-4-tab" data-toggle="tab"
                                href="#nav-levelThree-4" role="tab" aria-controls="nav-4" aria-selected="false">Five</a>
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
                        <div class="tab-pane fade h-75 <?php if($key==0) echo 'active show'; ?>"
                            id="nav-levelThree-<?php echo $key ?>" role="tabpane<?php echo $key ?>"
                            aria-labelledby="nav-levelThree-<?php echo $key ?>-tab">
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
                        <button class="btn btn-outline-info font-weight-bold text-white p-3 mb-3" data-toggle="modal"
                            data-target="#myModalThree">
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
                            <a class="nav-item nav-link active" id="nav-levelFour-0-tab" data-toggle="tab"
                                href="#nav-levelFour-0" role="tab" aria-controls="nav-0" aria-selected="true">One</a>

                            <a class="nav-item nav-link" id="nav-levelFour-1-tab" data-toggle="tab"
                                href="#nav-levelFour-1" role="tab" aria-controls="nav-1" aria-selected="false">Two</a>

                            <a class="nav-item nav-link" id="nav-levelFour-2-tab" data-toggle="tab"
                                href="#nav-levelFour-2" role="tab" aria-controls="nav-2" aria-selected="false">Three</a>

                            <a class="nav-item nav-link" id="nav-levelFour-3-tab" data-toggle="tab"
                                href="#nav-levelFour-3" role="tab" aria-controls="nav-3" aria-selected="false">Four</a>

                            <a class="nav-item nav-link" id="nav-levelFour-4-tab" data-toggle="tab"
                                href="#nav-levelFour-4" role="tab" aria-controls="nav-4" aria-selected="false">Five</a>
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
                        <div class="tab-pane fade h-75 <?php if($key==0) echo 'active show'; ?>"
                            id="nav-levelFour-<?php echo $key ?>" role="tabpane<?php echo $key ?>"
                            aria-labelledby="nav-levelFour-<?php echo $key ?>-tab">
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
                        <button class="btn btn-outline-info font-weight-bold text-white p-3 mb-3" data-toggle="modal"
                            data-target="#myModalFour">
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
                            <a class="nav-item nav-link active" id="nav-levelThree-0-tab" data-toggle="tab"
                                href="#nav-levelFive-0" role="tab" aria-controls="nav-0" aria-selected="true">One</a>

                            <a class="nav-item nav-link" id="nav-levelFive-1-tab" data-toggle="tab"
                                href="#nav-levelFive-1" role="tab" aria-controls="nav-1" aria-selected="false">Two</a>

                            <a class="nav-item nav-link" id="nav-levelFive-2-tab" data-toggle="tab"
                                href="#nav-levelFive-2" role="tab" aria-controls="nav-2" aria-selected="false">Three</a>

                            <a class="nav-item nav-link" id="nav-levelFive-3-tab" data-toggle="tab"
                                href="#nav-levelFive-3" role="tab" aria-controls="nav-3" aria-selected="false">Four</a>

                            <a class="nav-item nav-link" id="nav-levelFive-4-tab" data-toggle="tab"
                                href="#nav-levelFive-4" role="tab" aria-controls="nav-4" aria-selected="false">Five</a>
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
                        <div class="tab-pane fade h-75 <?php if($key==0) echo 'active show'; ?>"
                            id="nav-levelFive-<?php echo $key ?>" role="tabpane<?php echo $key ?>"
                            aria-labelledby="nav-levelFive-<?php echo $key ?>-tab">
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
                        <button class="btn btn-outline-info font-weight-bold text-white p-3 mb-3" data-toggle="modal"
                            data-target="#myModalFive">
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

                    $statementOne = $pdo->prepare("SELECT * FROM question where type='magoosh' AND level='one' ORDER BY RAND() limit 3");
                    $statementOne->execute();
                    $resultOne = $statementOne->fetchAll(PDO::FETCH_ASSOC); ?>

                <form action="form/magoosh_level_one.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
                    <?php foreach ($resultOne as $key => $row3) { ?>

                    <h5>Q: <b> <?php echo $row3['question'];  ?> ?</b></h5>
                    <hr>
                    <input type="hidden" name="question_id<?php echo $key; ?>" value="<?php echo $row3['id']; ?>">
                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option1'] ?>">
                    <?php echo $row3['option1'] ?>
                    <br>

                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option2'] ?>">
                    <?php echo $row3['option2'] ?>
                    <br>

                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option3'] ?>">
                    <?php echo $row3['option3'] ?>
                    <br>

                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option4'] ?>">
                    <?php echo $row3['option4'] ?>
                    <br>

                    <hr />
                    <?php } ?>

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
                    /* Level One Question magoosh*/
                    $ques_id='';
                    $correct_ans = '';
                    $correct_ans_two = '';
                    $correct_ans_three = '';

                    $statementOne = $pdo->prepare("SELECT * FROM question where type='magoosh' AND level='two' ORDER BY RAND() limit 3");
                    $statementOne->execute();
                    $resultOne = $statementOne->fetchAll(PDO::FETCH_ASSOC); ?>

                <form action="form/magoosh_level_two.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
                    <?php foreach ($resultOne as $key => $row3) { ?>

                    <h5>Q: <b> <?php echo $row3['question'];  ?> ?</b></h5>
                    <hr>
                    <input type="hidden" name="question_id<?php echo $key; ?>" value="<?php echo $row3['id']; ?>">
                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option1'] ?>">
                    <?php echo $row3['option1'] ?>
                    <br>

                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option2'] ?>">
                    <?php echo $row3['option2'] ?>
                    <br>

                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option3'] ?>">
                    <?php echo $row3['option3'] ?>
                    <br>

                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option4'] ?>">
                    <?php echo $row3['option4'] ?>
                    <br>

                    <hr />
                    <?php } ?>

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
                    /* Level One Question magoosh*/
                    $ques_id='';
                    $correct_ans = '';
                    $correct_ans_two = '';
                    $correct_ans_three = '';

                    $statementOne = $pdo->prepare("SELECT * FROM question where type='magoosh' AND level='three' ORDER BY RAND() limit 3");
                    $statementOne->execute();
                    $resultOne = $statementOne->fetchAll(PDO::FETCH_ASSOC); ?>

                <form action="form/magoosh_level_three.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
                    <?php foreach ($resultOne as $key => $row3) { ?>

                    <h5>Q: <b> <?php echo $row3['question'];  ?> ?</b></h5>
                    <hr>
                    <input type="hidden" name="question_id<?php echo $key; ?>" value="<?php echo $row3['id']; ?>">
                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option1'] ?>">
                    <?php echo $row3['option1'] ?>
                    <br>

                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option2'] ?>">
                    <?php echo $row3['option2'] ?>
                    <br>

                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option3'] ?>">
                    <?php echo $row3['option3'] ?>
                    <br>

                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option4'] ?>">
                    <?php echo $row3['option4'] ?>
                    <br>

                    <hr />
                    <?php } ?>

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
                    /* Level One Question magoosh*/
                    $ques_id='';
                    $correct_ans = '';
                    $correct_ans_two = '';
                    $correct_ans_three = '';

                    $statementOne = $pdo->prepare("SELECT * FROM question where type='magoosh' AND level='four' ORDER BY RAND() limit 3");
                    $statementOne->execute();
                    $resultOne = $statementOne->fetchAll(PDO::FETCH_ASSOC); ?>

                <form action="form/magoosh_level_four.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
                    <?php foreach ($resultOne as $key => $row3) { ?>

                    <h5>Q: <b> <?php echo $row3['question'];  ?> ?</b></h5>
                    <hr>
                    <input type="hidden" name="question_id<?php echo $key; ?>" value="<?php echo $row3['id']; ?>">
                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option1'] ?>">
                    <?php echo $row3['option1'] ?>
                    <br>

                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option2'] ?>">
                    <?php echo $row3['option2'] ?>
                    <br>

                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option3'] ?>">
                    <?php echo $row3['option3'] ?>
                    <br>

                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option4'] ?>">
                    <?php echo $row3['option4'] ?>
                    <br>

                    <hr />
                    <?php } ?>

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
                    /* Level One Question magoosh*/
                    $ques_id='';
                    $correct_ans = '';
                    $correct_ans_two = '';
                    $correct_ans_three = '';

                    $statementOne = $pdo->prepare("SELECT * FROM question where type='magoosh' AND level='five' ORDER BY RAND() limit 3");
                    $statementOne->execute();
                    $resultOne = $statementOne->fetchAll(PDO::FETCH_ASSOC); ?>

                <form action="form/magoosh_level_five.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
                    <?php foreach ($resultOne as $key => $row3) { ?>

                    <h5>Q: <b> <?php echo $row3['question'];  ?> ?</b></h5>
                    <hr>
                    <input type="hidden" name="question_id<?php echo $key; ?>" value="<?php echo $row3['id']; ?>">
                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option1'] ?>">
                    <?php echo $row3['option1'] ?>
                    <br>

                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option2'] ?>">
                    <?php echo $row3['option2'] ?>
                    <br>

                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option3'] ?>">
                    <?php echo $row3['option3'] ?>
                    <br>

                    <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required"
                        value="<?php echo $row3['option4'] ?>">
                    <?php echo $row3['option4'] ?>
                    <br>

                    <hr />
                    <?php } ?>

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