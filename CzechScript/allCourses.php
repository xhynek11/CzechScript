<?php
require "header.php";
?>
<main>
    <div class="wraper">
        <div class="allCourses">
            <div class="course">
                <div class="course-logo">
                    <?php
                    if (isset($_SESSION['userId'])) {
                        echo "<svg>
                                        <circle cx='43' cy='43' r='43'></circle>
                                        <circle style='stroke-dashoffset: calc(270 - (270 * " . $_SESSION['proghtml'] . ") / 100);' cx='43' cy='43' r='43'></circle>
                                        </svg>";
                    }
                    ?>
                    <div class="back-logo">
                        <i class="fab fa-html5"></i>
                    </div>
                </div>
                <div class="course-info">
                    <h2>HTML</h2>
                    <p class="right">200 Learners</p>
                    <p class="left">21 Lessons</p>
                </div>
            </div>
            <div class="course">
                <div class="course-logo">
                    <?php
                    if (isset($_SESSION['userId'])) {
                        echo "<svg>
                                        <circle cx='43' cy='43' r='43'></circle>
                                        <circle style='stroke-dashoffset: calc(270 - (270 * " . $_SESSION['progcss'] . ") / 100);' cx='43' cy='43' r='43'></circle>
                                        </svg>";
                    }
                    ?>
                    <div class="back-logo">
                        <i class="fab fa-css3-alt"></i>
                    </div>
                </div>
                <div class="course-info">
                    <h2>CSS</h2>
                    <p class="right">300 Learners</p>
                    <p class="left">32 Lessons</p>
                </div>
            </div>
            <div class="course">
                <div class="course-logo">
                    <?php
                    if (isset($_SESSION['userId'])) {
                        echo "<svg>
                                        <circle cx='43' cy='43' r='43'></circle>
                                        <circle style='stroke-dashoffset: calc(270 - (270 * " . $_SESSION['progphp'] . ") / 100);' cx='43' cy='43' r='43'></circle>
                                        </svg>";
                    }
                    ?>
                    <div class="back-logo">
                        <i class="fab fa-php"></i>
                    </div>
                </div>
                <div class="course-info">
                    <h2>PHP</h2>
                    <p class="right">150 Learners</p>
                    <p class="left">18 Lessons</p>
                </div>
            </div>
            <div class="course">
                <div class="course-logo">
                    <?php
                    if (isset($_SESSION['userId'])) {
                        echo "<svg>
                                        <circle cx='43' cy='43' r='43'></circle>
                                        <circle style='stroke-dashoffset: calc(270 - (270 * " . $_SESSION['progjs'] . ") / 100);' cx='43' cy='43' r='43'></circle>
                                        </svg>";
                    }
                    ?>
                    <div class="back-logo">
                        <i class="fab fa-js-square"></i>
                    </div>
                </div>
                <div class="course-info">
                    <h2>Java Script</h2>
                    <p class="right">140 Learners</p>
                    <p class="left">20 Lessons</p>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="javascript.js"></script>
<?php
require "footer.php";
?>