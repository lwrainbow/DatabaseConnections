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
        <title>Show all person</title>
<!--        <link rel="stylesheet" type="text/css" href="css/savaDataStyle.css">-->
    </head>
    <body>
        <div>
            <p>Selected a person you want to see the her/his information:</p>
            <form action="read_database.php" method="post">
                <?php
                for($i = 0; $i < sizeof($nameArray); $i++){
                    echo "<input type='radio' name='personName' value='$nameArray[$i]'/>$nameArray[$i]</br>";
                }
                ?>
                <input type="submit" value="Show!"/>
            </form>
        </div>
        <div>
            <?php
            if(isset($_POST["personName"])){
                if ($person){
                    echo "<table>";
                    echo "<tr>";
                    echo "<td>First Name: </td>";
                    echo "<td>".$person->firstName."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Last Name: </td>";
                    echo "<td>".$person->lastName."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Age: </td>";
                    echo "<td>".$person->age."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Street: </td>";
                    echo "<td>".$person->street."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>PostalCode: </td>";
                    echo "<td>".$person->postalCode."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Province: </td>";
                    echo "<td>".$person->province."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>E-mail: </td>";
                    echo "<td>".$person->email."</td>";
                    echo "</tr>";
                    echo "</table>";
                } else {
                    echo "<p>".$_SESSION['personName']."not found.</p>";
                }
            }
            ?>
        </div>
        <div id="backHomeButton">
            <input type="button" name="button" value="Home" onclick="window.location.href='../index.html';">
        </div>
    </body>
</html>