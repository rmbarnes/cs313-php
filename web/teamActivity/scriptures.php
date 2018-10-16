<?php
    require('../php-connect.php');
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
                foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
                {
                    echo "<b>$row['book'];
                    echo ' ' . $row['chapter'];
                    echo ':' . $row['verse']<b>";
                    echo ' - ' . $row['content'];
                    echo '<br/>';
                }
            ?>
        </main>

    </body>

</html>
