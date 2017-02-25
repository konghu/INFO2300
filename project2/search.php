<!DOCTYPE html>
<head>
    <!--Gets static head and required assets-->
    <?php require 'requires/head.php';?>
</head>

<body>
<div class="wrap">

    <!--Gets static navigation bar-->
    <?php require 'requires/navigation.php';?>

    <div class="main">

        <!-- Get required PHP functions -->
        <?php require 'requires/main.php';?>

        <?php

        //read data
        $file = 'data.txt';
        $songs = json_decode(file_get_contents($file));

        //get injection-safe _GET data
        $title = htmlentities($_GET['title']);
        $singer = htmlentities($_GET['singer']);
        $category = htmlentities($_GET['category']);
        $ratings = htmlentities($_GET['ratings']);
        $comments = htmlentities($_GET['comments']);

        //If one of (title | singer | category | ratings | comments ) is not empty,
        //user has performed a search. Perform it and print results.

        if(((! empty($title)) || (! empty($singer))|| ! empty($category)) || (! empty($ratings)) || (! empty($comments)) ) {
            $search = search($title, $singer, $category, $ratings, $comments, $songs);
            printResults($search);
        }

        ?>
    </div>
</div>
</body>

</html>