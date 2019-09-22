<?php
ob_start();
session_start();
include "../inc/config.php";
include "../inc/CSRF_Protect.php";
$csrf = new CSRF_Protect();
$success_msg ='';
$error_msg = '';


$loggedIn = true;
if (!isset($_SESSION['admin'])) {
    $loggedIn = false;
    header('location: login.php');
    exit;
} else {
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

//add word
if (isset($_POST['add_word'])) {

    $valid = 1;

    if (empty($_POST['word'])) {
        $valid = 0;
        $error_message .= "word can not be empty<br>";
    }

    if (empty($_POST['description'])) {
        $valid = 0;
        $error_message .= 'description can not be empty<br>';
    } 

    if (empty($_POST['type']) || empty($_POST['level'])) {
        $valid = 0;
        $error_message .= "type and level can not be empty<br>";
    }

    if ($valid == 1) {

        // saving into the database
        $statement = $pdo->prepare("INSERT INTO word_table (word,description,type,level) VALUES (?,?,?,?)");
        $statement->execute(array($_POST['word'], $_POST['description'],$_POST['type'],$_POST['level']));

        $success_message = 'Word added Successfull.';
        
    }
}

//add question


if (isset($_POST['add_question'])) {

    $valid = 1;

    if (empty($_POST['question'])) {
        $valid = 0;
        $error_message .= "question can not be empty<br>";
    }

    if (empty($_POST['answer'])) {
        $valid = 0;
        $error_message .= 'all field are required<br>';
    } 

    if (empty($_POST['type']) || empty($_POST['level'])) {
        $valid = 0;
        $error_message .= "type and level can not be empty<br>";
    }

    if ($valid == 1) {

        // saving into the database
        $statement = $pdo->prepare("INSERT INTO question (question,answer,option1,option2,option3,option4,type,level) VALUES (?,?,?,?,?,?,?,?)");
        $statement->execute(array($_POST['question'], $_POST['answer'],$_POST['option1'],$_POST['option2'],$_POST['option3'],$_POST['option4'],$_POST['level'],$_POST['type']));

        $success_message = 'Added Successfull.';
        
    }
}

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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
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
                                    <a href="word_list.php" class="btn btn-warning btn-block text-white">Check Words</a>
                                    <button type="button" class="btn btn-primary btn-block mt-2" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Add Word
                                    </button>
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
                                    <a href="question_list.php" class="btn btn-warning btn-block text-white">Check Questions</a>
                                    <button type="button" class="btn btn-primary btn-block mt-2" data-toggle="modal"
                                        data-target="#exampleModal1">
                                        Add Question
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        //add words
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Word</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="word">Word</label>
                                <input type="text" name="word" class="form-control" id="word"
                                    aria-describedby="word" placeholder="Type your word" required>
                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <textarea name="description" class="form-control" id="Description" rows="3" required></textarea>
                            </div>
                         <div class="form-group">
                            <label for="level">Select Type</label>
                            <select name="type" class="form-control" id="level" required>
                            <option value="barron">Barron</option>
                            <option value="magoosh">Magoosh</option>
                            <option value="manhattan">Manhattan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="level">Select Level</label>
                            <select name="level" class="form-control" id="level" required>
                            <option value="one">1</option>
                            <option value="two">2</option>
                            <option value="three">3</option>
                            <option value="four">4</option>
                            <option value="five">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add_word" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        //add question
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Add Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="question">Question</label>
                                <input type="text" name="question" class="form-control" id="question"
                                    aria-describedby="question" placeholder="Type your question" required>
                            </div>
                            <div class="form-group">
                                <label for="answer">answer</label>
                                <input type="text" name="answer" class="form-control" id="answer"
                                    aria-describedby="answer" placeholder="Type your answer" required>
                            </div>
                            <div class="form-group">
                                <label for="option1">Option 1</label>
                                <input type="text" name="option1" class="form-control" id="option1"
                                    aria-describedby="option1" placeholder="Type your option1" required>
                            </div>
                            <div class="form-group">
                                <label for="option2">option 2</label>
                                <input type="text" name="option2" class="form-control" id="option2"
                                    aria-describedby="option2" placeholder="Type your option2" required>
                            </div>
                            <div class="form-group">
                                <label for="option3">option 3</label>
                                <input type="text" name="option3" class="form-control" id="option3"
                                    aria-describedby="option3" placeholder="Type your option3" required>
                            </div>
                            <div class="form-group">
                                <label for="option4">option 4</label>
                                <input type="text" name="option4" class="form-control" id="option4"
                                    aria-describedby="option4" placeholder="Type your option4" required>
                            </div>
                         <div class="form-group">
                            <label for="level">Select Type</label>
                            <select name="type" class="form-control" id="level" required>
                            <option value="barron">Barron</option>
                            <option value="magoosh">Magoosh</option>
                            <option value="manhattan">Manhattan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="level">Select Level</label>
                            <select name="level" class="form-control" id="level" required>
                            <option value="one">1</option>
                            <option value="two">2</option>
                            <option value="three">3</option>
                            <option value="four">4</option>
                            <option value="five">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add_question" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
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
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($users as $user) {?>

                        <tr>
                            <td><?php echo $user['username'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <!--<td><?php echo $user['userType'] ?></td> -->
                            <?php if ($user['userType'] == "1") {?>
                            <td>
                                <?php
                                    if (isset($_POST['remove'])) {

                                        $id = $_POST['user_id'];
                                        $user_Type = 0;
                                        $update_stmt = $pdo->prepare("UPDATE users SET userType = ? WHERE id = ?");
                                        $done_update = $update_stmt->execute(array($user_Type, $id));
                                        header("Refresh:0");
                                    }

                                        ?>
                                <badge class="badge badge-success p-3">Admin</badge>
                                <form method="post" action="">
                                    <input type="hidden" value="<?php echo $user['id']; ?>" name="user_id" />
                                    <button type="submit" class="btn btn-danger mt-1" name="remove">Remove</button>
                                </form>

                            </td>
                            <?php } else {?>
                            <td>
                                <?php
                            if (isset($_POST['admin'])) {

                                $id = $_POST['user_id'];
                                $user_Type = 1;
                                $update_stmt = $pdo->prepare("UPDATE users SET userType = ? WHERE id = ?");
                                $done_update = $update_stmt->execute(array($user_Type, $id));
                                header("Refresh:0");
                            }

                                ?>
                                <badge class="badge badge-primary p-3">Pro User</badge>
                                <form method="post" action="">
                                    <input type="hidden" value="<?php echo $user['id']; ?>" name="user_id" />
                                    <button type="submit" class="btn btn-danger mt-1" name="admin">Make Admin</button>
                                </form>
                            </td>
                            <?php }?>
                        </tr>

                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>

</html>