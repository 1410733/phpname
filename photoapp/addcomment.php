<?php
session_start();
include("connection.php"); //Establishing connection with our database

//function to clean xss inputs
function xss_erase ($input_str)
{
    $return_str = str_replace(array('<', '>', "'", '"', ')', '('), array('&lt;', '&gt;', '&apos;', '&#x22;', '&#x29;', '&#x28;'), $input_str);
    $return_str = str_ireplace('%3Cscript', '', $return_str);
    return $return_str;
}
//xss safe output - sanitizing output
function xecho($error){ echo xss_erase($error);}
$msg = ""; //Variable for storing our errors.

if(isset($_POST["submit"]))
{

    $desc = ($_POST["desc"]);
    $photoID =($_POST["photoID"]);
    $name = $_SESSION["username"];

    //get input nd trim
    $desc = trim( $desc );
    $photoID = trim($photoID );

    // escape special characters
    $desc = stripslashes($desc);
    $photoID = stripslashes($photoID);
    $desc = mysqli_real_escape_string($db, $desc);
    $photoID = mysqli_real_escape_string($db, $photoID);

    //prevents xss
    $desc = htmlspecialchars($_POST["desc"]);
    $photoID = htmlspecialchars($_POST["photoID"]);
    $desc = xss_erase($_POST["desc"]);
    $photoID = xss_erase($_POST["photoID"]);


    $sql="SELECT userID FROM users WHERE username='$name'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(mysqli_num_rows($result) == 1) {
        //echo $name." ".$email." ".$password;
        $id = $row['userID'];
        $addsql = "INSERT INTO comments (description, postDate,photoID,userID) VALUES ('$desc',now(),'$photoID','$id')";
        $query = mysqli_query($db, $addsql) or die(mysqli_error($db));
        if ($query) {
            $msg = "Thank You! comment added. click <a href='photo.php?id=".$photoID."'>here</a> to go back";
        }
    }
    else{
        $msg = "You need to login first";
    }
}

?>