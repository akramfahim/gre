<?php 

	ob_start();
	session_start();
	include("../inc/config.php");
	include("../inc/CSRF_Protect.php");
	$csrf = new CSRF_Protect();

	$success_msg ='';
	$error_msg = '';

	$id = $_GET['id'];


	$get_question = $pdo->prepare('SELECT * FROM question WHERE id='.$id);
	$get_question->execute();
	$single_question = $get_question->fetchAll(PDO::FETCH_ASSOC);

    $question = $single_question[0]['question'];
    $answer = $single_question[0]['answer'];


    if (isset($_POST['update'])) {
        if (empty($_POST['question']) || empty($_POST['answer']) || empty($_POST['option1']) || empty($_POST['option2'])|| empty($_POST['option3'])|| empty($_POST['option4'])) {

            $error_msg = "Any field should not be empty";

        }elseif ($_POST['question'] == $question || $_POST['answer'] == $answer) {
            
            $error_msg = "You do not change Anything";

        }else{
            $new_question = $_POST['question'];
            $new_answer = $_POST['answer'];
            $new_option1 = $_POST['option1'];
            $new_option2 = $_POST['option2']; 
            $new_option3 = $_POST['option3']; 
            $new_option4 = $_POST['option4']; 

          

                $update_stmt = $pdo->prepare("UPDATE question SET question=?,answer=?,option1=?,option2=?,option3=?,option4=? WHERE id = ?");
                $done_update = $update_stmt->execute(array($new_question,$new_answer,$new_option1,$new_option2,$new_option3,$new_option4,$id));

                if ($done_update) {
                    $success_msg = "Your Word Successfully Updated";
                }else{
                    $error_msg = "Word Cannot Be Updated";
                }

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
<body class="bg-dark">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php">Admin Panel | Gre</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav ml-md-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">DashBoard <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="word_list.php">Words List</a>
				</li>
                <li class="nav-item">
                    <a class="nav-link" href="question_list.php">Question List</a>
                </li>

				<li class="nav-item">
					<a class="nav-link btn btn-outline-danger" href="../signout.php">Sign Out</a>
				</li>
			</ul>
		</div>
	</nav>
    <div class="container mt-5">
    	<div class="row">
    		<div class="col-md-6 offset-md-3">

    			<div class="card mb-4 shadow-lg">
                     <div class="card-header text-white">
                        <h1 class="text-center text-success">Update Question</h1>
                     </div>
                     <div class="card-body">
                     	<?php if ($error_msg) {?>
                     		<div class="alert alert-danger"><h4><?php echo $error_msg; ?></h4></div>
                     	<?php  }elseif ($success_msg) {?>
                     		<div class="alert alert-success"><h4><?php echo $success_msg; ?></h4></div>
                     	<?php  } ?>

                     	<form method="POST" action="">
                     		<div class="form-group">
                     			<label for="word"><h4>Question :</h4></label>
                     			<input type="text" name="question" class="form-control" id="word" aria-describedby="emailHelp" required="required" value="<?php echo $single_question[0]['question'] ?>">
                     		</div>
                     		
                     		<div class="form-group">
                     			<label for="comment"><h4>Answer:</h4></label>
                     			<textarea name="answer" required="required" class="form-control" rows="5" id="description"><?php echo $single_question[0]['answer'] ?>
                     			</textarea>
                     		</div>
                            
                            <h3 class="text-success text-center">Update Option : </h3>

                            <div class="form-group">
                                <label for="comment"><h4>Option 1:</h4></label>
                                <textarea name="option1" required="required" class="form-control" rows="5" id="description"><?php echo $single_question[0]['option1'] ?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="comment"><h4>Option 2:</h4></label>
                                <textarea name="option2" required="required" class="form-control" rows="5" id="description"><?php echo $single_question[0]['option2'] ?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="comment"><h4>Option 3:</h4></label>
                                <textarea name="option3" required="required" class="form-control" rows="5" id="description"><?php echo $single_question[0]['option3'] ?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="comment"><h4>Option 4:</h4></label>
                                <textarea name="option4" required="required" class="form-control" rows="5" id="description"><?php echo $single_question[0]['option4'] ?>
                                </textarea>
                            </div>

                     		<button type="submit" name="update" class="btn btn-info btn-lg btn-block my-3">
                     			Update
                     		</button>
                     	</form>
                     </div>
                  </div>
    		</div>
    	</div>
    </div>
  
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>