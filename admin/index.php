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

  $barronWords_level_one = $pdo->prepare("SELECT count(*) FROM level_one_word_barron");
  $barronWords_level_one->execute();
  $barron_words_one = $barronWords_level_one->fetchColumn();

  $barronWords_level_two = $pdo->prepare("SELECT count(*) FROM level_two_word_barron");
  $barronWords_level_two->execute();
  $barron_words_two = $barronWords_level_two->fetchColumn();

  $barronWords_level_three = $pdo->prepare("SELECT count(*) FROM level_three_word_barron");
  $barronWords_level_three->execute();
  $barron_words_three = $barronWords_level_three->fetchColumn();

  $barronWords_level_four = $pdo->prepare("SELECT count(*) FROM level_four_word_barron");
  $barronWords_level_four->execute();
  $barron_words_four = $barronWords_level_four->fetchColumn();

  $barronWords_level_five = $pdo->prepare("SELECT count(*) FROM level_five_word_barron");
  $barronWords_level_five->execute();
  $barron_words_five = $barronWords_level_five->fetchColumn();


  $number_of_barron_words = $barron_words_one 
                            +$barron_words_two 
                            +$barron_words_three
                            +$barron_words_four
                            +$barron_words_five;



  $magooshWords_one = $pdo->prepare("SELECT count(*) FROM magoosh_level_one_word");
  $magooshWords_one->execute();
  $magoosh_words_one = $magooshWords_one->fetchColumn();

  $magooshWords_two = $pdo->prepare("SELECT count(*) FROM magoosh_level_two_word");
  $magooshWords_two->execute();
  $magoosh_words_two = $magooshWords_two->fetchColumn();

  $magooshWords_three = $pdo->prepare("SELECT count(*) FROM magoosh_level_three_word");
  $magooshWords_three->execute();
  $magoosh_words_three = $magooshWords_three->fetchColumn();

  $magooshWords_four = $pdo->prepare("SELECT count(*) FROM magoosh_level_four_word");
  $magooshWords_four->execute();
  $magoosh_words_four = $magooshWords_four->fetchColumn();

  $magooshWords_five = $pdo->prepare("SELECT count(*) FROM magoosh_level_five_word");
  $magooshWords_five->execute();
  $magoosh_words_five = $magooshWords_five->fetchColumn();

  $number_of_magoosh_words = $magoosh_words_one
                             +$magoosh_words_two
                             +$magoosh_words_three
                             +$magoosh_words_four
                             +$magoosh_words_five;


  $manhattanWords_one = $pdo->prepare("SELECT count(*) FROM manhattan_level_one_word");
  $manhattanWords_one->execute();
  $manhattan_words_one = $manhattanWords_one->fetchColumn();

  $manhattanWords_two = $pdo->prepare("SELECT count(*) FROM manhattan_level_two_word");
  $manhattanWords_two->execute();
  $manhattan_words_two = $manhattanWords_two->fetchColumn();

  $manhattanWords_three = $pdo->prepare("SELECT count(*) FROM manhattan_level_three_word");
  $manhattanWords_three->execute();
  $manhattan_words_three = $manhattanWords_three->fetchColumn();

  $manhattanWords_four = $pdo->prepare("SELECT count(*) FROM manhattan_level_four_word");
  $manhattanWords_four->execute();
  $manhattan_words_four = $manhattanWords_four->fetchColumn();

  $manhattanWords_five = $pdo->prepare("SELECT count(*) FROM manhattan_level_five_word");
  $manhattanWords_five->execute();
  $manhattan_words_five = $manhattanWords_five->fetchColumn();

  $number_of_manhattan_words = $manhattan_words_one
                               +$manhattan_words_two
                               +$manhattan_words_three
                               +$manhattan_words_four
                               +$manhattan_words_five;


  $number_of_words = $number_of_barron_words + $number_of_magoosh_words + $number_of_manhattan_words;

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
          <a class="nav-link btn btn-success" href="word_insert.php">Insert a new Word</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-outline-danger" href="../signout.php">Sign Out</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <div class="container-fluid">
          <div class="row mt-5">
            <div class="col-md-6">
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
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="text-center">Words</h3>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Total Words Number</h5>
                  <h1 class="text-center text-success"><?php echo $number_of_words; ?></h1>
                  <a href="word_list.php" class="btn btn-primary btn-block">Check Words</a>
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



