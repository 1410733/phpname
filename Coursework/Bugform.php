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
<a href="logout.php">Signout</a>
<?php echo $_SESSION["username"] . " ";?>
	<form method="post" action="Bug.php" enctype="multipart/form-data">
        <input type="hidden" name="Attachment" value="<?php echo $username; ?>" >
		<fieldset>
		<legend>Bug Form</legend>
			<table width="300" border="0" cellpadding="10" cellspacing="10">
				<tr>
					<td colspan="2" align="center" class="error"><?php echo $msg;?></td>
</tr>
<tr>
    <td style="font-weight: bold">
        <div align="center"><label for="Bugtitle">Bug title</label></div>
    </td>
    <td>
        <input name="Bugtitle" type="text" class="input" size="25"  />
    </td>
</tr>



<tr>
    <td height="23" style="font-weight: bold">
        <div align="right">
            <label for="BugDesc">Bug Description</label>
        </div>
    </td>
    <td>
        <textarea cols="40" rows="4" name="BugDesc"  class="input"  > </textarea>
    </td>
</tr>


              <!--  <tr>
                    <td style="font-weight: bold">
                        <div align="right"><label for="Datefixed">Date Fixed</label></div>
                    </td>
                    <td>
                        <input name="Datefixed" type="date" class="input" size="25" />
                    </td>
                </tr> -->

                <tr>
                    <td style="font-weight: bold">
                        <div align="center"><label for="Attachment">Attachment</label></div>
                    </td>
                    <td>
                        <input name="image" type="file" class="input" size="25" />
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
        <div align="center">
            <input type="submit" name="submit" value="Submit" />
        </div>
    </td>
</tr>
</table>
</fieldset>
</form>
</body>
</html>











