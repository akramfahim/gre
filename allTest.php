<?php 
   require 'header.php';
   
   ob_start();
      session_start();
           if(!isset($_SESSION['user'])) {
        $loggedIn = false;
        header('location: signin.php');
        exit;
      }else{
            $loggedIn = true;
      }
      include("inc/config.php");
      include("inc/CSRF_Protect.php");
      $csrf = new CSRF_Protect();
      require 'navbar.php';

      ?>

<div class="container mt-4">
            <div class="row card-deck mb-3 text-center">
               <div class="col-4">
                  <div class="card mb-4 shadow-sm">
                     <div class="card-header bg-dark text-white">
                        <h4 class="my-0 font-weight-bold">MCQ</h4>
                     </div>
                     <div class="card-body">
                        <img src="img/mcq.jpg" class="mb-1 rounded" height="100px" width="100px">
                        <p>Test test test mcq</p>
                        <h5 class="card-title pricing-card-title">Word Learned</h5>
                        <a href="mcq.php" class="btn btn-lg btn-block btn-dark text-white">Learn</a>
                     </div>
                  </div>
               </div>
               <div class="col-4">
                  <div class="card mb-4 shadow-sm">
                     <div class="card-header bg-dark text-white">
                        <h4 class="my-0 font-weight-bold">Rearrange</h4>
                     </div>
                     <div class="card-body">
                        <img src="img/re.jpg" class="mb-1 rounded" height="100px" width="100px">
                        <p>Test test test Rearrange</p>
                        <h5 class="card-title pricing-card-title">Word Learned</h5>
                        <a href="rearrange.php" class="btn btn-lg btn-block btn-dark text-white">Learn</a>
                     </div>
                  </div>
               </div>
               <div class="col-4">
                  <div class="card mb-4 shadow-sm">
                     <div class="card-header bg-dark text-white">
                        <h4 class="my-0 font-weight-bold">Fill in the blanks</h4>
                     </div>
                     <div class="card-body">
                        <img src="img/fill.jpg" class="mb-1 rounded" height="100px" width="100px">
                       <p>Test test test Fill in the blanks</p>
                        <h5 class="card-title pricing-card-title">Word Learned</h5>
                        <a href="manhattan_course.php" class="btn btn-lg btn-block btn-dark text-white">Learn</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>