<?php

function lessDatabase($conn, $id)
{
    $sql = "SELECT * FROM lessons WHERE lesskey = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function lessDatabaseUpdate($conn, $proghtml, $id)
{
    $sql = "UPDATE lessons SET proghtml = ? WHERE lesskey = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ii", $proghtml, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function htmlDatabase($conn, $id)
{
    $sql = "SELECT * FROM course_html WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function uidExists($conn, $username)
{
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function emailExists($conn, $email)
{
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function findUnverified($conn, $vKey)
{
    $sql = "SELECT vkey,verified FROM users WHERE verified=0 AND vkey = ? LIMIT 1";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $vKey);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function verifyUpdate($conn, $vKey)
{
    $sql = "UPDATE users SET verified = 1 WHERE vkey = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $vKey);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $email, $password_1)
{
    session_start();
    $_SESSION['email'] = $email;
    //insert data to users
    $vKey = md5(time() . $username);
    $sql = "INSERT INTO users (username,email,pwd,vkey,verified) VALUES (?,?,?,?,0)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../register.php?error=stmtfailed");
        exit();
    }
    $hashedPwd =  password_hash($password_1, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPwd, $vKey);
    mysqli_stmt_execute($stmt);

    //insert data to lessons
    $result = uidExists($conn, $username);
    $id = $result['id'];
    $sql_less = "INSERT INTO lessons (lesskey,proghtml,progcss,progphp,progjs,expe) VALUES (?,?,?,?,?,?)";
    $stmt_less = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt_less, $sql_less)) {
        header("Location: ../register.php?error=stmtfailed");
        exit();
    }
    $zero = 0;
    $twohun = 200;
    mysqli_stmt_bind_param($stmt_less, "iiiiii", $id, $zero, $zero, $zero, $zero, $twohun);
    mysqli_stmt_execute($stmt_less);

    //email send
    $to = $email;
    $subject = "Email Verification";
    $message = "Verify your account: http://localhost/Site/CzechScript/includes/verify_inc.php?vkey=" . $vKey;
    $headers = "From:czechscript@gmail.com";
    if (mail($to, $subject, $message, $headers)) {
        header("Location: ../registered.php");
        mysqli_stmt_close($stmt);
        mysqli_stmt_close($stmt_less);
        exit();
    } else {
        header("Location: ../register.php?error=emaileerror");
        mysqli_stmt_close($stmt);
        mysqli_stmt_close($stmt_less);
        exit();
    }

    //close sql connection
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt_less);
    header("Location: ../register.php?error=none");
    exit();
}

function loginUser($conn, $emailUsername, $pwd)
{
    $uidExists = uidExists($conn, $emailUsername);
    $emailExists = emailExists($conn, $emailUsername);
    if (($uidExists === false) && ($emailExists === false)) {
        header("Location: ../login.php?error=invalidlogin");
        exit();
    }
    if ($uidExists != false) {
        $pwdHashed = $uidExists['pwd'];
        $checkPwd = password_verify($pwd, $pwdHashed);
    }
    if ($emailExists != false) {
        $uidExists = $emailExists;
        $pwdHashed = $uidExists['pwd'];
        $checkPwd = password_verify($pwd, $pwdHashed);
    }
    if ($checkPwd === false) {
        header("Location: ../login.php?error=invalidpwd");
        exit();
    } else if ($checkPwd === true) {
        if ($uidExists['verified'] == 1) {
            $lessDatabase = lessDatabase($conn, $uidExists['id']);
            session_start();
            $_SESSION['userId'] = $uidExists['id'];
            $_SESSION['userName'] = $uidExists['username'];
            $_SESSION['proghtml'] = $lessDatabase['proghtml'];
            $_SESSION['progcss'] = $lessDatabase['progcss'];
            $_SESSION['progphp'] = $lessDatabase['progphp'];
            $_SESSION['progjs'] = $lessDatabase['progjs'];
            if (isset($_COOKIE['redirect'])) {
                if ($_COOKIE['redirect'] == 'course_html.php') {
                    setcookie("redirect", "", time() - 3600);
                    header("Location: ../course_html.php");
                    exit();
                }
            }
            header("Location: ../index.php");
            exit();
        } else {
            header("Location: ../login.php?error=unverified");
            exit();
        }
    }
}

function sendForgotenMail($conn, $email)
{
    $result = emailExists($conn, $email);
    $to = $email;
    $subject = "Forgotten Password";
    $message = "Change your password here: http://localhost/Site/CzechScript/changePassword.php?vkey=" . $result['vkey'] . "&id=" . $result['id'];
    $headers = "From:czechscript@gmail.com";
    if (mail($to, $subject, $message, $headers)) {
        header("Location: ../forgotten.php?succes=emailsend");
        exit();
    } else {
        header("Location: ../forgotten.php?error=emailerror");
        exit();
    }
}
function vkeyIdDatabase($conn, $vkey, $id)
{
    $sql = "SELECT * FROM users WHERE id =? AND vkey=? LIMIT 1";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "is", $id, $vkey);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
    } else {
        header("Location: ./index.php");
        exit();
    }
    mysqli_stmt_close($stmt);
}
function changePassword($conn, $password1, $id)
{
    $hashedPwd =  password_hash($password1, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET pwd = ? WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "si", $hashedPwd, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../login.php?succes=pwdchange");
    exit();
}

function updateLessons()
{
}
