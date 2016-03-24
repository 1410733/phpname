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
<form>
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




