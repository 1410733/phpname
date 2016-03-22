<?php
/**
 * Created by PhpStorm.
 * User: Lesson
 * Date: 18/03/2016
 * Time: 08:35 PM
 */
SESSION_START();


include ("login.php");
$msg = "";
//if(isset($_POST["submit"])) {

if(isset($_POST['submit']) && $_FILES['userfile']['size'] > 0)
{
    $fileName = $_FILES['userfile']['name'];
    $tmpName  = $_FILES['userfile']['tmp_name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = $_FILES['userfile']['type'];

    $fp      = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    fclose($fp);

    if(!get_magic_quotes_gpc())
    {
        $fileName = addslashes($fileName);
    }
    include 'library/config.php';
    include 'library/opendb.php';









    /*
        if (getimagesize($_FILES['image']['tmp_name'])== FALSE)
        {
            echo "Please select an image.";
        }
        else {

            $file_name = $_FILES['image']['name'];
            $dir = $_FILES['image']['tmp_name'];
            $location = "uploads/";
            $fp = fopen($dir, 'r');
            $content = fread($fp, filesize($dir));
            $content = addslashes($content);
            fclose($fp);
            move_uploaded_file($dir, $location.$file_name);
        }*/
    $Bugtitle = $_POST["Bugtitle"];
    $BugDesc = $_POST["BugDesc"];
    $Attachment = $_POST['Attachment'];
    $PresentUser = $_SESSION['username'] ;

    $Bugtitle= mysqli_real_escape_string($db, $Bugtitle);
    $BugDesc = mysqli_real_escape_string($db, $BugDesc);

    $query2 = mysqli_query($db, "SELECT * FROM users WHERE username = '$PresentUser'") or die (mysqli_error($db));

    while ($rows = mysqli_fetch_array($query2)) {
        $xname = $rows['username'];
        $xid = $rows['userID'];
        echo "The username selected is = $xname<br>";
        echo "The userID is = $xid<br>";
    }

    $query = mysqli_query($db, "INSERT INTO bugs (title, descr, postDate, userID) VALUES ('$Bugtitle', '$BugDesc', now(), '$xid')")
    or die(mysqli_error($db));

        $sql1 = mysqli_query($db, "select * from bugs where title = '$Bugtitle'");

while ($runsql = mysqli_fetch_array($sql1)) {
    $newbugid = $runsql ['bugID'];
}


        $query1 = mysqli_query($db, "insert into attachments (URL, userID, bugID) VALUES ('$content', '$xid', '$newbugid')");
        //$result = mysqli_query($query1);
        if($query1) {
            echo "<br/>Image Uploaded.";
        }
        else
        {
            echo "<br/>Image Not Uploaded.";
        }

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

