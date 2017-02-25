<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Panda World</title>
    <link rel="stylesheet" type="text/css" href="styles/header.css">
    <link rel="stylesheet" type="text/css" href="styles/home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php include 'includes/header.php';?>
<br>
<br>
<div id="center"><p>The only remaining giant panda habitat is on the mountainous eastern edge of west China, in Sichuan, Shaanxi, and Gansu provinces.
        Giant Pandas mainly live in Sichuan Province (thus nicknamed “home of Giant Pandas”).</p>
<div class = "image"> <img src = images/distribution.jpg alt="distribution"></div>
    <!-- credit to https://www.pinterest.com/APGraphicDesign/12-idea/ -->
</div>


<br>
<br>
<br>
<br>
<div id="quiz">POP QUIZ:
    <p id="question">Where do you think pandas live?</p></div>



<form action="distribution.php" method="post">
    <input type="checkbox" name="countries[]" value="USA">USA
    <input type="checkbox" name="countries[]" value="Japan">Japan
    <input type="checkbox" name="countries[]" value="Saudi">Saudi Arabia
    <input type="checkbox" name="countries[]" value="China">China
    <input type="checkbox" name="countries[]" value="Finland">Finland
    <input type="submit" value="Submit">
</form>


<?php

if(isset($_POST["countries"])) {
    $array = $_POST["countries"];
    print("You think pandas are from ");
    foreach ($array as $country) {
        print("$country");
    }
    print "<br><br>";

    if ($array[0] == "China" && count($array) == 1) {
        echo "<div class = 'output'> You are so smart </div>";
    } else {
        echo "<div class = 'output'> Try again... </div>";
    }
}

    ?>
</body>
