

<?php
SESSION_START();

$username= $_SESSION['username'] ;
?>

<!doctype html>

<html>
<head>
    <meta charset="utf-8">
    <title>PHP Login Form without Session</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<p> Hello <?php echo $_SESSION["username"] . " ";?> </p>
<br>
<a href="Bugform.php">Create Bug</a>
<a href="logout.php">Signout</a>

<h1>you have finally broke through... </h1>


</body>
</html>
