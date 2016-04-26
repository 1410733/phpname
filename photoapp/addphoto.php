<?php
session_start();
include("connection.php"); //Establishing connection with our database

$msg = ""; //Variable for storing our errors.
if(isset($_POST["submit"]))
{
    $title = $_POST["title"];
    $desc = $_POST["desc"];
    $url = "test";
    $name = $_SESSION["username"];

    if($_FILES['fileToUpload']['error'] == 0) {

        // Where are we going to be writing to?
        $target_dir = "uploads/";
        $target_file .= basename($_FILES['fileToUpload']['name']);

        // File information
        $uploaded_name = $_FILES['fileToUpload']['name'];
        $uploaded_ext = substr($uploaded_name, strrpos($uploaded_name, '.') + 1);
        $uploaded_size = $_FILES['fileToUpload']['size'];
        $uploaded_tmp = $_FILES['fileToUpload']['tmp_name'];
        $uploadOk = 1;

        //restrict file type and size
        if( ( strtolower( $uploaded_ext ) == "jpg" || strtolower( $uploaded_ext ) == "jpeg" || strtolower( $uploaded_ext ) == "png" ) &&
            ( $uploaded_size < 100000 ) &&
            getimagesize( $uploaded_tmp ) ) {

            // Can we move the file to the upload folder?
            if (move_uploaded_file($uploaded_tmp, $target_file)) {
                //connect to db
                $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
                //if(!$mysqli) die('Could not connect$: ' . mysqli_error());

                //test connection
                if ($mysqli->connect_errno) {
                    echo "Connection Fail:Check network connection";//: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }

                //call procedure
                if (!$mysqli->query("CALL Fuploadprotection('$title','$desc','$target_file','$userID')")) {

                } else {

                    $msg = "Thank You! The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded. click <a href='photos.php'>here</a> to go back";

                }
            }
            else{
                $msg = "Your image was not uploaded";
            }
        }else{
            $msg = "Your image was not uploaded. We can only accept JPEG or PNG images.";
        }
    }


}

?>