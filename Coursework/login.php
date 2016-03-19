<?php
/**
 * Created by PhpStorm.
 * User: 1410733
 * Date: 02/03/2016
 * Time: 15:59
 */

include("connection.php");
    SESSION_START ();
if (empty ($_POST["username"]) || empty ($_POST["password"]))
{
    echo "Both fields are required.";
} else
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password = mysqli_real_escape_string($db, $password);
    $password = md5($password);
    $_SESSION['username'] = $username;


    $sql="SELECT * FROM users WHERE username='$username' and password='$password'";
    $result = mysqli_query($db,$sql);
    $results = mysqli_fetch_array($result);
    echo $results['password'];

if (mysqli_num_rows($result) == 1 ) {
    header("location: home.php"); // Redirecting to another page
        $_SESSION['username']=$username;
    echo "<br />How are you today".$_SESSION['username'];
} else {
    echo "Incorrect username or password."; }
} ?>