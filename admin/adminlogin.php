<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/loginstyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>SDO Admin Login </title>
</head>
<body>
<div class="wrapper">
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>


        <div class="form-box login">
            <h2 class="animation" style="--i:0; --j:22">ADMIN LOGIN</h2>
            <form method="POST" action="">
                <div class="input-box animation" style="--i:1;  --j:23;">
                    <input type="text" name="loginusername" required>
                    <label>Username</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation" style="--i:2;  --j:24;">
                    <input type="password" name="loginpassword" required>
                    <label>Password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn animation" style="--i:3;  --j:25;" name="login">Login</button>
                <div class="logreg-link animation" style="--i:4;  --j:26;">
                    <!--<p>Don't have an account? <a href="#" class="register-link">Sign up</a></p> IF YOU WANT TO USED SIGN UP CLEAR COMMENT TOGGLE-->
                </div>
            </form>

        </div>
        <div class="info-text login">
            <h2 class="animation" style="--i:0; --j:20;">Welcome Back!</h2>
            <p class="animation" style="--i:1; --j:21">Schools Division Office</p>
            <br>
            <img class="animation" style="--i:3; --j:22" src="../image/sdolog2.png" alt="A beautiful example image">
        </div>

    </body>
</html>
<?php
$db = mysqli_connect('localhost', 'root', '', 'sdocms') or die();
/* admin login */

if (isset($_POST['login'])) {
    $db = mysqli_connect('localhost', 'root', '', 'sdocms') or die();
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $loginusername = $_POST['loginusername'];
    $loginpassword = md5($_POST['loginpassword']); // Hash the entered password using MD5
    $sql = "SELECT * FROM users WHERE user_username = '$loginusername' AND user_password = '$loginpassword' LIMIT 1";

    // Assuming you have already established a database connection
    $result = mysqli_query($db, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        // Password is correct
        $_SESSION['id']=$userid;
        echo '<script type="text/javascript">';
        echo 'alert("Successfully logged in!!!")';
        echo '</script>';
        header('Location: ../admin/adminDashboard.php');
        exit();
    } else {
        // Password is incorrect or username not found
        echo '<script type="text/javascript">';
        echo 'alert("Failed to log in. Incorrect username or password.")';
        echo '</script>';
        exit();
    }
}

?>