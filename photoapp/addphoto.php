<?php
session_start();
include("connection.php"); //Establishing connection with our database

$msg = ""; //Variable for storing our errors.
if(isset($_POST["submit"]))
{
    $title = trim($_POST["title"]);
    $desc = trim($_POST["desc"]);
    $url = trim("test");
    $name = $_SESSION["username"];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $uploadOk = 1;
    $fileinfo= new finfo(FILEINFO_MIME_TYPE);

    $check= getimagesize($_FILEs ["fileToUpload"]["tmp_name"]);
    if($check !==false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
        echo "File is not an image.";

    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exist.";
        $uploadOk=0;
    }

    if ($_FILES["fileToUpload"]["size"] > 400000) {
        echo "Sorry, your picture is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType !="png" && $imageFileType != "jpeg" && $imageFileType != "gif")
    {
        echo "Sorry, Only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    } else {


        $sql = "SELECT userID FROM users WHERE username='$name'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if (mysqli_num_rows($result) == 1) {

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $id = $row['userID'];
                $addsql = "INSERT INTO photos (title, description, postDate, url, userID) VALUES ('$title','$desc',now(),'$target_file','$id')";
                $query = mysqli_query($db, $addsql) or die(mysqli_error($db));
                if ($query) {
                    $msg = "Thank You! The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded. click <a href='photos.php'>here</a> to go back";
                }

            } else {
                $msg = "Sorry, there was an error uploading your file.";
            }
            //echo $name." ".$email." ".$password;


        } else {
            $msg = "You need to login first";
        }
    }

    }

?>