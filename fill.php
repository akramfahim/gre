<?php
require 'header.php';

ob_start();
session_start();
include "inc/config.php";
include "inc/CSRF_Protect.php";
$csrf = new CSRF_Protect();
require 'navbar.php';
$user_id = $_SESSION['user']['id'];

if (!isset($_SESSION['user'])) {
    $loggedIn = false;
    header('location: signin.php');
    exit;
} else {
    $loggedIn = true;
}

?>

<div class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-myColor rounded shadow-sm">
        <img class="mr-3" src="img/mcq.jpg" alt="" width="48" height="48">
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">Fill in the blanks</h6>
            <small class="font-weight-bold fs-1 text-white"><?php echo date('m/d/Y'); ?></small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <?php

$level_sql = $pdo->prepare("SELECT * FROM settings WHERE user_id=?");
$level_sql->execute(array($user_id));
$level_pass = $level_sql->fetchAll(PDO::FETCH_ASSOC);

if (empty($level_pass)) {
    $err_msg = "To Give the Test You Have to Completed Barron Level Atleast";
} else if ($level_pass[0]['manhattan'] == 'Completed') {

    $statement = $pdo->prepare("SELECT * FROM `word_table` ORDER BY RAND() limit 5");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
} else if ($level_pass[0]['magoosh'] == 'Completed') {

    $statement = $pdo->prepare("SELECT * FROM `word_table` where type='barron' OR type='magoosh' ORDER BY RAND() limit 5");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

} else if ($level_pass[0]['barron'] == 'Completed') {

    $statement = $pdo->prepare("SELECT * FROM `word_table` where type='barron' ORDER BY RAND() limit 5");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

}

?>

            <?php if (isset($err_msg)): ?>
            <div class="alert alert-danger">
                <h3><?php echo $err_msg; ?></h3>
            </div>
            <?php else: ?>
            <form action="form/fill.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
                <?php foreach ($results as $key => $row3) {?>

                <h6>Q: <b>
                        <?php
$word = $row3['word'];
    $len = strlen($word);
    $number = rand(1, $len);
    $word[$number] = '_';
    echo $word;
    ?>
                        ?
                    </b></h6>
                <hr>
                <input type="hidden" name="question_id<?php echo $key; ?>" value="<?php echo $row3['id']; ?>">
                <input type="text" class="form-check-group" name="answer<?php echo $key; ?>" required="required">
                <br>
                <hr />
                <?php }?>
                <button class="btn btn-success btn-block" type="submit" name="submit"> Submit </button>
            </form>
            <?php endif?>



        </div>
    </div>
</div>