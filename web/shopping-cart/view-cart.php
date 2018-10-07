<?php

session_start();

$_SESSION['cart'] = array();

if($_SESSION['cart'] == NULL) {
    $cartItems = $_POST['cart'];
    if(isset($cartItems)) {
        foreach($cartItems as $item)
        {
            $item_clean = htmlspecialchars($item);
            array_push($_SESSION['cart'], $item_clean);
        }
    }
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
        <div class="album py-5">
            <div class="container">
                <div class="row">
                    <ul>
                        <?php
                            foreach($_SESSION['cart'] as $item)
                            {
                                echo "<li>$item</li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
