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
echo "<p> Comments </p>"


?>

