<?php

session_start();
//add some functionality here
$_SESSION['cart'] = array();

?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>Holiday Cookies</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="cart-style.css">
</head>

<body>
    <?php require 'cart-header.php';?>
    <main role="main">
        <form method="post" action="">
            <div class="album py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="../images/cookie-1864642_640.jpg" data-holder-rendered="true">
                                <div class="card-body d-flex justify-content-between">
                                    <p class="card-text">Winter Assortment</p>
                                    <input type="checkbox" name="cart[]" value="assortment">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top" alt="Thumbnail [100%x225]" src="../images/cookie-1065911_640.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                                <div class="card-body d-flex justify-content-between">
                                    <p class="card-text">Jelly-filled Rings</p>
                                    <input type="checkbox" name="cart[]" value="jelly">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top" alt="Thumbnail [100%x225]" src="../images/cinnamon-stars-1864647_640.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                                <div class="card-body d-flex justify-content-between">
                                    <p class="card-text">Cinnamon Stars</p>
                                    <input type="checkbox" name="cart[]" value="cinnamon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="album py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="../images/christmas-biscuits-2939889_640.jpg" data-holder-rendered="true">
                                <div class="card-body d-flex justify-content-between d-flex justify-content-between">
                                    <p class="card-text">Christmas Biscuits</p>
                                    <input type="checkbox" name="cart[]" value="biscuits">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top" alt="Thumbnail [100%x225]" src="../images/christmas-3005464_640.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                                <div class="card-body d-flex justify-content-between">
                                    <p class="card-text">Christmas Moons</p>
                                    <input type="checkbox" name="cart[]" value="moons">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top" alt="Thumbnail [100%x225]" src="../images/biscuit-2871223_640.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                                <div class="card-body d-flex justify-content-between">
                                    <p class="card-text">Seven Swans</p>
                                    <input type="checkbox" name="cart[]" value="swans">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <button type="button" class="btn btn-success">Add Items to Cart</button>
            </div>
        </form>
    </main>
</body>

</html>
