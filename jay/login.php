<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Login - PatidarStore</title>
        <link rel="stylesheet" href="stylesheet.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="header">
    <div class="container"> 
        <div class="navbar">
            <div class="logo">
                <img src="images/PBlogo.png" width="125px">
            </div>
            <nav>
                <ul id="menuitems">
                    <li><a href="">Home</a></li>
                    <li><a href="">Product</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Account</a></li>
                </ul>
            </nav>
            <img src="images/cart.png" width="30px" height="30">
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>
</div>
    <!-----------------------account page----------------->

    <div class="account-page">
    <div class="container">
        <div class="form-container">
            <div class="form-btn">
                <h3>Login</h3>
                <hr class="Indicator">
            </div>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `user` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user home page  
            header("Location: PatidarStore.html");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href=''>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    
            <form  action="" method="post">
                <input type="text" placeholder="Username" name="username">
                <input type="password" placeholder="Password" name="password">
                <button type="submit" class="btn" name="login">Login</button>
                <p class="link">Don't have an account? <a href="registration.php"><u>Registration Now</u></a></p>
            </form>
        
<?php
    }
?>
        </div>
    </div>
</div>
<!-----------------footer-------------------->
<div class="footer">
    <div class="container">
        <div class="row">
        <div class="footer-col-3">
                <h3>Shortcut</h3>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Product</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Logout</a></li>
                </ul>
            </div>
            <div class="footer-col-2">
                <img src="images/PWlogo.png">
                <p>Our purpose is to sustainably make the pleasure.</p>
            </div>
            <div class="footer-col-3">
                <h3>Usefull Links</h3>
                <ul>
                    <li>Coupons</li>
                    <li>BLog Post</li>
                    <li>Return Policy</li>
                    <li>Join Affiliate</li>
                </ul>
            </div>
            <div class="footer-col-4">
                <h3>Follow us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Twitte</li>
                    <li>Instagram</li>
                    <li>YouTube</li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="copyright">Copyright 2022 - By Jaydeep Patidar</p>
    </div>
</div>
<!---------------------------js for toggle menu------------------>
<script>
    var menuitems = document.getElementById("menuitems");
    menuitems.style.maxHeight = "0px";
    function menutoggle(){
        if(menuitems.style.maxHeight == "0px"){
            menuitems.style.maxHeight = "200px";
        }
        else
        {
            menuitems.style.maxHeight = "0px";
        }
    }
</script>
<!------------------js for toggle form--------------------------->
<script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");

        function register(){
            
                RegForm.style.transform = "translateX(0px)";
                LoginForm.style.transform = "translateX(0px)";
                Indicator.style.transform = "translateX(100px)";
        }
        function login(){

                RegForm.style.transform = "translateX(300px)";
                LoginForm.style.transform = "translateX(300px)";
                Indicator.style.transform = "translateX(0px)"; 
        }
</script>
</body>
</html>