<!DOCTYPE html>
<html>
<head>

</head>
<body>
<p>
    <?php
    echo "I am dimocee";
    echo "Hello, Binta";
    echo "Hello," . " " . "Binta " . "!";
    echo 5 * 40;
    $myname = "Modee Santuraki";

    $myage = 231;
    echo "My name is" . $myname . "and I am" . $myage . "Years old";

    $name = "Mumcy";
    if ( $name == "Modee") {
        print "I know You for real";
    }
    else
    {
        print "Who the fuck are you? ";
    }

    $Firstage = 16;
    $secondage = 18;
    $Thirdage = 21;
    if ($Firstage >= 16)  {
        Print "Buy specs";
    }
    elseif ($secondage == 18) {
        Print "Buy mugs";
    }
    elseif ($Thirdage <= 21) {
        print "Fuck off";
    }
    else
    print "Nothing for you all";
    $numberofcats = 3;
    switch ($numberofcats) {
        case 1:
            echo "1 sad cat";
            break;
        case 2:
            echo "2 happy cats";
            break;
        case 3:
            echo "3 cats are a crowd";
            break;
        default:
            echo "All the cats are asleep";
    }
    $wantedgood = 18 ;
    switch ($wantedgood) {
        case 1:
            echo "16 years to be to buy specs";
            break;
        case 2:
            echo "you have to be 18 to buy mugs";
            break;
        case 3:
            echo "you have to be 20 buy glass";

    }








?>
</p>

</body>
</html>
