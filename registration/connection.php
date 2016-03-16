<?php
define('DB_SERVER', 'eu-cdbr-azure-north-d.cloudapp.net');
define('DB_USERNAME', 'be6a3e71586ff2');
define('DB_PASSWORD', '15106d56');
define('DB_DATABASE', 'Santuraki1410733');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
