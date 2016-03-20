<?php
/**
 * Created by PhpStorm.
 * User: Lesson
 * Date: 18/03/2016
 * Time: 03:54 PM
 */
SESSION_START();

$username= $_SESSION['username'] ;

?>
<body>
<?php echo $_SESSION["username"] . " ";?>
<a href="logout.php">Signout</a>
	<form method="post" action="Bug.php" enctype="multipart/form-data">
		<fieldset>
		<legend>Bug Form</legend>
			<table width="400" border="0" cellpadding="10" cellspacing="10">
    <tr>
    <td>
        <input name="Bugtitle" type="text" class="input" size="25" required />
    </td>

    <td style="font-weight: bold">
        <div align="right">
            <label for="Bugtitle">Bug title</label>
        </div>
    </td>
</tr>


<tr>
    <td height="23" style="font-weight: bold">
        <div align="right">
            <label for="BugDesc">Bug Description</label>
        </div>
    </td>
    <td>
        <textarea cols="40" rows="4" name="BugDesc"  class="input" required > </textarea>
    </td>
</tr>
<tr>
    <td height="23" style="font-weight: bold">
        <div align="right">
            <label for="Dateposted">Date Posted</label>
        </div>
    </td>
    <td>
        <input name="Dateposted" type="date" class="input" size="25" required />
    </td>
</tr>

                <tr>
                    <td style="font-weight: bold">
                        <div align="right"><label for="Datefixed">Date Fixed</label></div>
                    </td>
                    <td>
                        <input name="Datefixed" type="date" class="input" size="25" required />
                    </td>
                </tr>

                <tr>
                    <td style="font-weight: bold">
                        <div align="right"><label for="Attachment">Attachment</label></div>
                    </td>
                    <td>
                        <input name="Attachment" type="file" class="input" size="25" required />
                    </td>
                </tr>
<tr>
    <td>
        <input type="hidden" name="id" value="<?php echo $_SESSION['username']; ?>">
    </td>
</tr>

<tr>

    <td height="23"></td>
    <td>
        <div align="right">
            <input type="submit" name="submit" value="Submit" />
        </div>
    </td>
</tr>
</table>
</fieldset>
</form>
</body>
</html>











?>