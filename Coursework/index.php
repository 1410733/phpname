
<!--/*
 * Created by PhpStorm.
 * User: 1410733
 * Date: 02/03/2016
 * Time: 16:29
 */-->

<?php
include('login.php'); // Include Login Script

if ((isset($_SESSION['username']) != ''))
{
    header('Location: home.php');
}
?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP Login Form without Session</title>
    <link rel="stylesheet" href="loginpage.css
    " type="text/css" />
</head>

<body>
<h1>Welcome, Kindly log in with your details below</h1>
<div class="loginBox">
    <h3>Login Form</h3>
    <br><br>
    <form method="post" action="login.php">
        <label>Username:</label><br>
        <input type="text" name="username" placeholder="username" /><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" placeholder="password" />  <br><br>
        <input type="submit" name="submit" value = "login"/>
    </form>
    <br>
    <br>
    <p>Not a member? kindly click <a href="register.php">Here </a> to register with us</p>
    <div class="error"><?php //echo $error;?><?php //echo $username; echo $password;?></div>

</div>
</body>
</html>
