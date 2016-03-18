
/**
 * Created by PhpStorm.
 * User: Lesson
 * Date: 18/03/2016
 * Time: 08:35 PM
 */
<?php
include ("connection.php");
$msg = "";
if(isset($_POST["submit"])) {
    $Bugtitle = $_POST["Bug title"];
    $BugDesc = $_POST["Bug description"];
    $Datep = $_POST["Date posted"];
    $Datef = $_POST["Date fixed"];

    $name = mysqli_real_escape_string($db, $name);
    $email = mysqli_real_escape_string($db, $email);
    $password = mysqli_real_escape_string($db, $password);
    $password = md5($password);


    $sql="SELECT email FROM users WHERE email='$email'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(mysqli_num_rows($result) == 1)
    {
        $msg = "Sorry...This email already exists...";
    }
    else
    {
        //echo $name." ".$email." ".$password;
        $query = mysqli_query($db, "INSERT INTO users (username, email, password)VALUES ('$name', '$email', '$password')")
        or die(mysqli_error($db));
        if($query) {
            $msg = "Thank You! you are now registered, a confirmation will be sent to you as soon as possible!!.";
            echo $msg;
        }

    }
}
?>