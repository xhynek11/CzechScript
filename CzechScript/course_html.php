<?php
require "header.php";
?>
<main>
    <div class="course_wraper">
        <div class="course_html">
            <?php
            require_once "includes/html_fill_inc.php";
            if ($htmlDatabase['style'] == 1) {
                echo '<h2>' . $htmlDatabase['title'] . '</h2>';
                if (isset($htmlDatabase['first_text'])) {
                    echo '<p class="first_text">' . $htmlDatabase['first_text'] . '</p>';
                }
                if (isset($htmlDatabase['first_code'])) {
                    echo '<div class="second_code_example">
                    <p>' . $htmlDatabase["first_code"] . '</p>
                    <span>' . $htmlDatabase["first_code_tag"] . '</span>
                    </div>';
                }
                if (isset($htmlDatabase['second_text'])) {
                    echo '<p class="second_text">' . $htmlDatabase['second_text'] . '</p>';
                }
                if (isset($htmlDatabase['second_code'])) {
                    echo '<div class="second_code_example">
                        <p>' . $htmlDatabase["second_code"] . '</p>
                        <span>' . $htmlDatabase["second_code_tag"] . '</span>
                        </div>';
                }
                if (isset($htmlDatabase['third_text'])) {
                    echo '<p class="third_text">' . $htmlDatabase['third_text'] . '</p>';
                }
                if (isset($htmlDatabase['important'])) {
                    echo '<div class="code_important">
                    <i class="fas fa-exclamation-circle"></i>
                    <p>' . $htmlDatabase['important'] . '</p>
                     </div>';
                }
                echo '<form action="includes/continue1_inc.php" method="post">
                    <input class="quiz_submit" type="submit" name="continue_button" value="Continue">
                    </form>';
            } else if ($htmlDatabase['style'] == 2) {
                echo '<h2>' . $htmlDatabase['title'] . '</h2>';
                echo '<form action="includes/continue2_inc.php" method="post">';
                if (isset($htmlDatabase['first_text'])) {
                    echo '<div class="radio_wraper">
                        <input class="radio_button" type="radio" name="radio[]" value="radio_one">
                        <label for="radio_one">' . $htmlDatabase["first_text"] . '</label>';
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "wrongfirst") {
                            echo ' <i class="far fa-times-circle"></i>';
                        }
                    }
                    echo '</div>';
                }
                if (isset($htmlDatabase['first_code'])) {
                    echo '<div class="radio_wraper">
                        <input class="radio_button" type="radio" name="radio[]" value="radio_two">
                        <label for="radio_two">' . $htmlDatabase["first_code"] . '</label>';
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "wrongsecond") {
                            echo ' <i class="far fa-times-circle"></i>';
                        }
                    }
                    echo '</div>';
                }
                if (isset($htmlDatabase['second_text'])) {
                    echo '<div class="radio_wraper">
                        <input class="radio_button" type="radio" name="radio[]" value="radio_three">
                        <label for="radio_three">' . $htmlDatabase["second_text"] . '</label>';
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "wrongthird") {
                            echo ' <i class="far fa-times-circle"></i>';
                        }
                    }
                    echo '</div>';
                }
                if (isset($htmlDatabase['second_code'])) {
                    echo '<div class="radio_wraper">
                        <input class="radio_button" type="radio" name="radio[]" value="radio_for">
                        <label for="radio_for">' . $htmlDatabase["second_code"] . '</label>';
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "wrongfourth") {
                            echo ' <i class="far fa-times-circle"></i>';
                        }
                    }
                    echo '</div>';
                }
                if (isset($htmlDatabase['third_text'])) {
                    echo '<div class="radio_wraper">
                        <input class="radio_button" type="radio" name="radio[]" value="radio_five">
                        <label for="radio_five">' . $htmlDatabase["third_text"] . '</label>';
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "wrongfifth") {
                            echo ' <i class="far fa-times-circle"></i>';
                        }
                    }
                    echo '</div>';
                }
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "wrongfirst" || $_GET['error'] == "wrongsecond" || $_GET['error'] == "wrongthird" || $_GET['error'] == "wrongfourth" || $_GET['error'] == "wrongfifth") {
                        echo '<div class="answ_error">
                        <i class="fas fa-times-circle"></i>
                        <p>Incorect try again!</p>
                            </div>';
                    }
                }
                echo '<input class="quiz_submit" name="continue_button" type="submit" disabled>';
                echo '</form>';
            } else if ($htmlDatabase['style'] == 3) {
                echo '<h2>' . $htmlDatabase['title'] . '</h2>';
                echo '<form action="includes/continue3_inc.php" method="post">';
                if (isset($htmlDatabase['first_text'])) {
                    echo '<p class="first_text">' . $htmlDatabase['first_text'] . '</p>';
                }
                if (isset($htmlDatabase['second_text'])) {
                    echo '<div class="second_code_example">' . $htmlDatabase['second_text'] . '</div>';
                    echo '<style>
                        .first-input {
                            width: ' . strval($htmlDatabase['first_code_tag'] * 10 + 20) . 'px;
                        }
                        .second-input {
                            width: ' . strval($htmlDatabase['second_code_tag'] * 10 + 20) . 'px;
                        }
                </style>';
                }
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "wrongboth") {
                        echo '<div class="answ_error">
                        <i class="fas fa-times-circle"></i>
                        <p>Incorect try again!</p>
                            </div>';
                    }
                }
                echo '<input class="quiz_submit" name="continue_button" type="submit" value="Continue" disabled>';
                echo '</form>';
            }
            ?>
        </div>

    </div>
</main>
<script src="javascript.js"></script>
<?php
require "footer.php";
?>