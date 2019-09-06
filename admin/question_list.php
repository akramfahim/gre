<?php
ob_start();
session_start();
include "../inc/config.php";
include "../inc/CSRF_Protect.php";
$csrf = new CSRF_Protect();

$loggedIn = true;
if (!isset($_SESSION['admin'])) {
    $loggedIn = false;
    header('location: login.php');
    exit;
} else {
    $loggedIn = true;
}

$get_barron_question = $pdo->prepare("SELECT * FROM question WHERE type=?");
$get_barron_question->execute(array('barron'));
$barron_questions = $get_barron_question->fetchAll(PDO::FETCH_ASSOC);

$get_magoosh_question = $pdo->prepare("SELECT * FROM question WHERE type=?");
$get_magoosh_question->execute(array('magoosh'));
$magoosh_questions = $get_magoosh_question->fetchAll(PDO::FETCH_ASSOC);

$get_manhattan_question = $pdo->prepare("SELECT * FROM question WHERE type=?");
$get_manhattan_question->execute(array('manhattan'));
$manhattan_questions = $get_manhattan_question->fetchAll(PDO::FETCH_ASSOC);

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
        <a class="navbar-brand" href="index.php">Admin Panel | Gre</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-md-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">DashBoard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="word_list.php">Words List</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Question List</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link btn btn-outline-danger" href="../signout.php">Sign Out</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12">
                <!-- Horizontal tab -->
                <nav>
                    <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">Barron question</a>

                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="false">Magoosh question</a>

                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                            role="tab" aria-controls="nav-contact" aria-selected="false">Manhattan question</a>
                    </div>
                </nav>

                <div class="tab-content text-dark" id="nav-tabContent">
                    <div class="tab-pane fade show active h-75" id="nav-home" role="tabpanel"
                        aria-labelledby="nav-home-tab">
                        <h1 class="text-center text-success">Barron Question</h1>
                        <hr>


                        <table class="table table-dark table-striped text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Question</th>
                                    <th scope="col">Answer</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($barron_questions as $barron_question): ?>
                                <tr>
                                    <td><?php echo $barron_question['question']; ?></td>
                                    <td><?php echo $barron_question['answer']; ?></td>
                                    <td><button
                                            class="btn btn-info"><?php echo strtoupper($barron_question['level']); ?></button>
                                    </td>
                                    <td><a href="question_edit.php?id=<?php echo $barron_question['id'] ?>"
                                            class="btn btn-primary">UPDATE</a></td>
                                </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane fade h-75" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <h1 class="text-center text-success">Magoosh Questions</h1>
                        <hr>

                        <table class="table table-dark table-striped text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Question</th>
                                    <th scope="col">Answer</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($magoosh_questions as $magoosh_question): ?>
                                <tr>
                                    <td><?php echo $magoosh_question['question']; ?></td>
                                    <td><?php echo $magoosh_question['answer']; ?></td>
                                    <td><button
                                            class="btn btn-info"><?php echo strtoupper($magoosh_question['level']); ?></button>
                                    </td>
                                    <td><a href="question_edit.php?id=<?php echo $magoosh_question['id'] ?>"
                                            class="btn btn-primary">UPDATE</a></td>
                                </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane fade h-75" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <h1 class="text-center text-success">Manhattan Questions</h1>
                        <hr>

                        <table class="table table-dark table-striped text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Question</th>
                                    <th scope="col">Answer</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($manhattan_questions as $manhattan_question): ?>
                                <tr>
                                    <td><?php echo $manhattan_question['question']; ?></td>
                                    <td><?php echo $manhattan_question['answer']; ?></td>
                                    <td><button
                                            class="btn btn-info"><?php echo strtoupper($manhattan_question['level']); ?></button>
                                    </td>
                                    <td><a href="question_edit.php?id=<?php echo $manhattan_question['id'] ?>"
                                            class="btn btn-primary">UPDATE</a></td>
                                </tr>
                                <?php endforeach?>
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