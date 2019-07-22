<?php 
  require 'header.php';

  ob_start();
  session_start();
  include("inc/config.php");
  include("inc/CSRF_Protect.php");
  $csrf = new CSRF_Protect();
  $error_message='';
  $loggedIn= false;
  if(isset($_SESSION['user'])) {
    $loggedIn = true;
    header('location: index.php');
    exit;
  }


  if(isset($_POST['signin'])) {
        
    if(empty($_POST['email']) || empty($_POST['password'])) {
        $error_message = 'Email and/or Password can not be empty<br>';
    } else {
    
      $email = strip_tags($_POST['email']);
      $password = strip_tags($_POST['password']);

      $statement = $pdo->prepare("SELECT * FROM users WHERE email=? AND userType=?");
      $statement->execute(array($email,'0'));
      $total = $statement->rowCount();    
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);    
        if($total==0) {
            $error_message .= 'Email Address does not match<br>';
        } else {       
            foreach($result as $row) { 
                $row_password = $row['password'];
            }
        
            if( $row_password != md5($password) ) {
                $error_message .= 'Password does not match<br>';
            } else {       
            
                $_SESSION['user'] = $row;
                header("location: index.php");
            }
        }
    }   
  }

  require 'navbar.php';    
 ?>
  
  <div class="container-fluid mt-n2" style="height:100vh; background-image: url('img/learnn.jpg'); background-size: cover">
    
    <?php if($error_message): ?>
    <div class="row pt-2">
      <div class="col-md-4 offset-md-4">
        <div class="alert alert-danger" role="alert">
          <b><?php echo $error_message; ?></b>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <div class="row pt-3">
      <div class="col-md-4 offset-md-4 signin-form">
        <h1 class="text-center">Sign In</h1>
        <hr>
        <form method="POST" action="">
          <div class="form-group">
            <label for="email"><h4>Email address :</h4></label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required="required">
          </div>
          <div class="form-group">
            <label for="password"><h4>Password :</h4></label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required="required">
          </div>
          <button type="submit" name="signin" class="btn btn-info btn-lg btn-block my-3">Submit</button>
        </form>
        <p class="text-right">- Haven't a Account ? <a href="signup.php">Signup Here</a></p>
      </div>
    </div>
  </div>

<?php 
  require 'footer.php';
?>