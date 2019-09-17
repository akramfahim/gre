<?php 

	ob_start();
	session_start();
	include("../inc/config.php");
	include("../inc/CSRF_Protect.php");
	$csrf = new CSRF_Protect();

    $loggedIn = true;
    if(!isset($_SESSION['admin'])) {
        $loggedIn = false;
        header('location: login.php');
        exit;
    }else{
      $loggedIn = true;
    }

	$success_msg ='';
	$error_msg = '';

	$id = $_GET['id'];


	$get_word = $pdo->prepare('SELECT * FROM word_table WHERE id='.$id);
	$get_word->execute();
	$single_word = $get_word->fetchAll(PDO::FETCH_ASSOC);

    $word = $single_word[0]['word'];
    $description = $single_word[0]['description'];

	/*print_r($barron_word_five);*/
	/*echo $barron_word_five[0]['word_name']."<br>";
	echo $barron_word_five[0]['description']."<br>";*/

    if (isset($_POST['update'])) {
        if (empty($_POST['word']) || empty($_POST['description'])) {
            $error_msg = "Any field should not be empty";
        }elseif ($_POST['word'] == $word && $_POST['description'] == $description) {
            $error_msg = "You do not change Anything";
        }else{
            $new_word = $_POST['word'];
            $new_description = $_POST['description'];

            //$sql = "UPDATE ".$table_name." SET word_name=".$word_name." AND description= ".$description." WHERE id=".$id;

            $update_stmt = $pdo->prepare("UPDATE word_table SET word = ? , description = ? WHERE id = ?");
            $done_update = $update_stmt->execute(array($new_word,$new_description,$id));

            /*$sql = 'UPDATE '.$table_name.' WHERE id='.$id;
            $update_stmt = $pdo->prepare($sql);
            $done_update = $update_stmt->execute();*/
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
    <title>Dashboard | Admin Panel</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Admin Panel | Gre</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
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
                        <h1 class="text-center text-success">Update Word</h1>
                    </div>
                    <div class="card-body">
                        <?php if ($error_msg) {?>
                        <div class="alert alert-danger">
                            <h4><?php echo $error_msg; ?></h4>
                        </div>
                        <?php  }elseif ($success_msg) {?>
                        <div class="alert alert-success">
                            <h4><?php echo $success_msg; ?></h4>
                        </div>
                        <?php  } ?>

                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="word">
                                    <h4>Word :</h4>
                                </label>
                                <input type="text" name="word" class="form-control" id="word"
                                    aria-describedby="emailHelp" required="required"
                                    value="<?php echo $single_word[0]['word'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="comment">
                                    <h4>Description:</h4>
                                </label>
                                <textarea name="description" required="required" class="form-control" rows="5"
                                    id="description"><?php echo $single_word[0]['description'] ?>
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