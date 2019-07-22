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
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                   </button>

                   <div class="collapse navbar-collapse" id="navbarSupportedContent">
                       <ul class="navbar-nav ml-auto">
                        <?php if ($loggedIn): ?>
                         <!--  if user Logged In Then Show this manu -->
                          <li class="nav-item">
                               <a class="nav-link text-white font-weight-bold" href="course.php">COURSE</a>
                           </li>
                        <?php endif ?>
                           <li class="nav-item">
                               <a class="nav-link text-white font-weight-bold" href="learn.php">LEARN</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link text-white font-weight-bold" href="write.php">WRITE</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link text-white font-weight-bold" href="spell.php">SPELL</a>
                           </li>
                           
                        <?php if ($loggedIn): ?>
                         <!--  if user Logged In Then Show this manu -->
                           <li class="nav-item">
                               <a class="nav-link text-white font-weight-bold" href="test.php">TEST</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link text-white font-weight-bold btn btn-outline-success" href="signout.php">SIGNOUT</a>
                           </li>


                        <?php else: ?>
                            <li class="nav-item">
                               <a class="nav-link text-white font-weight-bold btn btn-outline-success" href="signin.php">SIGNIN</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link text-white font-weight-bold btn btn-outline-success" href="signup.php">SIGNUP</a>
                           </li>
                        <?php endif ?>
            
                       </ul>
                   </div>
                </nav>
             </header>