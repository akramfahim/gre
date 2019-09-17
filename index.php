<?php
include "header.php";

ob_start();
session_start();
include "inc/config.php";
include "inc/CSRF_Protect.php";
$csrf = new CSRF_Protect();
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';
$loggedIn = false;

// Check if the user is logged in or not
if (isset($_SESSION['user'])) {
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
            <h5 class="display-4 font-weight-bold">You will ROCK your GRE!</h5>
            <p class="lead my-3 ont-weight-bold">We offer a tools to help you prepare for the GRE® General Test so you
                can feel more confident on test day.</p>
            <a href="course.php" class="btn btn-outline-info text-white font-weight-bold btn-lg">Start Learning</a>
        </div>
    </div>
</div>


<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <div class="blog-post ">
                <h2 class="blog-post-title"> Graduate Record Examinations</h2>
                <hr>

                <p>The Graduate Record Examinations is a standardized test that is an admissions requirement for most
                    graduate schools in the United States. The GRE is owned and administered by Educational Testing
                    Service. The test was established in 1936 by the Carnegie Foundation for the Advancement of Teaching
                </p>
                <hr>
                <p><strong>Purpose:</strong> to master's and doctoral degree programs in various universities</p>
                <p><strong>Scores / grades used by:</strong> Most graduate schools in USA, and few in other countries
                </p>
                <p><strong>Score / grade validity:</strong> 5 years</p>
                <p><strong>Developer / administrator: :</strong> Educational Testing Service</p>

                <h2 class="blog-post-title">Overview of the GRE test</h2>
                <hr>
                <p>The GRE test is divided into three main sections. The Analytical Writing section is always presented
                    first. The other two sections are the Verbal and Quantitative sections and they may appear in any
                    order and may include un-scored and research sections with questions that are being considered for
                    use in future tests. (Your answers on these won’t count towards your score, but since you won’t know
                    which questions are legitimate and which aren’t, you should treat every portion of the test as if it
                    counts.)

                    You can take the GRE exam on paper or on a computer. GRE testing time will vary depending on which
                    version of the test you take and the potential presence of unscored research sections, but plan to
                    set aside at least three hours.

                    If you end up taking the paper-based version of the GRE, you should plan on spending a bit more time
                    in the test center. The paper version has two verbal and two quantitative sections. Similar to the
                    computer version of the test, the paper-based GRE examination may also include an unscored section.

                    Most students take the computer-adaptive version of the test, meaning that for the verbal and
                    quantitative portions, the test adapts the difficulty level of its questions each time you submit an
                    answer. Each student starts out with questions of average difficulty. Each time you enter an answer,
                    the computer scores it immediately, compares it with your preceding responses, and then presents a
                    question suited to your level. If you answer correctly, the questions become more difficult.
                    Incorrect answers result in the next question being slightly less difficult.</p>
                <h2 class="blog-post-title">What You Need to Know</h2>
                <hr>
                <p>If you’re planning on going to graduate school, you’ll probably need to take the GRE test (or the
                    “Graduate Record Exam”). It’s the most commonly required admission test for grad school.

                    Much like the SAT and ACT, the GRE exam is a broad assessment of your critical thinking, analytical
                    writing, verbal reasoning, and quantitative reasoning skills — all skills developed over the course
                    of many years. Some schools may also require you to take one or more GRE Subject Tests.

                    The purpose of each GRE examination, of course, is to help graduate schools decide if you’ve got the
                    right stuff for their program.</p>

                <h2 class="blog-post-title">Verbal section of the GRE test</h2>
                <hr>
                <p>Similar to portions of other exams you’ve probably taken, the Verbal section of the GRE test includes
                    things like sentence completions, analogies, antonyms, and reading comprehension questions. Its
                    purpose is to test your ability to form conclusions from written materials, recognize relationships
                    between concepts and words, and to determine relationships between different parts of sentences.

                    If you take the GRE on a computer, expect to answer 30 questions within 30 minutes. On the paper
                    version of the test, there are two segments, each 30 minutes long and each with 38 questions.</p>

                <h2 class="blog-post-title mb-4">Math section of the GRE test</h2>
                <hr>
                <p>The Quantitative section of the GRE tests high-school-level math. If you’re a bit rusty, start honing
                    your skills in arithmetic, algebra, geometry, and data analysis. This portion of the exam aims to
                    test your skill at solving a variety of different math problems, as well as to analyze your ability
                    to use quantitative reasoning.

                    For the computer version, you’ll need to answer 28 questions in 45 minutes, but on the paper version
                    you’ll have two 30-minute segments, each with 30 questions.

                    You’ll probably notice similarities between the GRE and other tests you may have taken before you
                    started college. You should prepare for this test much like you did the others, with GRE practice
                    and GRE preparation, but don’t feel daunted or intimidated just because it’s a test for graduate
                    school — you’ll be fine!</p>


            </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
            <div class="p-3">
                <ul class="list-group">
                    <li class="list-group-item text-center bg-info text-center font-weight-bold">Start Learning</li>
                    <li class="list-group-item">Barron</li>
                    <li class="list-group-item">Magoosh</li>
                    <li class="list-group-item">Manhattan</li>
                </ul>
            </div>

            <div class="p-3">
            <h4>HOW LONG IS THE GRE?</h4>
                <table class="table table-responsive table table-bordered table-responsive">
                    <tbody>
                        <tr>

                            <td>
                                <p><strong>GRE Section</strong></p>
                            </td>

                            <td>
                                <p><strong>Time</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p> Analytical Writing</p>
                            </td>

                            <td>
                                <p> 30 minutes per task</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p> Verbal Reasoning</p>
                            </td>

                            <td>
                                <p> 30 minutes per section</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p> Quantitative Reasoning</p>
                            </td>

                            <td>
                                <p> 35 minutes per section</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p> Experimental or Unscored</p>
                            </td>

                            <td>
                                <p> Varies (30 or 35 minutes)</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p> Optional Breaks (total)</p>
                            </td>

                            <td>
                                <p> Approximately 12 minutes</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Total</p>
                            </td>

                            <td>
                                <p>Approximately 4 hours</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </aside><!-- /.blog-sidebar -->
    </div><!-- /.row -->
</main>
<!--       </div> -->

<?php
include "footer.php";
?>