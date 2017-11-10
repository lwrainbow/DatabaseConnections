<?php session_start();?>
<!doctype>
<html>
    <head>
        <meta charset="utf-8">
        <title>Your Information</title>
        <link rel="stylesheet" type="text/css" href="css/savaDataStyle.css">
    </head>
    <body>
        <?php
        $_SESSION["firstName"] = $_POST["firstName"];
        $_SESSION["lastName"] = $_POST["lastName"];
        $_SESSION["age"] = $_POST["age"];
        $_SESSION["street"] = $_POST["street"];
        $_SESSION["postalCode"] = $_POST["postalCode"];
        $_SESSION["province"] = $_POST["province"];
        $_SESSION["email"] = $_POST["email"];
        
        $firstName=$lastName=$age=$street=$postalCode=$province=$email=$errorMessage="";
        $hasError=false;
        
        if (isset($_SESSION["firstName"])){
            $firstName = $_SESSION["firstName"];
            if (!preg_match("/^[a-zA-Z ][a-zA-Z ]+$/", $firstName)){
                $errorMessage.="<li>First Name: At least two character!</li>";
                $hasError = true;
            }     
        }
        
        if (isset($_SESSION["lastName"])){
            $lastName = $_SESSION["lastName"];
            // check if name only contains two character letter or whitespace
            if (!preg_match("/^[a-zA-Z ][a-zA-Z ]+$/", $lastName)){
                $errorMessage.="<li>Last Name: At least two character!</li>";
                $hasError = true;
            }
        }
        
        if (isset($_SESSION["age"])){
            $age = $_SESSION["age"];
            // check if age is a positive number
            if (!is_numeric($age) || !preg_match("/\A[0-9]+\Z/", $age)){
                $errorMessage.="<li>Age: Must enter a positive number!</li>";
                $hasError = true;
            }  
        }
        
        if (isset($_SESSION["street"])){
            $street = $_SESSION["street"];
            // check if street have a number plus a street name
            if (!preg_match("/^[\d]+[ ](?:[A-Za-z]+[ ]?)+$/", $street)){
                $errorMessage.="<li>Must have a number plus a street name!</li>";
                $hasError = true;
            }  
        }
        
        if (isset($_SESSION["postalCode"])){
            $postalCode = $_SESSION["postalCode"];
            // check if street have a number plus a street name
            if (!preg_match("/^[A-Za-z]\d[A-Za-z][ ]\d[A-Za-z]\d$/", $postalCode)){
                $errorMessage.="<li>Postal Codes are in the format ‘A1A 1A1’!</li>";
                $hasError = true;
            }   
        }
        
        if (isset($_POST["province"])){
            $province = $_POST["province"];
            if (preg_match("/no/", $province)){
                $errorMessage.="<li>Must choice a province!</li>";
                $hasError = true;
            }
        }
        
        if (isset($_POST["email"])){
            $province = $_POST["email"];
            if (!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $province)){
                $errorMessage.="<li>Invaild E-mail!</li>";
                $hasError = true;
            }
        }
        
        if ($hasError){
            echo "<div>";
            echo "<p>Please go back to check!<p>";
            echo "<ul>";
            echo $errorMessage;
            echo "</ul>";
            echo "</div>";
        } else {
            echo "<div>";
            echo "<h1>Your Information</h1>";
            echo "<table>";
            echo "<tr>";
            echo "<td>First Name: </td>";
            echo "<td>".$_SESSION["firstName"]."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Last Name: </td>";
            echo "<td>".$_SESSION["lastName"]."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Age: </td>";
            echo "<td>".$_SESSION["age"]."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Street: </td>";
            echo "<td>".$_SESSION["street"]."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>PostalCode: </td>";
            echo "<td>".$_SESSION["postalCode"]."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Province: </td>";
            echo "<td>".$_SESSION["province"]."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>E-mail: </td>";
            echo "<td>".$_SESSION["email"]."</td>";
            echo "</tr>";
            echo "</table>";
            echo "<p>Press the button to save to text file.</p>";
            echo '<a href="save_txt.php"><input type="submit" name="saveTxt" value="Submit"></a>';
            echo "<p>Press the button to save to database.</p>";
            echo '<a href="save_database.php"><input type="submit" name="saveDatabase" value="Submit"></a>';
            echo "</div>";
        }
        ?>
        <div id="backHomeButton">
            <input type="button" name="button" value="Home" onclick="window.location.href='add_person.php';">
        </div>
    </body>
</html>