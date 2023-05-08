<?php 

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once "./dbh.php";
    require_once "./functions.php";

    
    if (empty_input_login($email, $password) != false) {
        header("Location: ../inc/log.php?error=emptyinput");
        exit();
    }

    login_user($conn, $email, $email, $password);
}

else {
    header("Location: ../inc/log.php?error=emptyinput");
    exit();
}