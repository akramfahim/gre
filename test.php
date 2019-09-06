<?php
include "header.php";

ob_start();
session_start();
include "inc/config.php";
include "inc/CSRF_Protect.php";
$csrf = new CSRF_Protect();
$error_message = '';
$success_message = '';

/* Level One Question Barron*/
$ques_id = '';
$correct_ans = '';

$statementOne = $pdo->prepare("SELECT * FROM level_one_question ORDER BY RAND() limit 1");
$statementOne->execute();
$resultOne = $statementOne->fetchAll(PDO::FETCH_ASSOC);

/* Get Random First Question */
$ques_id = $resultOne[0]['id'];
$random_question = $resultOne[0]['question'];

$ModalQuestionOne = $pdo->prepare("SELECT * FROM level_one_question_option where level_one_question_option.question_id = " . $ques_id . " limit 4");
$ModalQuestionOne->execute();
$resultModalOne = $ModalQuestionOne->fetchAll(PDO::FETCH_ASSOC);

require 'navbar.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12 offset-md-3 align-self-center">
            <?php
if (!empty($_SESSION['success_message'])) {
    echo '<div class="alert alert-success"><h3 class="text-center"> ' . $_SESSION['success_message'] . '</h3></div>';
    unset($_SESSION['success_message']);
}

if (!empty($_SESSION['error_message'])) {
    echo '<div class="alert alert-danger"><h3 class="text-center"> ' . $_SESSION['error_message'] . '</h3></div>';
    unset($_SESSION['error_message']);
}
?>

            <div class="card my-3">
                <div class="card-header">
                    <h2 class="text-center">Test Your Vocabs Range</h2>
                </div>
                <div class="card-body">
                    <form action="form/test_action.php" method="post">

                        <h5>Q: <b> <?php echo $random_question; ?> ?</b></h5>
                        <hr>

                        <input type="hidden" name="question_id" value="<?php echo $ques_id ?>">

                        <?php foreach ($resultModalOne as $row3) {

    ?>
                        <input type="radio" class="form-check-group" name="answer" required="required"
                            value="<?php echo $row3['option'] ?>"> <?php echo $row3['option'] ?> <br>
                        <?php
}
?>

                        <button type="submit" class="btn btn-block btn-primary mt-3" name="test_submit">Submit</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="signin.php">Login for more words</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";

$text = "hello";

$len = strlen($text);
$number = rand(1, $len);

$text[$number] = '_';
echo $text;
?>