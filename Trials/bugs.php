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


    $wantedgood = "specs" ;
    switch ($wantedgood) {
        case 1:
            echo "16 buy specs";
            break;
        case 2:
            echo "18 buy mugs";
            break;
        case 3:
            echo "20 buy glass";
            break;
        default:
            echo "not working ";
    }
    if ($wantedgood == "mugs") {
        print "you have to be 18 to buy mugs";
    }
    elseif
    ($wantedgood == "specs") {
        print "you have to be 19 to buys specs";
    }
    elseif
    ($wantedgood == "glass") {
        print "you have to be my age to get that shit";
    }
    else
        print "nothing more";

    $myarray = array ("modi","Adda", "Yaya");

    $myarray[1] = "mumcy";
    echo $myarray[1];



    $provisionedactivities = array ("specs","drugs", "Rock and roll");
    echo $provisionedactivities[1];
    echo $provisionedactivities[2];
    $provisionedactivities [0] = "hugs";
    echo $provisionedactivities[0];











?>
</p>

</body>
</html>
