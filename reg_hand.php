<?php

include_once "../handler/dbh.php";
include_once "../handler/functions.php";

if(isset($_POST['submit'])){

    $fname = $_POST['fname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty_input_signup($fname, $mobile, $email, $password) !== false) {
        header("Location: ../inc/reg.php?error=emptyinput");
        exit();
    }

    // if (invalid_user($user)) {
    //     header("Location: ../inc/reg.php?error=invalidemail");
    //     exit();
    // }

    // if (user_exist($user)) {
    //     header("Location: ../inc/reg.php?error=invalidemail");
    //     exit();
    // }

    if (invalid_email($email) !== false) {
        header("Location: ../inc/reg.php?error=invalidemail");
        exit();
    }
    
    if (email_exist($conn, $email, $mobile) !== false) {
        header("Refresh: 5; url=../inc/reg.php?error=emailtaken");
        echo("<p>Email already exist</p>");
        exit();
    }

    // if (pwd_len($password) != false) {
    //     header("Location: ../inc/reg.php?error=passwordnotupto8characters");
    //     exit();
    // }

    create_user($conn, $fname, $mobile, $email, $password);

}
else {
    header("Location: ../inc/reg.php");
    exit();
}