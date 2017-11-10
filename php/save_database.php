<?php session_start();
include "connect.php";
include "Person.php";
$person = new Person($_SESSION["firstName"], $_SESSION["lastName"], intval($_SESSION["age"]), $_SESSION["street"], $_SESSION["postalCode"], $_SESSION["province"], $_SESSION["email"]);

$command="INSERT INTO person(firstName,lastName,age,street,postalCode,province,email)VALUES(?,?,?,?,?,?,?);";
$stmt = $dbh->prepare($command);
$result = $stmt->execute(Array($person->firstName, $person->lastName, $person->age, $person->street, $person->postalCode, $person->province, $person->email));
if($result){
    $message = "Information has been saved successfully!";
} else {
    $message = "Insert failed";
    $command = "";
}
?>
<!doctype>
<html>
    <head>
        <meta charset="utf-8">
        <title>Database insert result</title>
<!--        <link rel="stylesheet" type="text/css" href="css/savaDataStyle.css">-->
    </head>
    <body>
        <div>
            <p><?php echo $message?></p>
        </div>
        <div id="backHomeButton">
            <input type="button" name="button" value="Home" onclick="window.location.href='../index.html';">
        </div>
    </body>
</html>