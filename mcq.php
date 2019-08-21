<?php 
   require 'header.php';
   
   ob_start();
      session_start();
      include("inc/config.php");
      include("inc/CSRF_Protect.php");
      $csrf = new CSRF_Protect();
      require 'navbar.php';
        $user_id = $_SESSION['user']['id'];

      ?>

<div class="container">
	<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-myColor rounded shadow-sm">
    <img class="mr-3" src="img/mcq.jpg" alt="" width="48" height="48">
    <div class="lh-100">
      <h6 class="mb-0 text-white lh-100">MCQ EXAM</h6>
      <small>Since 2011</small>
    </div>
  </div>
	<div class="card">
		<div class="card-body">
			 <?php

			      $level_sql = $pdo->prepare("SELECT * FROM settings WHERE user_id=?");
		          $level_sql->execute(array($user_id));
		          $level_pass = $level_sql->fetchAll(PDO::FETCH_ASSOC);
		          
		          if ($level_pass[0]['manhattan'] == 'Completed') {
  	                  $statement = $pdo->prepare("SELECT * FROM `question` ORDER BY RAND() limit 5");
		          }
		          else if ($level_pass[0]['magoosh'] == 'Completed'){
		          	 $statement = $pdo->prepare("SELECT * FROM `question` where type='barron' OR type='magoosh' ORDER BY RAND() limit 5");
		          }
		           else if ($level_pass[0]['barron'] == 'Completed'){
		          	 $statement = $pdo->prepare("SELECT * FROM `question` where type='barron' ORDER BY RAND() limit 5");
		          }

                  $statement->execute();
                  $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                  	
                  
                  ?>
			
             <form action="form/mcq.php" method="post">
               <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
               <?php foreach ($results as $key => $row3) { ?>

               <h6>Q: <b> <?php echo $row3['question'];  ?> ?</b></h6>
               <hr>
               <input type="hidden" name="question_id<?php echo $key; ?>" value="<?php echo $row3['id']; ?>">
               <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required" value="<?php echo $row3['option1'] ?>">
               <?php echo $row3['option1'] ?>
               <br>

               <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required" value="<?php echo $row3['option2'] ?>">
               <?php echo $row3['option2'] ?>
               <br>

               <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required" value="<?php echo $row3['option3'] ?>">
               <?php echo $row3['option3'] ?>
               <br>

               <input type="radio" class="form-check-group" name="answer<?php echo $key; ?>" required="required" value="<?php echo $row3['option4'] ?>">
               <?php echo $row3['option4'] ?>
               <br>

               <hr/>
               <?php } ?>
                 <button class="btn btn-success btn-block" type="submit" name="submit"> Submit </button>

		</div>
	</div>
</div>