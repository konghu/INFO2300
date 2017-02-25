<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Panda World</title>
    <link rel="stylesheet" type="text/css" href="styles/header.css">
    <link rel="stylesheet" type="text/css" href="styles/poll.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php include 'includes/header.php';?>

<br>

<br>

<div id="panda1">
    <img src="images/panda1.jpg" alt="cutePanda"><!-- credit to http://animalia-life.com/panda.html -->

<form method="post">
    What are some adjectives you can think of for pandas?
    <br>
    <input type="text" name="adj[]" />
    <input type="submit" name="submit" value="submit" />
</form>

<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

if(isset($_POST["submit"])) {
    $array = $_POST["adj"];

    if (isset($array) && preg_match("/^[a-zA-Z ]+$/i", $array[0])) {
        {
            print("Pandas are ");
            foreach ($array as $arrayElement) {
                print_r($arrayElement);
            }
        }
    }
    else {
        echo "<h3>Please enter an adjective you think of for pandas!</h3>";
    }
}
//$array ="";
//if( $_POST["adj"]  ){
//    $array=$_POST["adj"];
//}


?>
</div>



