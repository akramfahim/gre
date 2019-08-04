<?php
   include "header.php";

      ob_start();
     session_start();
     include("inc/config.php");
     include("inc/CSRF_Protect.php");
     $csrf = new CSRF_Protect();
     $error_message = '';
     $success_message = '';
     $error_message1 = '';
     $success_message1 = '';
     $loggedIn= false;

     // Check if the user is logged in or not
     if(isset($_SESSION['user'])) {
       $loggedIn = true;
     }

   require 'navbar.php'; 
?>

         <div class="container jumbotron p-4 p-md-5 text-white rounded bg-myColor">
            <div class="row">
               <div class="col-md-4 px-0">
                  <img src="img/logo.jpg" class="mt-1 rounded-circle" height="280px" width="300px">
               </div>
               <div class="col-md-8 px-0">
                  <h5 class="display-4 font-weight-bold">GRE</h5>
                  <p class="lead my-3">Test takers preparing to take the GRE (Graduate Record Exam) must command a high-level vocabulary to achieve a high score. This course includes the definitions of 333 words often appearing on the GRE.</p>
                  <button class="btn btn-outline-info text-white font-weight-bold btn-lg">Start Learning</button>
               </div>
            </div>
         </div>


         <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4 text-dark font-weight-bold">All Courses</h1>
         </div>
         <div class="container">
            <div class="row card-deck mb-3 text-center">
               <div class="col-4">
                  <div class="card mb-4 shadow-sm">
                     <div class="card-header bg-myColor text-white">
                        <h4 class="my-0 font-weight-bold">Barron</h4>
                     </div>
                     <div class="card-body">
                        <img src="img/barron.png" class="mb-1 rounded" height="100px" width="100px">
                        <p>Barron's 800 Essential Word List - GRE</p>
                        <h5 class="card-title pricing-card-title">Word Learned</h5>
                        <div class="progress mb-3">
                           <div class="progress-bar bg-info" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                        </div>
                        <button type="button" class="btn btn-lg btn-block btn-info text-white">Learn</button>
                     </div>
                  </div>
               </div>
               <div class="col-4">
                  <div class="card mb-4 shadow-sm">
                     <div class="card-header bg-myColor text-white">
                        <h4 class="my-0 font-weight-bold">Magoosh</h4>
                     </div>
                     <div class="card-body">
                        <img src="img/Magoosh.jpg" class="mb-1 rounded" height="100px" width="100px">
                        <p>Barron's 800 Essential Word List - GRE</p>
                        <h5 class="card-title pricing-card-title">Word Learned</h5>
                        <div class="progress mb-3">
                           <div class="progress-bar bg-info" role="progressbar" style="width: 30%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">30%</div>
                        </div>
                        <button type="button" class="btn btn-lg btn-block btn-info text-white">Learn</button>
                     </div>
                  </div>
               </div>
               <div class="col-4">
                  <div class="card mb-4 shadow-sm">
                     <div class="card-header bg-myColor text-white">
                        <h4 class="my-0 font-weight-bold">Manhattan</h4>
                     </div>
                     <div class="card-body">
                        <img src="img/Manhattan.png" class="mb-1 rounded" height="100px" width="100px">
                        <p>Barron's 800 Essential Word List - GRE</p>
                        <h5 class="card-title pricing-card-title">Word Learned</h5>
                        <div class="progress mb-3">
                           <div class="progress-bar bg-info" role="progressbar" style="width: 30%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">30%</div>
                        </div>
                        <button type="button" class="btn btn-lg btn-block btn-info text-white">Learn</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
<!--       </div> -->

<?php
   include "footer.php";
?>
      