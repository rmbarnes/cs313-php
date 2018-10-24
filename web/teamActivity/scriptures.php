<?php
    require('../php-connect.php');
    $db = get_db();

    $book = $_POST['book'];
    $chapter = $_POST['chapter'];
    $verse = $_POST['verse'];
    $content = $_POST['content'];
    $topics = $_POST['topic'];

    $someQuery = $db->prepare('INSERT INTO scriptures(book,     chapter, verse, content) VALUES
        (:book, :chapter, :verse, :content)');

    $someQuery->bindValue(":book", $book);
    $someQuery->bindValue(":chapter", $chapter);
    $someQuery->bindValue(":verse", $verse);
    $someQuery->bindValue(":content", $content);

    $someQuery->execute();

    $scriptId = $db->lastInsertId("scriptures_id_seq");

    foreach ($topics as $topicId)
    {
        $anotherQuery = $db->prepare('INSERT INTO topics_scriptures(script_id, topic_id) VALUES
        (:scriptId, :topicId)');

        $anotherQuery->bindValue(":topicId", $topicId);
        $anotherQuery->bindValue(":scriptId", $scriptId);
        $anotherQuery->execute();
    }


    if (isset($_POST['book']))
    {
        $book = $_POST['book'];

        $query = "SELECT id, book, chapter, verse, content FROM scriptures WHERE book = '$book'";

    }
    else {
        $query = 'SELECT id, book, chapter, verse, content FROM scriptures';
    }

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
            <h1>Scripture Resources</h1>
            <?php

                foreach ($db->query($query) as $row)
                {
                    echo '<b>'.$row['book'];
                    echo ' ' . $row['chapter'];
                    echo ':' . $row['verse'].'</b>';
                    echo ' - "' . $row['content'].'"';
                    echo '<br/>';

                    $topicQuery = $db->prepare("SELECT name FROM topics t
                        INNER JOIN topics_scriptures ts ON t.id = ts.topic_id  WHERE ts.script_id = :scriptId");
                    $topicQuery->bindValue(':scriptId', $row['id']);
                    $topicQuery->execute();

                    while ($topicRow = $topicQuery->fetch(PDO::FETCH_ASSOC))
                    {
                        echo $topicRow['name'] . ' ';
                    }

                }
            ?>

            <form action="scriptures.php" method="POST">
                Book: <input type="text" name="book">
                <input type="submit" value="Query">
            </form>
        </main>

    </body>

</html>
