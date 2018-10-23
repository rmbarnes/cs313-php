<?php
require('../php-connect.php');
$db = get_db();


$otherQuery = 'SELECT * FROM topics';
$stmt = $db->prepare($otherQuery);
$stmt->execute();
$topics = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en-us">

    <head>
        <meta charset="utf-8">
        <title>Scriptures</title>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.1.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="teamStyle.css">
    </head>

    <body>
        <?php include 'teamHeader.php';?>
        <main role="main">
            <h1>Add scripture</h1>
            <form method="post" action="scriptures.php">
                Book: <input type="text" name="book"><br/>
                Chapter: <input type="text" name="chapter"><br/>
                Verse: <input type="text" name="verse"><br/>
                Content: <textarea name="content"></textarea><br/>

                <?php
                foreach ($topics as $topic)
                {
                    $topicId = $topic['id'];
                    echo $topic['name'].": <input type='checkbox' name='topic[]' value='$topicId'>";
                    echo "<br/>";
                }

                ?>
                <input type="submit" value="Submit">
            </form>

        </main>

    </body>

</html>
