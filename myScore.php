<?php 
  
  require "header.php";
  ob_start();
    session_start();
    include("inc/config.php");
    include("inc/CSRF_Protect.php");
    $csrf = new CSRF_Protect();

    $loggedIn= false;

    // Check if the user is logged in or not
    if(isset($_SESSION['user'])) {
        $loggedIn = true;
        
        $id = $_SESSION['user']['id'];
    }else{
        $loggedIn = false;
        header('location:signin.php');
        exit;
    }

    $err_msg = "";



    $exam_stmt = $pdo->prepare("SELECT * FROM exam WHERE user_id=?");
    $exam_stmt->execute(array($id));
    $scores = $exam_stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($scores)) {
    	$err_msg = "You Havn't Completed Any Type of Exam Yet";	
   	}

    require 'navbar.php';

?>
        
<!-- Content start -->              
<section class="container-fluid">
    
    <div class="row">
        <div class="col-md-2 col-sm-12 mx-auto">
            <div class="card my-5">
                <div class="card-header text-center text-white font-weight-bold">
                    Profile
                </div>
                <div class="card-body text-center">
                    <img src="img/avatar.png" class="img-fluid mb-1 rounded-circle">
                    <h4 class="card-text"><?php echo $_SESSION['user']['username']; ?></h4>
                    <h6 class="card-text"><?php echo $_SESSION['user']['email']; ?></h6>
                    <a href="signout.php" class="btn btn-block btn-outline-danger">Signout</a>
                </div>
            </div>
        </div>
        <div class="col-md-10 col-sm-12">
            <h1 class="text-center text-success">Your Score Card</h1>
            <hr>
            <table class="table table-dark">
            	<thead class="thead-light">
            		<tr>
            			<th scope="col">Exam Type</th>
            			<th scope="col">Date</th>
            			<th scope="col">Total Score</th>
            		</tr>
            	</thead>
            	<tbody>
            		
            		<?php foreach ($scores as $score): ?>
            			<tr>
            				<td><?php echo strtoupper($score['type']); ?></td>
            				<td><?php echo date("F jS, Y", strtotime($score['date'])); ?></td>
            				<td><?php echo $score['score']; ?></td>
            			</tr>
            		<?php endforeach ?>
            		<?php if ($err_msg): ?>
            			<div class="alert alert-danger">
            				<h3><?php echo $err_msg; ?></h3>
            			</div>
            		<?php endif ?>
            	</tbody>
            </table>
        </div>
    </div>
</section>
<!-- Content end -->


<?php require "footer.php";?>