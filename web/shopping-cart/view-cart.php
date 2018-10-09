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


                <?php
                    foreach($_SESSION['cart'] as $item)
                    {

                        echo "<div class='container'>
                            <div class='row'>
                            <div class='col-md-4'>
                            <div class='card mb-4 shadow-sm'>
                            <div class='card-body d-flex justify-content-between'>
                            $item <button type='submit' class='.btn .btn-danger' name='remove' value='$item'>Remove</button>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>";

                    }
                ?>

        </form>
    </main>
</body>

</html>
