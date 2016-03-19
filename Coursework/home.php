

<?php
SESSION_START();

$username= $_SESSION['username'] ;
?>

<!doctype html>


<html>
<head>
    <meta charset="utf-8">
    <title>PHP Login Form without Session</title>

</head>

<body>
<a href="Bugform.php">Create Bug</a>
<?php echo $_SESSION["username"] . " ";?><h1>you have finally ... </h1>


</body>
</html>
