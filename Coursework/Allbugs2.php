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
<?php
$sql="SELECT * From comments where bugID =".$Get["id"]
//fetch our result from the database
$result=mysqli_query($db,$sql2);
//we scan through each row in the response
While ($row=mysqli_fetch_assoc($result)) {
    //get the title and id from the bug
    $comentTitle = $row['title'];
    $comment = $row['comment'];
//write the link to the page
    echo '<h3>' . $title . '</h3>';
    echo '<p>' . $comment . '</p>';

}
?>
