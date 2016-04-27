<?php
$msg = "";
//connections
include("connection.php"); //Establishing connection with our database
$mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);//instance of connection

//Function to cleanup user input for xss
function xss_cleaner($input_str) {
    $return_str = str_replace( array('<','>',"'",'"',')','('), array('&lt;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $input_str );
    $return_str = str_ireplace( '%3Cscript', '', $return_str );
    return $return_str;
}
if(!$mysqli) die('Could not connect$: ' . mysqli_error());

if(isset($_POST["submit"]))
{
    $name = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

//clean user input
    $name=mysqli_real_escape_string($db,$name);
    $email=mysqli_real_escape_string($db,$email);
    $password=mysqli_real_escape_string($db,$password);

    //encrypt password
    $password=md5($password);

    //check against xss
    $name=xss_cleaner($name);
    $email=xss_cleaner($email);

    $sql="SELECT email FROM userssecure WHERE email='$email'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(mysqli_num_rows($result) == 1)
    {
        $msg = "Sorry...This email already exists...";
    }
    else
    {
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        //call procedure
        if ( $mysqli->query("CALL Userreg('$email','$name','$password')"))  {
            //echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
            $msg = "Thank You! you are now registered. click <a href='index.php'>here</a> to login";
        }
            function xecho ($msg) {
                echo xssafe($msg);
            }
        if($result)
        {
          //  $msg = "Thank You! you are now registered. click <a href='index.php'>here</a> to login";
        }

    }
}
?>

