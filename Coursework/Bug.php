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


    $Bugtitle= mysqli_real_escape_string($db, $Bugtitle);
    $BugDesc = mysqli_real_escape_string($db, $BugDesc);
    $Attachment = mysqli_real_escape_string($db, $Attachment);

   // $sql=mysqli_fetch_array(mysqli_query($db, "select userID from users where username= $PresentUser"));
    //$userID = $sql['userID'];
   // echo $userID;
  //  echo "two";
    //$sql="Insert into bugs (title, descr, postDate, userID ) VALUES ('$Bugtitle', '$BugDesc', now(), '$userID')" or die(mysqli_error($db));
   // $result=mysqli_query($db,$sql);

    $query = mysqli_query($db, "INSERT INTO bugs (title, descr, postDate) VALUES ('$Bugtitle', '$BugDesc', now())")
    or die(mysqli_error($db));



    echo "two";
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