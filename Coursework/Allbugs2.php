<?php
session_start();
?>

<?php
/**
 * Created by PhpStorm.
 * User: Lesson
 * Date: 23/03/2016
 * Time: 03:52 PM
 */
$userid = $_SESSION["userID"];
?>


<?php

include ("connection.php");
$sql = "select * from bugs WHERE bugID = ".$_GET["id"];

$result = mysqli_query($db,$sql);

$row = mysqli_fetch_assoc($result);

$bugtitle = $row['title'];
$bugID = $row['bugID'];
$bugdesc = $row['descr'];

echo "<h2>".$bugtitle."</h2>";
echo "<p>".$bugdesc."</p>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dimoce</title>
</head>
<body>
<form method="post" action="allbugs2.php">
    <fieldset>
        <legend>Kindly leave a comment...</legend>
        <label for="name">Name:</label>
        <input type="text" name="name" value="" />
        <br>
        <br>
        <label for="comments">Comment:</label>
        <textarea name="comment" cols="45" rows="5"></textarea>
        <br>
        <br>
        <input type="submit" name="submit" value="Submit" />
    </fieldset>
</form>
</body>
</html>

<?php
//Select everything from our bugs table where ID is right
    $sql="select * from comments WHERE bugID=".$_GET["id"];
//fetch our result from the database
    $result=mysqli_query($db,$sql);
//Scan through each row in the response
    while ($row=mysqli_fetch_assoc($result)){
        $commenttitle=$row['title'];
        $comment=$row['comment'];
        //link to the page
        echo '<h3>'.$commenttitle.'</h3>';
        echo '<p>'.$comment.'</p>';
    }
if ($sql) {
    echo "Comments added successfully";
}
else
    echo "Error in bug submission"
?>

<?php

if(isset($_POST['submit'])){//to run PHP script on submit
    //get variables for comment table
    $bugID= $_GET['id'];

    $comment= $_POST['comment'];

    // echo $currentBugID;
    //echo $uid;
    // echo $comment;

    $qry="INSERT  INTO comments (bugID, userID, descr, postDate) VALUES ('$bugID', '$userid','$comment'now())";

    if(mysqli_query($db, $qry)){
        echo "Records added successfully.";

        //redirect user to login screen
        //header("location: index.php");
    } else{
        echo "ERROR: Could not be able to execute".$qry. mysqli_error($db);
    }
    // Close connection
    mysqli_close($db);
}
?>