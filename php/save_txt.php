<?php session_start();
// retrieve the form data into an array.
$personInfo = array(
    $_SESSION["firstName"],
    $_SESSION["lastName"],
    $_SESSION["age"],
    $_SESSION["street"],
    $_SESSION["postalCode"],
    $_SESSION["province"],
    $_SESSION["email"]
);
$output=$message="";
for($i = 0; $i < count($personInfo); $i++){
    $output.=$personInfo[$i]."\n";
}
//echo $output;
$filename = "../users/".$_SESSION["firstName"]."_".$_SESSION["lastName"].".txt";
try{
    $file = fopen( $filename, "a" );
    fwrite($file, $output);
    fclose($file);
    $message = "File has been saved successfully!";
} catch (Exception $ex){
    // if there was a problem, throw an error message and stop.
    echo 'Message: ' . $e->getMessage();
    exit();
}
?>
<!doctype>
<html>
    <head>
        <meta charset="utf-8">
        <title>Saved successfully</title>
        <link rel="stylesheet" type="text/css" href="css/savaDataStyle.css">
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