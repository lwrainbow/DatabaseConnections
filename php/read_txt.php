<!doctype>
<html>
    <head>
        <meta charset="utf-8">
        <title>Read txt file</title>
        <!--<link rel="stylesheet" type="text/css" href="css/savaDataStyle.css">-->
    </head>
    <body>
        <form method="post" action="read_txt.php">
            <p>Please enter the name of the person you want to read</p>
            <table>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="fName" /></td>
                </tr>
                <tr>
                    <td>Last Name: </td>
                    <td><input type="text" name="lName" /></td>
                </tr>
            </table>
            <input type="submit" name="read_txt" value="Ok">
        </form>
        <?php
        if(isset($_POST["read_txt"])){
            $fileName="../users/".$_POST["fName"]."_".$_POST["lName"].".txt";
            if(file_exists($fileName)){
                $file = fopen( $fileName, "r" );
                $array=array();
                $i=0;
                while (!feof($file)){
                    $array[$i]=fgets($file);
                    $i += 1;
                }
                echo "<p>".$_POST["fName"]." ".$_POST["lName"]."'s Information";
                echo "<table>";
                echo "<tr>";
                echo "<td>First Name: </td>";
                echo "<td>".$array[0]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Last Name: </td>";
                echo "<td>".$array[1]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Age: </td>";
                echo "<td>".$array[2]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Street: </td>";
                echo "<td>".$array[3]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>PostalCode: </td>";
                echo "<td>".$array[4]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Province: </td>";
                echo "<td>".$array[5]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>E-mail: </td>";
                echo "<td>".$array[6]."</td>";
                echo "</tr>";
                echo "</table>";

            } else {
                echo "<p>Don't have the ".$_POST["fName"]." ".$_POST["lName"]."</p>";
            }
        }
        ?>
        <div id="backHomeButton">
            <input type="button" name="button" value="Home" onclick="window.location.href='../index.html';">
        </div>
    </body>
</html>