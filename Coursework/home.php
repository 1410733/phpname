

<?php
SESSION_START();

$username= $_SESSION['username'] ;
$userID=$_SESSION['userID'];
?>

<!doctype html>

<html>
<head>
    <meta charset="utf-8">
    <title>PHP Login Form without Session</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<p> Hello <em><?php echo $_SESSION["username"] . " ";?> </p></em>
<p> Hello <em><?php echo $_SESSION["userID"] . " ";?> </p></em>
<br>
<a href="Bugform.php">Report a Bug</a>
<a href="Allbugs.php">Submitted Bugs</a>
<a href="comments.php">comment on bugs</a>
<a href="logout.php">Signout</a>


<h1>Welcome to bug tracker website </h1>
<br>
<p>This website allows you to submit all the bugs you found, provide a solution to an existing bug
also comment all other bugs</p>
<p>To submit a bug, kindly click "create bug" at the top of the page</p>



</body>
</html>
