<?php
//connect to DB
require('../php-connect.php');
$db = get_db();

//query for all movies
$stmt = $db->prepare('SELECT id, title, year FROM movies');
$stmt->execute();
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

//go through each movie in the result


?>

<!DOCTYPE html>
<html lang="en-us">

    <head>
        <meta charset="utf-8">
        <title>Movies</title>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.1.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="teamStyle.css">
    </head>

    <body>
        <?php include 'teamHeader.php';?>
        <main role="main">
            <h1>Movies</h1>
            <ul>
                <?php
                    foreach($movies as $movie) {
                        $title = $movie['title'];
                        $year = $movie['year'];
                        echo "<li><p>$title, $year</p></li>";
                    }
                ?>
                <li></li>
                <li></li>
            </ul>
        </main>

    </body>

</html>
