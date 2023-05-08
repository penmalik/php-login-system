<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="../css/log.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<form  action="../handler/log_hand.php" method="post">
        <div class="container">
            <h2>LOGIN FORM</h2>

            <div class="row1000">
                <div class="col">
                    <div class="input_box">
                        <input type="text" name="email" required>
                        <span class="text">Email/Mobile</span>
                        <div class="line"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="input_box">
                        <input type="password" name="password" required>
                        <span class="text">Password</span>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            
            <div class="row1000">
                <p>Don't have an account? <a href="./reg.php">Sign up</a> </p>
                <div class="col">
                        <input type="submit" name="submit" value="Login" required>
                </div>
            </div>
        </div>
    </form>


    <?php 
    if (isset($_GET['error'])) {

        $_SESSION["USER"] = $email;

        if ($_GET['error'] == "invalidemail") {
            // $_SESSION['ALERT'] = json_encode([
            //     "title" => "Login Failed",
            //     "message" => "Invalid email entered, please try again",
            //     "type" => "error"
            // ]);

            echo "<h1>Invalid email</h1>";
        }
    }
    ?>



</body>
</html>