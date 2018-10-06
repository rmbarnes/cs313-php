<?php

session_start();

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
                    <? var_dump($items)?>
<!--
                    <? foreach ($items as $item) {
                    $item_clean = htmlspecialchars($item);
                    echo
                    '<div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                                <p class="card-text">'. $item_clean .'</p>
                            </div>
                        </div>
                    </div>'};

                    ?>
-->
                </div>
            </div>
        </div>
    </main>
</body>

</html>
