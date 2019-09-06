<?php 
	ob_start();
	session_start();
	include("../inc/config.php");
	include("../inc/CSRF_Protect.php");
	$csrf = new CSRF_Protect();

	$loggedIn= true;

	$admin = $_SESSION['user']['userType'];

	if(!isset($_SESSION['user']) || $admin != '1') {
	    $loggedIn = false;
	    header('location: ../index.php');
	    exit;
	}

	if(isset($_POST['login'])) {
        
	    if(empty($_POST['email']) || empty($_POST['password'])) {
	        $error_message = 'Email and/or Password can not be empty<br>';
	    } else {
	    
	      $email = strip_tags($_POST['email']);
	      $password = strip_tags($_POST['password']);

	      $statement = $pdo->prepare("SELECT * FROM users WHERE email=? AND userType=?");
	      $statement->execute(array($email,'1'));
	      $total = $statement->rowCount();    
	        $result = $statement->fetchAll(PDO::FETCH_ASSOC);    
	        if($total==0) {
	            header("location: ../index.php");
	        } else {       
	            foreach($result as $row) { 
	                $row_password = $row['password'];
	            }
	        
	            if( $row_password != md5($password) ) {
	                $error_message = 'Password does not match';
	            } else {      
	                $_SESSION['admin'] = $row;
	                header("location: index.php");
	            }
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

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3 bg-light py-5">

                <?php if (isset($error_message)): ?>
                <div class="alert alert-danger">
                    <h3 class="text-center"><?php echo $error_message; ?></h3>
                </div>
                <?php endif ?>

                <h1 class="text-center">Admin Login</h1>
                <hr>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="email">
                            <h4>Email address :</h4>
                        </label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                            placeholder="Enter email" required="required">
                    </div>
                    <div class="form-group">
                        <label for="password">
                            <h4>Password :</h4>
                        </label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                            required="required">
                    </div>
                    <button type="submit" name="login" class="btn btn-info btn-lg btn-block my-3">Login</button>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>

</html>