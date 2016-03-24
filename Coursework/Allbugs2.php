<?php
/**
 * Created by PhpStorm.
 * User: Lesson
 * Date: 23/03/2016
 * Time: 03:52 PM
 */
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
        <textarea name="comments" cols="45" rows="5"></textarea>
        <br>
        <br>
        <input type="submit" value="Submit" />
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

