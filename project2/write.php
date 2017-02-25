<!DOCTYPE html>
<head>
    <!--Gets static head and required assets-->
    <?php require 'requires/head.php';?>
</head>

<body>
<div class="wrap">

    <!--Gets static navigation bar-->
    <?php require 'requires/navigation.php';?>

    <div class="write">

        <!-- Gets required PHP functions -->
        <?php require 'requires/main.php';?>

        <?php

        //Setup temp var
        $flag = false;



        //Check if form was submitted
        if(isset($_POST['submit'])) {
            //Get injection-safe _POST data
            $title = htmlentities($_POST['title']);
            $singer = htmlentities($_POST['singer']);
            $category = htmlentities($_POST['category']);
            $ratings = htmlentities($_POST['ratings']);
            $comments = htmlentities($_POST['comments']);


            //Decode data. If data contains no songs set it to a blank array.
            $file = 'data.txt';
            $songs = json_decode(file_get_contents($file));
            if (empty($songs)) {
                $songs = array();
            }


            //First check that all fields are valid. If they are, prepend the
            //new song in data.txt and notify user. Set $flag to true
            //so the forms don't re-display.


            if ((isValid($title) === true) && (isValid($singer) === true)
                && (isValid($category) === true) && isValidRatings($ratings) === true
            ) {

                array_unshift($songs, array($title, $singer, $category, intval($ratings), $comments));
                file_put_contents($file, json_encode($songs));

                echo '<div class="notice">Thanks! <a class="link" href="index.php">Go home</a></div>';
                $flag = true;
            }

            //Collection of possible error messages. See main.php for functions used
            //and their specifications.
            else {
                echo '<div class="notice">Please correct the following:</div>';
                if (isValid($title) === "empty") {
                    echo '<div class="notice alert">Please enter a song title.</div>';
                }
                if (isValid($title) === "length") {
                    echo '<div class="notice alert">Song titles must be less than 80 characters in length.</div>';
                }
                if (isValid($title) === "invalid") {
                    echo '<div class="notice alert">Song titles must contain only letters, numbers, spaces, hyphens, and underscores.</div>';
                }
                if (isValid($singer) === "empty") {
                    echo '<div class="notice alert">Please enter a song singer.</div>';
                }
                if (isValid($singer) === "length") {
                    echo '<div class="notice alert">Song singers must be less than 80 characters in length.</div>';
                }
                if (isValid($singer) === "invalid") {
                    echo '<div class="notice alert">Song singers must contain only letters, numbers, spaces, hyphens, and underscores.</div>';
                }
                if (isValid($category) === "empty") {
                    echo '<div class="notice alert">Please enter a song category.</div>';
                }
                if (isValid($category) === "length") {
                    echo '<div class="notice alert">Song categories must be less than 80 characters in length.</div>';
                }
                if (isValid($category) === "invalid") {
                    echo '<div class="notice alert">Song categories must contain only letters, numbers, spaces, hyphens, and underscores.</div>';
                }
                if (isValidRatings($ratings) === "empty") {
                    echo '<div class="notice alert">Please enter your ratings for this song.</div>';
                }
                if (isValidRatings($ratings) === "invalid") {
                    echo '<div class="notice alert">Please enter a valid integer from 1 to 5.</div>';
                }
            }
        }

        //If the form hasn't been submitted or there are errors,
        //display the write form for corrections
        if(! $flag) {
            echo '
				<form class="form" action="write.php" method="post">
					<input class="input" type="text" name="title" value="'; echo '" placeholder="Title">
					<input class="input" type="text" name="singer"  value="'; echo '" placeholder="Singer">
					<select class="input" name="category">
						<option value="Pop" '; echo '>Pop</option>
						<option value="Rock" '; echo '>Rock</option>
						<option value="Country" '; echo '>Country</option>
						<option value="Blues" '; echo'>Blues</option>
						<option value="Rapping" '; echo '>Rapping</option>
						<option value="Classical" '; echo '>Classical</option>
					</select>
					<input class="input" type="text" name="ratings" value="';  echo '" placeholder="Ratings (star 1-5 )">
					<textarea class="input" rows="3" name="comments" placeholder="Enter comments for your song here.">'; echo '</textarea>
					<input class="input submit" name="submit" type="submit" value="Submit">
				</form>
				';
        }
        ?>



    </div>
</div>
</body>

</html>