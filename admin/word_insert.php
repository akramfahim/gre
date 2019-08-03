<?php 
	ob_start();
  session_start();
  include("../inc/config.php");
  include("../inc/CSRF_Protect.php");
  $csrf = new CSRF_Protect();

  $error_msg = '';
  $success_msg = '';

  $loggedIn = true;
  if(!isset($_SESSION['admin'])) {
    $loggedIn = false;
    header('location: ../index.php');
    exit;
  }else{
      $loggedIn = true;
  }


  if(isset($_POST['insert'])){
  	$word_name = $_POST['word_name'];
  	$description = $_POST['description'];

  	$question = $_POST['question'];
  	$answer = $_POST['answer'];

  	$sql = "INSERT INTO manhattan_level_five_word (word_name,description) VALUES (?,?)";
  	$stmt = $pdo->prepare($sql);
  	$done_msg = $stmt->execute(array($word_name,$description));

  	$sqlTwo = "INSERT INTO manhattan_level_five_question (question,answer) VALUES (?,?)";
  	$stmtTwo = $pdo->prepare($sqlTwo);
  	$done_msg = $stmtTwo->execute(array($question,$answer));



  	if ($done_msg) {
  		$success_msg = "Word Inserted Successfully!";
  	}else{
  		$error_msg = "There is seems like a Problem";
  	}

  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login | Admin Panel</title>

  <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    	<div class="row">
    		<div class="col-md-8 offset-md-2">

    			<h1 class="text-center text-success">Word Insert</h1>
				
				<?php if ($error_msg) {?>
					<div class="alert alert-danger"><h2><?php echo $error_msg; ?></h2></div>
				<?php  }elseif ($success_msg) {?>
					<div class="alert alert-success"><h2><?php echo $success_msg; ?></h2></div>
				<?php  } ?>

				<form method="POST" action="">
		          	<div class="form-group">
		            	<label for="word_name"><h4>Word :</h4></label>
		            	<input type="text" name="word_name" class="form-control" id="word_name" aria-describedby="emailHelp" placeholder="Enter Word" required="required">
		          	</div>
		          	<div class="form-group">
		            	<label for="description"><h4>Description :</h4></label>
		            	<input type="text" name="description" class="form-control" id="description" placeholder="Descriptin" required="required">
		          	</div>

		          	<div class="form-group">
		            	<label for="question"><h4>Question :</h4></label>
		            	<input type="text" name="question" class="form-control" id="question" aria-describedby="emailHelp" placeholder="Enter Word" required="required">
		          	</div>
		          	<div class="form-group">
		            	<label for="answer"><h4>Answer :</h4></label>
		            	<input type="text" name="answer" class="form-control" id="answer" placeholder="Descriptin" required="required">
		          	</div>
		        	<button type="submit" name="insert" class="btn btn-info btn-lg btn-block my-3">
		        		Insert Word
		        	</button>
				</form>
    		</div>
    	</div>
    </div>
  
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>