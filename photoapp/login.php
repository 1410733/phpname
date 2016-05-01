<?php
session_start();
session_regenerate_id();
?>
<?php
include("connection.php"); //Establishing connection with our database

//Function to cleanup user input for xss
function xss_cleaner($input_str) {
	$return_str = str_replace( array('<','>',"'",'"',')','('), array('&lt;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $input_str );
	$return_str = str_ireplace( '%3Cscript', '', $return_str );
	return $return_str;
}


$error = ""; //Variable for storing our errors.
if(isset($_POST["submit"]))
{
	if(empty($_POST["username"]) || empty($_POST["password"]))
	{
		$error = "Both fields are required.";
	}else {
		// Define $username and $password
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		//clean user supplied input
		$username=mysqli_real_escape_string($db,$username);
		$username=xss_cleaner($username);
		$password=md5($password);

		//clean user input from cross site scripting
		xss_cleaner($username );

		//instance connection to te DB
		$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		//if(!$mysqli) die('Could not connect$: ' . mysqli_error());

		//test connection
		if ($mysqli->connect_errno) {
			echo "Failed to connect to Database: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}

		//create procedure

		if (!$mysqli->query("DROP PROCEDURE IF EXISTS Login_Procedure") ||
			!$mysqli->query('CREATE PROCEDURE Login_Procedure(IN newusername varchar(255),
    IN newpassword varchar(255), OUT newuserID int)
   BEGIN
    SELECT `userID` INTO newuserID FROM users WHERE username = newusername
       AND password = newpassword;END;')
		) {
			echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}

		$mysqli->query("SET @userID=0");

		if (!$mysqli->query("CALL Login_Procedure('$username','$password',@userID)")) {
			//echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}


		$res = $mysqli->query("SELECT @userID as userID");
	}
	$row = $res->fetch_assoc();
	$userid=$row['userID'];//Get user ID



	if ($userid < 1)
	{
		echo  "Incorrect username or password.";

	}else
	{
		$_SESSION['username'] = $username; // Initializing Session
		$_SESSION["userid"] = $userid;//user id assigned to session global variable
		$_SESSION['ip']=$_SERVER['REMOTE_ADDR'];

		header("location: photos.php"); // Redirecting To Other Page
	}


}

?>