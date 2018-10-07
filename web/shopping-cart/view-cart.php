<?php

session_start();

$sessionCart = $_SESSION['cart'];

$cartItems = $_POST['cart'];
if(isset($cartItems)) {
    foreach($items as $item)
    {
        $item_clean = htmlspecialchars($item);
        array_push($sessionCart, $item_clean);
    }
    $_SESSION['cart'] = $sessionCart;
}



echo var_dump($cartItems);



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
