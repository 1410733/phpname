<?php
/**
 * Created by PhpStorm.
 * User: Lesson
 * Date: 18/03/2016
 * Time: 08:35 PM
 */
SESSION_START();



include ("connection.php");
$msg = "";
if(isset($_POST["submit"])) {

    $Bugtitle = $_POST["Bugtitle"];
    $BugDesc = $_POST["BugDesc"];
    $Attachment = $_POST["Attachment"];
    $PresentUser = $_SESSION['username'] ;
    $userID = 2;

    $Bugtitle= mysqli_real_escape_string($db, $Bugtitle);
    $BugDesc = mysqli_real_escape_string($db, $BugDesc);
    $Attachment = mysqli_real_escape_string($db, $Attachment);

   // $sql=mysqli_fetch_array(mysqli_query($db, "select userID from users where username= $PresentUser"));
    //$userID = $sql['userID'];
   // echo $userID;
  //  echo "two";
    $sql="Insert into bugs (title, descr, postDate, userID ) VALUES ('$Bugtitle', '$BugDesc', $PresentUser, '$userID')";
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