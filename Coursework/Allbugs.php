

<?php
//Establish connection with DB
include ("connection.php");
$_POST["bugID"];

//select all from bugs table
$sql = "select * from bugs";

//fetch result from DB
$result = mysqli_query($db,$sql);

//we scan each row
while($row = mysqli_fetch_assoc($result)) {
    //get bug title and id
    $bugtitle = $row['title'];
    $bugID = $row['bugID'];

    //write link to page
    echo "<a href='Allbugs2.php?id=" . $bugID . "'>" . $bugtitle . "</a></br>";
}
?>


<?php


    $newsql= "select * from comments WHERE "