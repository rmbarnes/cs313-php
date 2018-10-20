<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en-us">

    <head>
        <meta charset="utf-8">
        <title>Cooking Moms | Login</title>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.1.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <?php require('recipe-header.php') ;?>
        <main role="main">

            <div class="bg">
                <h1 class="display-4 font-italic banner-text">Login for full access</h1>
                <p class="lead my-3 banner-text">Go ahead, sign in.</p>
            </div>

            <div class="container col-md-8">
                <form method="post" action="user-recipes.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="JaneSmith">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Password</label>
                            <input type="password" class="form-control" id="pass" name="pass">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <a class="btn btn-danger" href="index.php">Return to home</a>
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>

            </div>
        </main>

    </body>

</html>
