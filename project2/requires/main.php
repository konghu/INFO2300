<?php

function isValid($input) {
    if(empty($input)){
        return "empty";
    }
    if(strlen($input) > 80) {
        return "length";
    }
    if(! preg_match("/^[\w\s-]+$/", $input)) {
        return "invalid";
    }
    return true;
}

function isValidRatings($input){
    if(intval($input) >5 || intval($input) <1){
        return "invalid";
    }
    if(empty($input)){
        return "empty";
    }
    return true;
}

function search($title, $singer, $category, $ratings, $comments, $array){
    $titleMatches = array();
    $singerMatches = array();
    $categoryMatches = array();
    $ratingsMatches = array();
    $commentsMatches = array();

    for ($i1 = 0; $i1 < count($array); $i1++) {
        // Title field
        if ((!empty($title)) && (stripos($array[$i1][0], $title) !== false)) {
            $titleMatches = $array[$i1];
        }
        if ((!empty($singer)) && (stripos($array[$i1][1], $singer) !== false)) {
            $singerMatches = $array[$i1];
        }
        if ((!empty($category)) && (stripos($array[$i1][2], $category) !== false)) {
            $categoryMatches = $array[$i1];
        }
        if ((!empty($ratings)) && (stripos($array[$i1][3], $ratings) !== false)) {
            $ratingsMatches = $array[$i1];
        }
        if ((!empty($comments)) && (stripos($array[$i1][4], $comments) !== false)) {
            $commentsMatches = $array[$i1];
        }
    }

    $args = array();
    if ( !empty($titleMatches) ) array_unshift($args, $titleMatches);
    if ( !empty($singerMatches) ) array_unshift($args,  $singerMatches);
    if ( !empty($categoryMatches) ) array_unshift($args, $categoryMatches);
    if ( !empty($ratingsMatches) ) array_unshift($args ,$ratingsMatches);
    if ( !empty($commentsMatches) ) array_unshift($args, $commentsMatches);

    return array_unique($args, SORT_REGULAR);

}

function printResults($songs) {
    if (count($songs) == 0) {
        echo '<div class="notice">Nothing to see here. <a class="link sectionColor" href="../write.php">Share a song</a></div>';
    }
    else {
        for ($i=0; $i < count($songs) ; $i++) {
            echo '
			<div class="song">
			';

            if ($songs[$i][3] == 1) echo '<div class="right"><div class="image"><img alt="1star" src="images/1star.png"></div></div>';
            //               Image created by myself
            elseif ($songs[$i][3] ==2) echo '<div class="right"><div class="image"><img alt="2stars" src="images/2stars.png"></div></div>';
            //               Image created by myself
            elseif ($songs[$i][3] ==3) echo '<div class="right"><div class="image"><img alt="3stars" src="images/3stars.png"></div></div>';
            //               Image created by myself
            elseif ($songs[$i][3] ==4) echo '<div class="right"><div class="image"><img alt="4stars" src="images/4stars.png"></div></div>';
            //               Image created by myself
            elseif ($songs[$i][3] ==5) echo '<div class="right"><div class="image"><img alt="5stars" src="images/5stars.png"></div></div>';
            //               Image created by myself

            echo '
				<div class="left">
					<div class="title">' . $songs[$i][0] .'</div>   
					    <div class="info">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; by <div class="singer sectionColor">' . $songs[$i][1] .'</div>
                            in <div class="category sectionColor">' . $songs[$i][2] .'</div>
                        </div>
					<div class="comments">' . $songs[$i][4] .'</div>
				</div>
			</div>
		    ';

        }
    }

}

?>