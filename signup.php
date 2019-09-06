<?php
require 'header.php';

ob_start();
session_start();
include "inc/config.php";
include "inc/CSRF_Protect.php";
$error_message = '';
$success_message = '';
$loggedIn = false;
if (isset($_SESSION['user'])) {
    $loggedIn = true;
    header('location: index.php');
    exit;
}

if (isset($_POST['signup'])) {

    $valid = 1;

    if (empty($_POST['username'])) {
        $valid = 0;
        $error_message .= "Username can not be empty<br>";
    }

    if (empty($_POST['email'])) {
        $valid = 0;
        $error_message .= 'Email address can not be empty<br>';
    } else {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $valid = 0;
            $error_message .= 'Email address must be valid<br>';
        } else {
            $statement = $pdo->prepare("SELECT * FROM users WHERE email=?");
            $statement->execute(array($_POST['email']));
            $total = $statement->rowCount();
            if ($total) {
                $valid = 0;
                $error_message .= 'Email address already exists<br>';
            }
        }
    }
    $password = $_POST['password'];

    if (empty($_POST['password']) || empty($_POST['re_password'])) {
        $valid = 0;
        $error_message .= "Password can not be empty<br>";
    }

    if (!empty($_POST['password']) && !empty($_POST['re_password'])) {
        if ($_POST['password'] != $_POST['re_password']) {
            $valid = 0;
            $error_message .= "Passwords do not match<br>";
        }
    }
    if (strlen($password)) {
        $valid = 0;
        $error_message .= "Password length must be greater than 5<br>";

    }

    if ($valid == 1) {

        // saving into the database
        $statement = $pdo->prepare("INSERT INTO users (username,email,password) VALUES (?,?,?)");
        $statement->execute(array($_POST['username'], $_POST['email'], md5($_POST['password'])));

        unset($_POST['username']);
        unset($_POST['email']);
        $success_message = 'Registration Successfull.';
        /*header("location: index.php");*/
    }
}

require 'navbar.php';
?>

<div class="container-fluid mt-n2" style="height:100vh; background-image: url('img/leb.jpg'); background-size: cover">

    <?php if ($error_message): ?>
    <div class="row pt-2">
        <div class="col-md-4 offset-md-4">
            <div class="alert alert-danger" role="alert">
                <b><?php echo $error_message; ?></b>
            </div>
        </div>
    </div>
    <?php endif;?>

    <?php if ($success_message): ?>
    <div class="row pt-2">
        <div class="col-md-4 offset-md-4">
            <div class="alert alert-success" role="alert">
                <b><?php echo $success_message; ?></b>
            </div>
        </div>
    </div>
    <?php endif;?>

    <div class="row pt-3">
        <div class="col-md-4 offset-md-4 signin-form">
            <h1 class="text-center">Sign Up</h1>
            <hr>
            <form method="post" action="">
                <div class="form-group">
                    <label for="username">Username :</label>
                    <input type="text" name="username" required="required" class="form-control" id="username"
                        aria-describedby="usernameHelp" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="email">Email address :</label>
                    <input type="email" name="email" required="required" class="form-control" id="email"
                        aria-describedby="emailHelp" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="password">Password :</label>
                    <input type="password" name="password" required="required" class="form-control" id="password"
                        placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="re_password">Confirm Password :</label>
                    <input type="password" name="re_password" required="required" class="form-control" id="re_password"
                        placeholder="Confirm Password">
                </div>
                <button type="submit" name="signup" class="btn btn-info btn-lg btn-block my-3">Submit</button>
                <p class="text-right">- Already Have an Account ? <a href="signin.php">Signin Here</a></p>
            </form>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>