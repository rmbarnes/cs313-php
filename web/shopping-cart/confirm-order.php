<?php
session_start();

$firstname = htmlspecialchars($_POST["firstname"]);
$lastname = htmlspecialchars($_POST["lastname"]);
$address = htmlspecialchars($_POST["address"]);
$city = htmlspecialchars($_POST["city"]);
$state = htmlspecialchars($_POST["state"]);
$zip = htmlspecialchars($_POST["zip"]);



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
                <p><? echo $firstname; echo " "; echo $lastname; ?></p>
                <p><? echo $address; ?></p>
                <p><? echo $city; echo ", "; echo $state;
                    echo " "; echo $zip; ?></p>

            </div>
        </main>
    </body>

</html>
