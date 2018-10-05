<?php

session_start();
//add some functionality here
if ( !isset( $_SESSION['user'] ) )
    $_SESSION['user'] = 1;
else $_SESSION['count']++;

?>

<!DOCTYPE html>
<html lang="en-us">

    <head>
        <meta charset="utf-8">
        <title>Holiday Cookies</title>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.1.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>

    <body>
        <?php require 'cart-header.php';?>
        <main role="main">
            <div class="album py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="../images/cookie-1864642_640.jpg" data-holder-rendered="true">
                                <div class="card-body">
                                    <p class="card-text">This is from our stop in Venice.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top" alt="Thumbnail [100%x225]" src="../images/cookie-1065911_640.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                                <div class="card-body">
                                    <p class="card-text">The great Duomo of Florence</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top" alt="Thumbnail [100%x225]" src="../images/cinnamon-stars-1864647_640.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                                <div class="card-body">
                                    <p class="card-text">Ancient Rome</p>
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
                                <div class="card-body">
                                    <p class="card-text">This is from our stop in Venice.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top" alt="Thumbnail [100%x225]" src="../images/christmas-3005464_640.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                                <div class="card-body">
                                    <p class="card-text">The great Duomo of Florence</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top" alt="Thumbnail [100%x225]" src="../images/biscuit-2871223_640.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                                <div class="card-body">
                                    <p class="card-text">Ancient Rome</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>

</html>
