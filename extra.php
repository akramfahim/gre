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

 <?php require 'footer.php'; ?>