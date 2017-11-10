<!doctype>
<html>
    <head>
        <meta charset="utf-8">
        <title>Read txt file</title>
<!--        <link rel="stylesheet" type="text/css" href="css/savaDataStyle.css">-->
    </head>
    <body>
        <form method="post" action="delete_txt.php">
            <p>Please enter the name of the person you want to delete</p>
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
            <a href="delete_txt.php"><input type="submit" name="delete_txt" value="Ok"></a>
        </form>
        <?php
        if (isset($_POST["delete_txt"])){
            $fileName="../users/".$_POST["fName"]."_".$_POST["lName"].".txt";
            if(file_exists($fileName)){
                unlink($fileName);
                echo "<p>Delete ".$_POST["fName"]." ".$_POST["lName"]." successfully!</p>";
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