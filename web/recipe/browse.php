<?php
//connect to DB
require('../php-connect.php');
$db = get_db();

//query for all movies
$stmt = $db->prepare('SELECT recipe_title FROM recipe');
$stmt->bindValue(':recipe_title', $recipeTitle, PDO::PARAM_STR);
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

            <div class="bg">
                <h1 class="display-4 font-italic banner-text">Time for dinner?</h1>
                <p class="lead my-3 banner-text">We're here to help.</p>
            </div>

            <form method="post" action="browse.php">
                <input type="search">
                <input type="submit">
            </form>
            <div class="album py-5">
                <div class="container">
                    <div class="row">
            <?php
                foreach ($recipeTitle as $recipe)
                {
                    echo "<div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body d-flex justify-content-between">
                                    <p class="card-text">$recipe</p>
                                </div>
                            </div>
                        </div>"
                }
            ?>
                    </div>
                </div>
            </div>
            <!--

                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body d-flex justify-content-between">
                                    <p class="card-text">B</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body d-flex justify-content-between">
                                    <p class="card-text">Your Tried and True</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body d-flex justify-content-between">
                                    <p class="card-text">Plan For the Future</p>
                                </div>
                            </div>
                        </div>

-->
        </main>

    </body>

    </html>
