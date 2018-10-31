<?php
session_start();
if (isset($_GET['msg']))
{
    $msg = $_GET['msg'];
}

?>

<!DOCTYPE html>
<html lang="en-us">

    <head>
        <meta charset="utf-8">
        <title>Cooking Moms | Create Account</title>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.1.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <?php require('recipe-header.php') ;?>
        <main role="main">

            <div class="bg">
                <h1 class="display-4 font-italic banner-text">Create an Account</h1>
                <p class="lead my-3 banner-text">Go ahead, create one.</p>
            </div>

            <div class="container col-md-8">
                <div class="row">
                    <?php
                    if (isset($msg))
                    {
                        echo "<p class='error'>$msg</><br/>";
                    }
                    ?>
                </div>
            </div>
            <div class="container col-md-8">
                <form method="POST" action="insert-user.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="displayName">Display Name</label>
                            <input type="text" class="form-control" id="displayName" name="displayName" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Password</label>
                            <input type="password" class="form-control" id="pass" name="pass" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">Create User</button>
                        </div>
                    </div>
                </form>

            </div>
        </main>

    </body>

</html>
