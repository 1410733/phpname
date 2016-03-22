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



    $query2 = mysqli_query($db, "SELECT * FROM users WHERE username = '$PresentUser'") or die (mysqli_error($db));

    while ($rows = mysqli_fetch_array($query2)) {
        $xname = $rows['username'];
        $xid = $rows['userID'];

        echo "The username selected is = $xname<br>";
        echo "The userID is = $xid<br>";
    }


    $query = mysqli_query($db, "INSERT INTO bugs (title, descr, postDate, userID) VALUES ('$Bugtitle', '$BugDesc', now(), '$xid')")
    or die(mysqli_error($db));



    if($query)
    {
        $msg = "Bug successfully submitted..";
        echo "<br>$msg<br>";
    }
    else
    {
        echo "submission error";
    }
}
?>

<?php

//File properties
if(!isset($_POST['submit'])) {
    if(getimagesize($_FILES['Attachment']['tmp_name']))== FALSE)

    {
        echo "Kindly choose an image";
}
    else
    {
        $image = addslashes($_FILES['image']['tmp_name']);
        $name= addslashes($_FILES['image']['name']);
        $image=file_get_contents($image);
        $image=base64_decode($image);
        $saveimages($image);
    }

}
    function save image($name,$image)
{
    $qry=mysqli_query($db,"Insert INTO attachment (URL, userID, BugID) VALUES ('$image', '$xid', NULL )")
    $result=mysqli_query($qry,$db);
if($result)
{
    echo "<br/>Image uploaded successfully";
} else
{
    echo "you got a problem";
}
}