<?php
function xecho ($resultText) {
    echo xss_sanitizer($resultText);
}
$resultText = "";



//Function to cleanup user input for xss
function xss_sanitizer($input_str) {
    $return_str = str_replace( array('<','>',"'",'"',')','('), array('&lt;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $input_str );
    $return_str = str_ireplace( '%3Cscript', '', $return_str );
    return $return_str;
}
if(isset($_POST["submit"]))
{
    $name = $_POST["username"];
    //filter user input
    $name=mysqli_real_escape_string($db,$name);
    $name=xss_sanitizer($name);

    //instance of connection to dbase
    $mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if ($mysqli->connect_errno) {
        echo "Connection Failed, Check and Connect Again";// (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    // Prepare OUT parameters
    $mysqli->query("SET @userID=0");

    if ( !$mysqli->query("CALL useridlookup('$name',@userID)"))  {
        // echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    //get user id into a variable

    $res = $mysqli->query("SELECT @userID as userID");
    $row = $res->fetch_assoc();
    $userid=$row['userID'];//Get user ID


    if ($userid >0)
    {
        $searchID = $row['userID'];
        $searchSql="SELECT title, photoID FROM photos WHERE userID='$searchID'";
        $searchresult=mysqli_query($db,$searchSql);

        if(mysqli_num_rows($searchresult)>0){
            while($searchRow = mysqli_fetch_assoc($searchresult)){
                $line = "<p><a href='photo.php?id=".$searchRow['photoID']."'>".$searchRow['title']."</a></p>";
                $resultText = $resultText.$line;
            }
        }
        else{
            $resultText = "no photos by user";
        }
    }
    else
    {
        $resultText = "no user with that username";

    }
}
?>