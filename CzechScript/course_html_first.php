<?php
require "header.php";
?>
<main>
    <div class="course_wraper">
        <div class="course_html">
            <?php
            require_once "includes/html_first_fill_inc.php";
            echo '<div class="intro">
                        <span>HTML</span>
                        <div class="intro_text">
                            <h2>HTML</h2>
                            <p>This FREE course will teach you how to design a web page using HTML. Complete a series of hands-on exercises and practice while writing real HTML code.</p>
                        </div>
                    </div>
                    <div class="lesson lesson_height">
                        <div class="lesson_top">
                            <i class="fas fa-code"></i>
                            <h3>Overview</h3>
                            <span>';
            if ($_SESSION["proghtml"] > 4) {
                echo "1";
            } else {
                echo "0";
            }
            echo '/5</span>
                            <i class="fas fa-chevron-up"></i>
                        </div>
                        <div class="lessons lessons_visible">
                            <div class="quizze">
                                <h3>What is HTML?</h3>
                                <p>2 quizzes</p>
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="quizze">
                                <h3>Basic HTML Document Structure</h3>
                                <p>3 quizzes</p>
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="quizze">
                                <h3>Creating Your First HTML Page</h3>
                                <p>3 quizzes</p>
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="quizze">
                                <h3>Module 1 Quiz </h3>
                                <p>4 quizzes</p>
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                    </div>
                    <div class="lesson lesson_height">
                        <div class="lesson_top">
                            <i class="fab fa-bootstrap"></i>
                            <h3>HTML Basic</h3>
                            <i class="fas fa-chevron-up"></i>
                        </div>
                        <div class="lessons lessons_visible">
                            <div class="quizze">
                                <h3>Paragraphs</h3>
                                <p>3 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Text Formatting</h3>
                                <p>2 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Headings, Lines, Comments</h3>
                                <p>3 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Blog Project: About Me</h3>
                                <p>1 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Elements</h3>
                                <p>2 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Attributes</h3>
                                <p>4 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Images</h3>
                                <p>4 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Links</h3>
                                <p>3 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Lists</h3>
                                <p>2 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Blog Project: My Skills</h3>
                                <p>1 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Tables</h3>
                                <p>4 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Blog Project: My Schedule</h3>
                                <p>1 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Inline and Block Elements</h3>
                                <p>2 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Forms</h3>
                                <p>4 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Blog Project: Contact Form</h3>
                                <p>1 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>HTML Colors</h3>
                                <p>4 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Frames</h3>
                                <p>2 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Blog Project: Putting it All Together</h3>
                                <p>1 quizzes</p>
                            </div>
                            <div class="quizze">
                                <h3>Module 2 Quiz</h3>
                                <p>8 quizzes</p>
                            </div>
                        </div>
                    </div>';
            ?>
        </div>

    </div>
</main>
<script src="javascript.js"></script>
<?php
require "footer.php";
?>