
<!--* Created by PhpStorm.
* User: 1410733
* Date: 24/02/2016
* Time: 14:36
*/-->
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<p>
    <?php
    echo "<p>Hello World</p>";
    echo "I am Here"."Not much of a fun"."Ba damuwa";

    echo 5 * 7;
    $myname= "Modee Santuraki";
    $Myage= 200;
    echo "My name is" ." ". $myname . " "."and I am " . $Myage;
    ?>
    </p>


    <p>
    <?php
    $name = "Dimocee";
    if ($name == "Dimocee")
    { echo "I know you!";}
    else
    { print "who are you?";}
    ?>
</p>

<?php
    $myage= "17";
        if ($Myage =30)
        {echo "buy specs";}
    elseif
($myage < 17)
    {echo "buy mugs";}
elseif
($Myage >= 17)
{echo "buy sausage rolls";}
    else {echo "this is not for you";}
?>

</body>
</html>
