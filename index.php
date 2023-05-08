<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if (isset($_SESSION['USER'])) {
            // echo "<p>Already have an account? <a href='./user_dash.php'>Log in</a> </p>";
            // echo "<p>Already have an account? <a href='./logout.php'>Log in</a> </p>";
            echo "<h1>This is the home page</h1>";
        }
        else{
            header("Location: ../inc/reg.php?error=");
            exit();
        }
    ?>
</body>
</html>