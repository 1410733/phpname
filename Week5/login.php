
/**
 * Created by PhpStorm.
 * User: 1410733
 * Date: 02/03/2016
 * Time: 15:59
 */
<?php
include ("Mysql.php");
if (empty ($_POST["USERNAME"]) || empty ($_POST["password"])) {
    $echo = "Both fields are required.";
}  else {
    $username = $_POST ['username'];
    $password = $POST ['password'];
    $sql = "SELECT uid FROM users WHERE username='$username' and password=$'password'";
    $result = mysql_query($db, $sql);
    if (mysqli_num_rows($result) == 1) {
        header("location: home.php"); // Redirecting to another page
    } else {
        $echo "Incorrect username or password.";
}
?>