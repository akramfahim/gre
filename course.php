<?php 
  
  require "header.php";
  ob_start();
    session_start();
    include("inc/config.php");
    include("inc/CSRF_Protect.php");
    $csrf = new CSRF_Protect();

    $loggedIn= false;

    // Check if the user is logged in or not
    if(isset($_SESSION['user'])) {
        $loggedIn = true;
    }else{
        $loggedIn = false;
        header('location:signin.php');
        exit;
    }

?>       
<?php require 'navbar.php'; ?>
        
<!-- Content start -->              
<section class="container-fluid">
    
    <div class="row">
        <div class="col-md-2 col-sm-12 mx-auto">
            <div class="card my-5">
                <div class="card-header text-center text-white font-weight-bold">
                    Profile
                </div>
                <div class="card-body text-center">
                    <img src="img/avatar.png" class="img-fluid mb-1 rounded-circle">
                    <h4 class="card-text"><?php echo $_SESSION['user']['username']; ?></h4>
                    <h6 class="card-text"><?php echo $_SESSION['user']['email']; ?></h6>
                    <a href="signout.php" class="btn btn-block btn-outline-danger">Signout</a>
                </div>
            </div>
        </div>
        <div class="col-md-10 col-sm-12">
            <div class="pricing-header py-3 mx-auto text-center">
                <h1 class="display-4 text-dark font-weight-bold">All Courses</h1>
            </div>
            <div class="container-fluid"> <!-- Start OF SECOND CONTAINER FLUID -->
            <div class="row card-deck mb-3 text-center">
               <div class="col-md-4 col-sm-12">
                  <div class="card mb-4 shadow-sm">
                     <div class="card-header text-white">
                        <h4 class="my-0 font-weight-bold">Barron</h4>
                     </div>
                     <div class="card-body">
                        <img src="img/barron_copy.png" class="img-fluid mb-1 rounded">
                        <p>Barron's 800 Essential Word List - GRE</p>
                        <h5 class="card-title pricing-card-title">Word Learned</h5>
                        <div class="progress mb-3">
                           <div class="progress-bar bg-info" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                        </div>
                        <a  href="single_course.php" class="btn btn-lg btn-block btn-info text-white">Learn</a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <div class="card mb-4 shadow-sm">
                     <div class="card-header text-white">
                        <h4 class="my-0 font-weight-bold">Manhattan</h4>
                     </div>
                     <div class="card-body">
                        <img src="img/Magoosh_copy.jpg" class="img-fluid mb-1 rounded">
                        <p>Barron's 800 Essential Word List - GRE</p>
                        <h5 class="card-title pricing-card-title">Word Learned</h5>
                        <div class="progress mb-3">
                           <div class="progress-bar bg-info" role="progressbar" style="width: 30%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">30%</div>
                        </div>
                        <button type="button" class="btn btn-lg btn-block btn-info text-white">Learn</button>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <div class="card mb-4 shadow-sm">
                     <div class="card-header text-white">
                        <h4 class="my-0 font-weight-bold">Magoosh</h4>
                     </div>
                     <div class="card-body">
                        <img src="img/Manhattan_copy.png" class="img-fluid mb-1 rounded">
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
          </div>  <!-- END OF SECOND CONTAINER FLUID -->
        </div>
    </div>
</section>
<!-- Content end -->


<?php require "footer.php";?>