<?php session_start();?>
<!doctype html>
<html>
    <head>
            <meta charset="UTF-8">
            <title>Personnal Information</title>
            <link rel="stylesheet" type="text/css" href="../css/main.css">
            <script src="../js/main.js"></script>
    </head>

    <body>
        <h1>Personal Information</h1>
        <form method="post" name="survey" action="save_person.php">
            <table>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="firstName" /></td>
                    <td class="error" id="error0"></td>
                </tr>
                <tr>
                    <td>Last Name: </td>
                    <td><input type="text" name="lastName" /></td>
                    <td class="error" id="error1"></td>
                </tr>
                <tr>
                    <td>Age: </td>
                    <td><input type="text" name="age" /></td>
                    <td class="error" id="error2"></td>
                </tr>
                <tr>
                    <td>Street: </td>
                    <td><input type="text" name="street" /></td>
                    <td class="error" id="error3"></td>
                </tr>
                <tr>
                    <td>Postal code: </td>
                    <td><input type="text" name="postalCode" /></td>
                    <td class="error" id="error4"></td>
                </tr>
                <tr>
                    <td>Province: </td>
                    <td><select name="province" id="province">
                        <option value="no">--</option>
                        <option value="AB">AB</option>
                        <option value="BC">BC</option>
                        <option value="MB">MB</option>
                        <option value="NB">NB</option>
                        <option value="NL">NL</option>
                        <option value="NT">NT</option>
                        <option value="NS">NS</option>
                        <option value="NU">NU</option>
                        <option value="ON">ON</option>
                        <option value="PE">PE</option>
                        <option value="QC">QC</option>
                        <option value="SK">SK</option>
                        <option value="YT">YT</option>
                    </select></td>
                    <td class="error" id="error5"></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="email" id="email"/></td>
                    <td class="error" id="error6"></td>
                </tr>
                <tr>
                    <td colspan="3"><input type="submit" id="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>