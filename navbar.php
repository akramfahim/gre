<?php 
     $loggedIn= false;

     // Check if the user is logged in or not
     if(isset($_SESSION['user'])) {
       $loggedIn = true;
       /*header('location: signin.php');
       exit;*/
     }

 ?>

<header class="bg-myColor py-2 mb-2">
    <nav class="navbar navbar-expand-lg navbar-light container">
        <a class="navbar-brand text-white font-weight-bold" href="index.php">GRE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <?php if ($loggedIn): ?>
                <?php $admin = $_SESSION['user']['userType']; if($admin == '1'){ ?>

                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold" href="admin/index.php">ADMIN</a>
                </li>

                <?php   } ?>
                <?php if ($loggedIn): ?>
                <!--  if user Logged In Then Show this manu -->
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold" href="course.php">COURSE</a>
                </li>
                <?php endif ?>
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold" href="allTest.php">TEST</a>
                </li>
                <!--  if user Logged In Then Show this manu -->
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold" href="myScore.php">MY SCORE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold btn btn-outline-success"
                        href="signout.php">SIGNOUT</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold btn btn-outline-success mr-2" href="signin.php">SIGNIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold btn btn-outline-success" href="signup.php">SIGNUP</a>
                </li>
                <?php endif ?>

            </ul>
        </div>
    </nav>
</header>