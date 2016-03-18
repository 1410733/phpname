<?php
/**
 * Created by PhpStorm.
 * User: Lesson
 * Date: 18/03/2016
 * Time: 03:54 PM
 */
?>
body>
	<form method="post" action="">
		<fieldset>
		<legend>Registration Form</legend>
			<table width="400" border="0" cellpadding="10" cellspacing="10">
				<tr>
					<td colspan="2" align="center" class="error"><?php echo $msg;?></td>
</tr>
<tr>
    <td style="font-weight: bold">
        <div align="right"><label for="name">Username</label></div>
    </td>
    <td>
        <input name="Bug title" type="text" class="input" size="25" required />
    </td>
</tr>

<tr>
    <td style="font-weight: bold">
        <div align="right">
            <label for="Bug">Bug title</label>
        </div>
    </td>
    <td>
        <input name="BugDesc" type="text" class="input" size="25" required />
    </td>
</tr>


<tr>
    <td height="23" style="font-weight: bold">
        <div align="right">
            <label for="BugDesc">Bug Description</label>
        </div>
    </td>
    <td>
        <input name="BugDesc" type="text" class="input" size="25" required />
    </td>
</tr>
<tr>
    <td height="23" style="font-weight: bold">
        <div align="right">
            <label for="Username">Username</label>
        </div>
    </td>
    <td>
        <input name="Username" type="text" class="input" size="25" required />
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

    <td height="23"></td>
    <td>
        <div align="right">
            <input type="submit" name="submit" value="Register!" />
        </div>
    </td>
</tr>
</table>
</fieldset>
</form>
</body>
</html>











?>