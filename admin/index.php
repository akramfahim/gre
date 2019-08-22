<?php 
  ob_start();
  session_start();
  include("../inc/config.php");
  include("../inc/CSRF_Protect.php");
  $csrf = new CSRF_Protect();

  $loggedIn = true;
  if(!isset($_SESSION['admin'])) {
    $loggedIn = false;
    header('location: ../index.php');
    exit;
  }else{
      $loggedIn = true;
  }

  $userlist = $pdo->prepare('SELECT * FROM users');
  $userlist->execute();
  $users = $userlist->fetchAll(PDO::FETCH_ASSOC);
  $number_of_users = count($users);

  
  $words_info = $pdo->prepare('SELECT * FROM word_table');
  $words_info->execute();
  $words = $words_info->fetchAll(PDO::FETCH_ASSOC);
  $number_of_words = count($words);

  $questions_info = $pdo->prepare("SELECT * from question");
  $questions_info->execute();
  $questions = $questions_info->fetchAll(PDO::FETCH_ASSOC);
  $number_of_questions = count($questions);


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
    <a class="navbar-brand" href="#">Admin Panel | Gre</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav ml-md-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">DashBoard <span class="sr-only">(current)</span></a>
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

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="container-fluid">
          <div class="row mt-5">
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="text-center">Users</h3>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Total Active Users</h5>
                  <h1 class="text-center text-success"><?php echo $number_of_users; ?></h1>
                  <a href="#userlist" class="btn btn-primary btn-block">Users List</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="text-center">Total Words</h3>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Total Words Number</h5>
                  <h1 class="text-center text-success"><?php echo $number_of_words; ?></h1>
                  <a href="word_list.php" class="btn btn-primary btn-block">Check Words</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="text-center">Total Questions</h3>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Total Questions Number</h5>
                  <h1 class="text-center text-success"><?php echo $number_of_questions; ?></h1>
                  <a href="question_list.php" class="btn btn-primary btn-block">Check Questions</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container" id="userlist">
    <div class="row mt-5 bg-light">
      <div class="col-12">
        <h2 class="text-center text-dark py-3">Users List</h2>
        <hr>
        <table class="table table-dark table-striped text-center">
          <thead>
            <tr>
              <th>Username</th>
              <th>Email</th>
              <th>Level</th>
            </tr>
          </thead>
          <tbody>
            
            <?php foreach ($users as $user) { ?>

            <tr>
              <td><?php echo $user['username'] ?></td>
              <td><?php echo $user['email'] ?></td> 
              <!--<td><?php echo $user['userType'] ?></td> -->
              <?php if ($user['userType'] == "1") {?>
                <td><button class="btn btn-success">Admin</button></td>
              <?php } else { ?>
                <td><button class="btn btn-primary">Pro User</button></td>
              <?php  } ?>
            </tr>

            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>



