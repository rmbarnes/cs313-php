<?php
require('../php-connect.php');
$db = get_db();

if (isset($_POST['book']))
{
    $book = $_POST['book'];

    $query = "SELECT book, chapter, verse, content FROM scriptures WHERE book = '$book'";
}
else {
    $query = 'SELECT book, chapter, verse, content FROM scriptures';
}

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
            <form>
                Book: <input type="text" name="book">
                Chapter: <input type="text" name="chapter">
                Verse: <input type="text" name="verse">
                Content: <textarea name="content"/>

                <?php
                foreach ($topics as $topic)
                {
                    echo "<input type='checkbox' value='$topic'>";
                }

                ?>
            </form>


            <form action="scriptures.php" method="POST">
                Book: <input type="text" name="book">
                <input type="submit" value="Query">
            </form>
        </main>

    </body>

</html>
