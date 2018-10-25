<?php
session_start();
//connect to DB
require('../php-connect.php');
$db = get_db();


?>

    <!DOCTYPE html>
    <html lang="en-us">

    <head>
        <meta charset="utf-8">
        <title>Cooking Moms | Home</title>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.1.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <?php require('recipe-header.php') ;?>
        <main role="main">

            <div class="bg">
                <h1 class="display-4 font-italic banner-text">Time for dinner?</h1>
                <p class="lead my-3 banner-text">We're here to help.</p>
            </div>


            <div class="album py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <a href="browse.php">
                                    <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="../images/mariana-medvedeva-561531-unsplash.jpg" data-holder-rendered="true">
                                    <div class="card-body d-flex justify-content-between">
                                        <p class="card-text">Find DINspiration</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <a href="user-recipes.php">
                                    <img class="card-img-top" alt="Thumbnail [100%x225]" src="../images/annie-spratt-464751-unsplash.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                                    <div class="card-body d-flex justify-content-between">
                                        <p class="card-text">Your Tried and True</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <a href="meal-plans.php">
                                    <img class="card-img-top" alt="Thumbnail [100%x225]" src="../images/joseph-gonzalez-346674-unsplash.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                                    <div class="card-body d-flex justify-content-between">
                                        <p class="card-text">Plan For the Future</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </body>

    </html>
