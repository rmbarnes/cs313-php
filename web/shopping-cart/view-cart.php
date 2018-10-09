<?php

session_start();

$removedItem = $_POST['remove'];

    if(isset($removedItem)) {
        unset($_SESSION['cart'][$removedItem]);
    }
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>Cart | Holiday Cookies</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="cart-style.css">
</head>

<body>
    <?php require 'cart-header.php';?>
    <main role="main">
        <div class="container">
            <div class="row justify-content-md-center">
                <h1>Your Cart</h1>
            </div>
        </div>
        <form method="post" action="view-cart.php">

            <ul>
                <?php
                    foreach($_SESSION['cart'] as $item)
                    {

                        echo "<div class='album py-5'>
                            <div class='container'>
                            <div class='row'>
                            <div class='col-md-4'>
                            <div class='card mb-4 shadow-sm'>
                            <li>$item <button type='submit' class='.btn-danger' name='remove' value='$item'>Remove item</button></li>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>"

//                        echo "<li>$item <button type='submit' class='.btn-danger' name='remove' value='$item'>Remove item</button></li>";
                    }
                ?>
            </ul>
        </form>
    </main>
</body>

</html>
