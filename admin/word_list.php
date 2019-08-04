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

  /* Geting Barron All level Words */
  $get_barron_level_one_word = $pdo->prepare('SELECT * FROM level_one_word_barron');
  $get_barron_level_one_word->execute();
  $barron_word_one = $get_barron_level_one_word->fetchAll(PDO::FETCH_ASSOC);

  $get_barron_level_two_word = $pdo->prepare('SELECT * FROM level_two_word_barron');
  $get_barron_level_two_word->execute();
  $barron_word_two = $get_barron_level_two_word->fetchAll(PDO::FETCH_ASSOC);

  $get_barron_level_three_word = $pdo->prepare('SELECT * FROM level_three_word_barron');
  $get_barron_level_three_word->execute();
  $barron_word_three = $get_barron_level_three_word->fetchAll(PDO::FETCH_ASSOC);

  $get_barron_level_four_word = $pdo->prepare('SELECT * FROM level_four_word_barron');
  $get_barron_level_four_word->execute();
  $barron_word_four = $get_barron_level_four_word->fetchAll(PDO::FETCH_ASSOC);

  $get_barron_level_five_word = $pdo->prepare('SELECT * FROM level_five_word_barron');
  $get_barron_level_five_word->execute();
  $barron_word_five = $get_barron_level_five_word->fetchAll(PDO::FETCH_ASSOC);

  /* Geting Magoosh All level Words */
  $get_magoosh_level_one_word = $pdo->prepare('SELECT * FROM magoosh_level_one_word');
  $get_magoosh_level_one_word->execute();
  $magoosh_word_one = $get_magoosh_level_one_word->fetchAll(PDO::FETCH_ASSOC);

  $get_magoosh_level_two_word = $pdo->prepare('SELECT * FROM magoosh_level_two_word');
  $get_magoosh_level_two_word->execute();
  $magoosh_word_two = $get_magoosh_level_two_word->fetchAll(PDO::FETCH_ASSOC);

  $get_magoosh_level_three_word = $pdo->prepare('SELECT * FROM magoosh_level_three_word');
  $get_magoosh_level_three_word->execute();
  $magoosh_word_three = $get_magoosh_level_three_word->fetchAll(PDO::FETCH_ASSOC);

  $get_magoosh_level_four_word = $pdo->prepare('SELECT * FROM magoosh_level_four_word');
  $get_magoosh_level_four_word->execute();
  $magoosh_word_four = $get_magoosh_level_four_word->fetchAll(PDO::FETCH_ASSOC);

  $get_magoosh_level_five_word = $pdo->prepare('SELECT * FROM magoosh_level_five_word');
  $get_magoosh_level_five_word->execute();
  $magoosh_word_five = $get_magoosh_level_five_word->fetchAll(PDO::FETCH_ASSOC);

  /* Geting Manhattan All level Words */
  $get_manhattan_level_one_word = $pdo->prepare('SELECT * FROM manhattan_level_one_word');
  $get_manhattan_level_one_word->execute();
  $manhattan_word_one = $get_manhattan_level_one_word->fetchAll(PDO::FETCH_ASSOC);

  $get_manhattan_level_two_word = $pdo->prepare('SELECT * FROM manhattan_level_two_word');
  $get_manhattan_level_two_word->execute();
  $manhattan_word_two = $get_manhattan_level_two_word->fetchAll(PDO::FETCH_ASSOC);

  $get_manhattan_level_three_word = $pdo->prepare('SELECT * FROM manhattan_level_three_word');
  $get_manhattan_level_three_word->execute();
  $manhattan_word_three = $get_manhattan_level_three_word->fetchAll(PDO::FETCH_ASSOC);

  $get_manhattan_level_four_word = $pdo->prepare('SELECT * FROM manhattan_level_four_word');
  $get_manhattan_level_four_word->execute();
  $manhattan_word_four = $get_manhattan_level_four_word->fetchAll(PDO::FETCH_ASSOC);

  $get_manhattan_level_five_word = $pdo->prepare('SELECT * FROM manhattan_level_five_word');
  $get_manhattan_level_five_word->execute();
  $manhattan_word_five = $get_manhattan_level_five_word->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard | Admin Panel</title>


  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <style>
    .tab-content {
    border: 1px solid #ddd;
    padding: 10px;
    }

    .nav-tabs {
        margin-bottom: 0;
    }
  </style>
