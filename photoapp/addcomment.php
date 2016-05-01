<?php
session_start();
session_regenerate_id();
include("connection.php"); //Establishing connection with our database

$mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if(!$mysqli) die('Could not connect$: ' . mysqli_error());

function xss_sanitizer($input_str) {
    $return_str = str_replace( array('<','>',"'",'"',')','('), array('&lt;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $input_str );
    $return_str = str_ireplace( '%3Cscript', '', $return_str );
    return $return_str;
}


$userID=$_SESSION["userid"] ;

$msg = ""; //Variable for storing our errors.
if(isset($_POST["submit"]))
{

    $desc = trim($_POST["desc"]);
    $photoID =trim($_POST["photoID"]);
    $name = $_SESSION["username"];

    //Sanitize description
    $desc = stripslashes($desc);
    $desc = mysqli_real_escape_string($desc);
    $desc = htmlspecialchars($desc);
    $desc = xss_sanitizer($desc);

    //sanitize photoID
    $photoID = stripslashes($photoID);
    $photoID =htmlspecialchars($photoID);
    $photoID = xss_sanitizer($photoID);

    $mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    if(!$mysqli) die('Could not connect$: ' . mysqli_error());


    if($userID >0) {
        //test connection
        if ($mysqli->connect_errno) {
            echo "Connetion Failed:check network connection";// to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        //Prepare statement for binding.
        if ( !( $stmt=$mysqli->prepare("INSERT INTO comments (description, photoID, userID) VALUES (?, ?, ?)")))  {
            echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }


        else{
            //bind parameter
            $stmt->bind_param('sii', $desc, $photoID, $userID);
            $stmt->execute();
            $result=1;

            if($result==1)

                $msg = "Thank You! comment added. click <a href='photo.php?id=".$photoID."'>here</a> to go back";
        }
    }
    else{
        $msg = "You need to login first";
    }
}

?>












   