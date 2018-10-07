<?php

session_start();

$sessionCart = array();
$_SESSION['cart'] = array();

$cartItems = $_POST['cart'];
if(isset($cartItems)) {
    foreach($cartItems as $item)
    {

        $item_clean = htmlspecialchars($item);
        array_push($sessionCart, $item_clean);
        echo var_dump($sessionCart);
    }
    $_SESSION['cart'] = $sessionCart;
}




$items = $_POST["cart"];
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
        <div class="album py-5">
            <div class="container">
                <div class="row">
                    <ul>
                        <?php
                            foreach($items as $item)
                            {
                                $item_clean = htmlspecialchars($item);
                                echo "<li>$item_clean</li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