</head>
<body class="bg-dark">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Admin Panel | Gre</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav ml-md-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">DashBoard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Words List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-outline-danger" href="../signout.php">Sign Out</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row mt-5">
      <div class="col-12">
        <!-- Horizontal tab -->
            <nav>
              <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Barron Words</a>

                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Magoosh Words</a>

                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Manhattan Words</a>
              </div>
            </nav>
            


            <div class="tab-content text-dark" id="nav-tabContent">
              <div class="tab-pane fade show active h-75" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <h1 class="text-center text-success">Barron Words</h1>
                <hr>
                
                <h3 class="text-center bg-light p-3 my-2">Level One</h3>

                <table class="table table-dark table-striped text-center">
                  <thead>
                    <tr>
                      <th>Word</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($barron_word_one as $word): ?>
                      <tr>
                        <td><?php echo $word['word_name']; ?></td>
                        <td class="px-5"><?php echo $word['description']; ?></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

                <h3 class="text-center bg-light p-3  my-2">Level Two</h3><hr>

                <table class="table table-dark table-striped text-center">
                  <thead>
                    <tr>
                      <th>Word</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($barron_word_two as $word): ?>
                      <tr>
                        <td><?php echo $word['word_name']; ?></td>
                        <td class="px-5"><?php echo $word['description']; ?></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

                <h3 class="text-center bg-light p-3  my-2">Level Three</h3><hr>

                <table class="table table-dark table-striped text-center">
                  <thead>
                    <tr>
                      <th>Word</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($barron_word_three as $word): ?>
                      <tr>
                        <td><?php echo $word['word_name']; ?></td>
                        <td class="px-5"><?php echo $word['description']; ?></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

                <h3 class="text-center bg-light p-3  my-2">Level Four</h3><hr>

                <table class="table table-dark table-striped text-center">
                  <thead>
                    <tr>
                      <th>Word</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($barron_word_four as $word): ?>
                      <tr>
                        <td><?php echo $word['word_name']; ?></td>
                        <td class="px-5"><?php echo $word['description']; ?></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

                <h3 class="text-center bg-light p-3  my-2">Level Five</h3><hr>

                <table class="table table-dark table-striped text-center">
                  <thead>
                    <tr>
                      <th>Word</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($barron_word_five as $word): ?>
                      <tr>
                        <td><?php echo $word['word_name']; ?></td>
                        <td class="px-5"><?php echo $word['description']; ?></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

              </div>
              <div class="tab-pane fade h-75" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <h1 class="text-center text-success">Magoosh Words</h1>
                <hr>
                
                <h3 class="text-center bg-light p-3  my-2">Level One</h3>

                <table class="table table-dark table-striped text-center">
                  <thead>
                    <tr>
                      <th>Word</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($magoosh_word_one as $word): ?>
                      <tr>
                        <td><?php echo $word['word_name']; ?></td>
                        <td class="px-5"><?php echo $word['description']; ?></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

                <h3 class="text-center bg-light p-3  my-2">Level Two</h3><hr>

                <table class="table table-dark table-striped text-center">
                  <thead>
                    <tr>
                      <th>Word</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($magoosh_word_two as $word): ?>
                      <tr>
                        <td><?php echo $word['word_name']; ?></td>
                        <td class="px-5"><?php echo $word['description']; ?></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

                <h3 class="text-center bg-light p-3  my-2">Level Three</h3><hr>

                <table class="table table-dark table-striped text-center">
                  <thead>
                    <tr>
                      <th>Word</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($magoosh_word_three as $word): ?>
                      <tr>
                        <td><?php echo $word['word_name']; ?></td>
                        <td class="px-5"><?php echo $word['description']; ?></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

                <h3 class="text-center bg-light p-3  my-2">Level Four</h3><hr>

                <table class="table table-dark table-striped text-center">
                  <thead>
                    <tr>
                      <th>Word</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($magoosh_word_four as $word): ?>
                      <tr>
                        <td><?php echo $word['word_name']; ?></td>
                        <td class="px-5"><?php echo $word['description']; ?></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

                <h3 class="text-center bg-light p-3  my-2">Level Five</h3><hr>

                <table class="table table-dark table-striped text-center">
                  <thead>
                    <tr>
                      <th>Word</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($magoosh_word_five as $word): ?>
                      <tr>
                        <td><?php echo $word['word_name']; ?></td>
                        <td class="px-5"><?php echo $word['description']; ?></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

              </div>
              <div class="tab-pane fade h-75" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <h1 class="text-center text-success">Manhattan Words</h1>
                <hr>
                
                <h3 class="text-center bg-light p-3  my-2">Level One</h3>

                <table class="table table-dark table-striped text-center">
                  <thead>
                    <tr>
                      <th>Word</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($manhattan_word_one as $word): ?>
                      <tr>
                        <td><?php echo $word['word_name']; ?></td>
                        <td class="px-5"><?php echo $word['description']; ?></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

                <h3 class="text-center bg-light p-3  my-2">Level Two</h3><hr>

                <table class="table table-dark table-striped text-center">
                  <thead>
                    <tr>
                      <th>Word</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($manhattan_word_two as $word): ?>
                      <tr>
                        <td><?php echo $word['word_name']; ?></td>
                        <td class="px-5"><?php echo $word['description']; ?></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

                <h3 class="text-center bg-light p-3  my-2">Level Three</h3><hr>

                <table class="table table-dark table-striped text-center">
                  <thead>
                    <tr>
                      <th>Word</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($manhattan_word_three as $word): ?>
                      <tr>
                        <td><?php echo $word['word_name']; ?></td>
                        <td class="px-5"><?php echo $word['description']; ?></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

                <h3 class="text-center bg-light p-3  my-2">Level Four</h3><hr>

                <table class="table table-dark table-striped text-center">
                  <thead>
                    <tr>
                      <th>Word</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($manhattan_word_four as $word): ?>
                      <tr>
                        <td><?php echo $word['word_name']; ?></td>
                        <td class="px-5"><?php echo $word['description']; ?></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

                <h3 class="text-center bg-light p-3  my-2">Level Five</h3><hr>

                <table class="table table-dark table-striped text-center">
                  <thead>
                    <tr>
                      <th>Word</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($manhattan_word_five as $word): ?>
                      <tr>
                        <td><?php echo $word['word_name']; ?></td>
                        <td class="px-5"><?php echo $word['description']; ?></td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>

              </div>
            </div>
            <!-- Horizontal tab Ends-->
            
      </div>
    </div>
  </div>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>



