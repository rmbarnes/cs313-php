<?php
setcookie("fave-text", "i like cookies", time() + (86400 * 7));
?>

<!DOCTYPE html>
<html lang="en-us">

    <head>
        <meta charset="utf-8">
        <title>Cookies | Cookies</title>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.1.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="teamStyle.css">
    </head>

    <body>
        <?php include 'teamHeader.php';?>
        <main role="main">
            <h1>Cookies, cookies, cookies!</h1>
            <p>Welcome. You are not logged in.</p>
        </main>

    </body>

</html>
