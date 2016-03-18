<?php
/**
 * Created by PhpStorm.
 * User: Lesson
 * Date: 18/03/2016
 * Time: 08:35 PM
 */

include ("connection.php");
$msg = "";
if(isset($_POST["submit"])) {
    echo "two";
    $Bugtitle = $_POST["Bugtitle"];
    $BugDesc = $_POST["BugDesc"];
    $Attachment = $_POST["Attachment"];
    $PresentUser = $_POST {'id'};

    $Bugtitle= mysqli_real_escape_string($db, $Bugtitle);
    $BugDesc = mysqli_real_escape_string($db, $BugDesc);
    $Attachment = mysqli_real_escape_string($db, $Attachment);

    $sql=mysqli_fetch_array(mysqli_query($db, "select * from users where email= $PresentUser"));
    $userID = $sql['userID'];
    echo $userID;

    $sql="Insert into bugs (title, desc, fixdate, userID ) VALUES ('$Bugtitle', '$BugDesc', 'now', 'UserID'";
    $result=mysqli_query($db,$sql);
    if($result)
    {
        $msg = "Bug successfully submitted..";
        echo $msg;
    }
    else
    {
        echo "submission error";
    }
}
?>