<?php
//connect to DB
require('../php-connect.php');
$db = get_db();

//query for all movies
$stmt = $db->prepare('SELECT id, title, year FROM movies');
$stmt->execute();
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

//go through each movie in the result


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

<!--
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="first-slide" src="../images/rawpixel-247358-unsplash.jpg" alt="First slide">
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1>Is it time for dinner?</h1>
                                <p>We're here to help.</p>
                                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                            </div>
                        </div>
                    </div>
            </div>
-->


            <div class="bg" >
                <div class="col-md-6 px-0">
                    <h1 class="display-4 font-italic">Is it time for dinner?</h1>
                    <p class="lead my-3">We're here to help.</p>
                </div>
            </div>


            <div class="album py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="../images/mariana-medvedeva-561531-unsplash.jpg" data-holder-rendered="true">
                                <div class="card-body d-flex justify-content-between">
                                    <p class="card-text">Find DINspiration</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top" alt="Thumbnail [100%x225]" src="../images/annie-spratt-464751-unsplash.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                                <div class="card-body d-flex justify-content-between">
                                    <p class="card-text">Your Tried and True</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top" alt="Thumbnail [100%x225]" src="../images/joseph-gonzalez-346674-unsplash.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                                <div class="card-body d-flex justify-content-between">
                                    <p class="card-text">Plan For the Future</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </body>

</html>
