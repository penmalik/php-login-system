<?php

session_start();

function empty_input_signup($fname, $mobile, $email, $password){

    if (empty($fname) || empty($email) || empty($mobile) || empty($password)) {
        $result = true;

    }
    else {
        $result = false;
    }
    return $result;
}

// function invalid_user($user){
//     if (!preg_match("/^[a-zA-Z0-9]", $user)) {
//         $result = true;
//         header("Location: ../inc/reg.php?error=invalidemail");
//         exit();
//     }
//     else{
//         $result = false;
//     }
//     return $result;
// }

function invalid_email($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
        header("Location: ../inc/reg.php?error=invalidemail");
        exit();
    }
    else {
        $result = false;
    }
    return $result;
}

function email_exist($conn, $email, $mobile){
    $sql = "SELECT * FROM `users` WHERE `email` = ? OR `mobile` = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("Refresh: 5; url=../inc/reg.php?error=emailtaken");
        echo("<p>Email already exist</p>");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $email, $mobile);
    mysqli_stmt_execute($stmt);

    $result_data = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result_data)) {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function create_user($conn, $fname, $mobile, $email, $password){
    $sql = "INSERT INTO `users` (`full_name`, `mobile`, `email`, `password`) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../inc/reg.php?error=stmtfailed");
        exit();
    }

    $hash_pass = password_hash($password, PASSWORD_BCRYPT);

    mysqli_stmt_bind_param($stmt, "ssss", $fname, $mobile, $email, $hash_pass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ../inc/log.php?error=none");
    exit();
}









// LOGIN VERIFICATION

function empty_input_login($email, $password){
    // $result;

    if (empty($email) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
}

function login_user($conn, $email, $mobile, $password){

    $email_exist = email_exist($conn, $email, $mobile);
    // print_r($email_exist);
    // die();

    if($email_exist === false){

        header("Location: ../inc/log.php?error=emaildoesnotexist");
        exit();
    }

    $pwd_hash = $email_exist["password"];

    $check_pwd = password_verify($password, $pwd_hash);

    if ($check_pwd === false) {
        header("Location: ../inc/log.php?error=incorrectpassword");
        exit();
    }
    else{
        $_SESSION['USER'] = $email_exist["email"];
        $_SESSION['password'] = $email_exist["password"];
        
        header("Location: ../index.php");
        exit();
    }
}