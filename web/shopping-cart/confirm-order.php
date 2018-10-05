<?php
session_start();

$_SESSION['firstname'] = htmlspecialchars($_POST["firstname"]);
$_SESSION['lastname'] = htmlspecialchars($_POST["lastname"]);
$_SESSION['address'] = htmlspecialchars($_POST["address"]);
$_SESSION['city'] = htmlspecialchars($_POST["city"]);
$_SESSION['state'] = htmlspecialchars($_POST["state"]);
$_SESSION['zip'] = htmlspecialchars($_POST["zip"]);

?>

<!DOCTYPE html>
<html lang="en-us">

    <head>
        <meta charset="utf-8">
        <title>Order Confirmation | Holiday Cookies</title>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.1.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="cart-style.css">
    </head>

    <body>
        <?php require 'cart-header.php';?>
        <main role="main">
            <div class="container">
                <div class="row justify-content-md-center">
                    <h1>Congrats on Your Cookie Order!</h1>
                </div>
            </div>
            <div class="container col-md-8">
                <p><?php echo $_SESSION['firstname']?></p>
                <p><?php echo $_SESSION['lastname']?></p>
                <p><?php echo $_SESSION['address']?></p>
                <p><?php echo $_SESSION['city']?></p>
                <p><?php echo $_SESSION['state']?></p>
                <p><?php echo $_SESSION['zip']?></p>

            </div>
        </main>
    </body>

</html>
