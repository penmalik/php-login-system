

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/log.css">
    <title>T5 REGISTRATION</title>
<body>

    <form  action="../handler/reg_hand.php" method="post">
        <div class="container">
            <h2>REGISTRATION FORM</h2>
        
            <div class="row1000">
                <div class="col">
                    <div class="input_box">
                        <input type="text" name="fname" required>
                        <span class="text">Full Name</span>
                        <div class="line"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="input_box">
                        <input type="text" name="mobile" required>
                        <span class="text">Mobile</span>
                        <div class="line"></div>
                    </div>
                </div>
            </div>

            <div class="row1000">
                <div class="col">
                    <div class="input_box">
                        <input type="email" name="email" required>
                        <span class="text">Email</span>
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
                <p>Already have an account? <a href="./log.php">Log in</a> </p>
                <div class="col">
                        <input type="submit" name="submit" value="Sign Up" required>
                </div>
            </div>
        </div>
    </form>

</body>
</html>