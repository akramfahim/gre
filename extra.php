<?php
   include "header.php";

      ob_start();
     session_start();
     include("inc/config.php");
     include("inc/CSRF_Protect.php");
     $csrf = new CSRF_Protect();
     $error_message = '';
     $success_message = '';
     $error_message1 = '';
     $success_message1 = '';
     $loggedIn= false;

     // Check if the user is logged in or not
     if(isset($_SESSION['user'])) {
       $loggedIn = true;
     }

   require 'navbar.php'; 
?>

 <div class="container-fluid">
 	<div class="row">
 		<div class="col-md-2 col-sm-12 bg-warning mx-auto">
 			<h1 class="text-center text-danger">Hello Fahim</h1>
 		</div>
 		<div class="col-md-10 col-sm-12">
 			<div class="continer-fluid">
 				<div class="row">
 					<div class="col-md-4 col-sm-12 bg-info">
 						<h3 class="text-center">Hello 1</h3>
 						<img src="img/bg.png" class="img-fluid rounded" alt="">
 					</div>
 					<div class="col-md-4 col-sm-12 bg-dark">
 						<h3 class="text-center">Hello 2</h3>
 						<img src="img/gre.png" class="img-fluid rounded" alt="">
 					</div>
 					<div class="col-md-4 col-sm-12 bg-danger">
 						<h3 class="text-center">Hello 3</h3>
 						<img src="img/barron.png" class="img-fluid rounded" alt="">
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>

<div class="container">
	 <div class="row">
 		<div class="col-md-4 offset-col-4">
 			
 							<?php
                                
                                $statement = $pdo->prepare("SELECT * FROM level_one_word_barron where id BETWEEN 1 AND 5");
                                $statement->execute();
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);

                                ?>

                                <h1 class="text-center"><?php echo $result[0]['word_name']; ?></h1>                           
                                <h1 class="text-center"><?php echo $result[1]['word_name']; ?></h1>                           

                                    
 		</div>
 	</div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- My Modal Four -->
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
                    $level_two_ModalQuestionOne = $pdo->prepare("SELECT * FROM level_two_question_option_barron where level_two_question_option_barron.question_id = ".$level_two_ques_id." limit 4");
                    $level_two_ModalQuestionOne->execute();
                    $level_two_resultModalOne = $level_two_ModalQuestionOne->fetchAll(PDO::FETCH_ASSOC); 

                    $level_two_ModalQuestionTwo = $pdo->prepare("SELECT * FROM level_two_question_option_barron where level_two_question_option_barron.question_id = ".$level_two_ques_id_two." limit 4");
                    $level_two_ModalQuestionTwo->execute();
                    $level_two_resultModalTwo = $level_two_ModalQuestionTwo->fetchAll(PDO::FETCH_ASSOC); 

                    $level_two_ModalQuestionThree = $pdo->prepare("SELECT * FROM level_two_question_option_barron where level_two_question_option_barron.question_id = ".$level_two_ques_id_three." limit 4");
                    $level_two_ModalQuestionThree->execute();
                    $level_two_resultModalThree = $level_two_ModalQuestionThree->fetchAll(PDO::FETCH_ASSOC); ?>

                    <form action="" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
                        
                        <h5>Q: <b> <?php echo $level_two_random_question;  ?> ?</b></h5>
                        <hr>

                        <?php foreach ($level_two_resultModalOne as $row3) {
                            
                        ?>
                        <input type="radio" class="form-check-group" name="level_two_answer" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>

                        <br><hr>

                        <h5>Q: <b> <?php echo $level_two_random_question_two;  ?> ?</b></h5>
                        <hr>

                        <?php foreach ($level_two_resultModalTwo as $row3) {
                            
                        ?>
                        <input type="radio" class="form-check-group" name="level_two_answer2" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>
                        
                        <br><hr>

                        <h5>Q: <b> <?php echo $level_two_random_question_three;  ?> ?</b></h5>
                        <hr>

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
<!-- My Modal Four End -->

<!-- My Modal Five -->
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
                    $level_two_ModalQuestionOne = $pdo->prepare("SELECT * FROM level_two_question_option_barron where level_two_question_option_barron.question_id = ".$level_two_ques_id." limit 4");
                    $level_two_ModalQuestionOne->execute();
                    $level_two_resultModalOne = $level_two_ModalQuestionOne->fetchAll(PDO::FETCH_ASSOC); 

                    $level_two_ModalQuestionTwo = $pdo->prepare("SELECT * FROM level_two_question_option_barron where level_two_question_option_barron.question_id = ".$level_two_ques_id_two." limit 4");
                    $level_two_ModalQuestionTwo->execute();
                    $level_two_resultModalTwo = $level_two_ModalQuestionTwo->fetchAll(PDO::FETCH_ASSOC); 

                    $level_two_ModalQuestionThree = $pdo->prepare("SELECT * FROM level_two_question_option_barron where level_two_question_option_barron.question_id = ".$level_two_ques_id_three." limit 4");
                    $level_two_ModalQuestionThree->execute();
                    $level_two_resultModalThree = $level_two_ModalQuestionThree->fetchAll(PDO::FETCH_ASSOC); ?>

                    <form action="" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
                        
                        <h5>Q: <b> <?php echo $level_two_random_question;  ?> ?</b></h5>
                        <hr>

                        <?php foreach ($level_two_resultModalOne as $row3) {
                            
                        ?>
                        <input type="radio" class="form-check-group" name="level_two_answer" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>

                        <br><hr>

                        <h5>Q: <b> <?php echo $level_two_random_question_two;  ?> ?</b></h5>
                        <hr>

                        <?php foreach ($level_two_resultModalTwo as $row3) {
                            
                        ?>
                        <input type="radio" class="form-check-group" name="level_two_answer2" required="required" value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
                            }
                        ?>
                        
                        <br><hr>

                        <h5>Q: <b> <?php echo $level_two_random_question_three;  ?> ?</b></h5>
                        <hr>

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
<!-- My Modal Five  End-->

 <?php require 'footer.php'; ?>