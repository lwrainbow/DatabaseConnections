<?php
include "connect.php";
include "Person.php";

if (isset($_POST["personName"])) {
    $nameArray=explode(' ',$_POST["personName"]);
    
    $command = "SELECT * FROM person WHERE firstName=? AND lastName=?";
    $stmt = $dbh->prepare($command);
    $stmt->execute(array($nameArray[0], $nameArray[1]));
    
    $row = $stmt->fetch();
    
    if($row){
        $person = new Person($row['firstName'], $row['lastName'], $row['age'], $row['street'], $row['postalCode'], $row['province'], $row['email']);
    }
    
    
    $command = "DELETE FROM person WHERE email=?";
    $stmt = $dbh->prepare($command);
    $result = $stmt->execute(array($person->email));
    
    if($result){
        $message = "Person ".$_POST["personName"]." deleted.";
    } else {
        $message = "Person ".$_POST["personName"]." could not be deleted.";
    }
}

$nameArray = Array();

$command="SELECT firstName,lastName FROM person;";

$stmt = $dbh->prepare($command);

$stmt->execute();

while ($row = $stmt->fetch()) {
    $name = $row['firstName']." ".$row['lastName'];
    array_push($nameArray, $name);
}
?>
<!doctype>
<html>
    <head>
        <meta charset="utf-8">
        <title>Delete Person</title>
<!--        <link rel="stylesheet" type="text/css" href="css/savaDataStyle.css">-->
    </head>
    <body>
        <div>
            <p>Selected a person you want to see the her/his information:</p>
            <form action="delete_database.php" method="post">
                <?php
                for($i = 0; $i < sizeof($nameArray); $i++){
                    echo "<input type='radio' name='personName' value='$nameArray[$i]'/>$nameArray[$i]</br>";
                }
                ?>
                <input type="submit" value="Delete!"/>
                <?php
                if (isset($message)) {
                    echo "<p>$message</p>";
                }
                ?>
            </form>
        </div>
        <div id="backHomeButton">
            <input type="button" name="button" value="Home" onclick="window.location.href='../index.html';">
        </div>
    </body>
</html>