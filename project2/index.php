<!DOCTYPE html>
<head>
    <!--Gets static head and required assets-->
    <?php require 'requires/head.php';?>
</head>

<!-- Static navigation bar for all pages. -->
<body>
    <div id="navigation">
        <?php require 'requires/navigation.php';?>
    </div>



    <div id="main">
        <?php require 'requires/main.php';

        //Display list of all songs
        $file = 'data.txt';
        $songs = json_decode(file_get_contents($file));
        printResults($songs);

        ?>
    </div>

</body>

</html>