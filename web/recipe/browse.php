<?php
//connect to DB
require('../php-connect.php');
$db = get_db();

//query for all movies
$stmt = $db->prepare('SELECT * FROM recipe');
//$stmt->bindValue(':recipe_title', $recipeTitle, PDO::PARAM_STR);
$stmt->execute();
$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                <h1 class="display-4 font-italic banner-text">Need some inspiration?</h1>
                <p class="lead my-3 banner-text">We're here to help.</p>
            </div>

            <form method="post" action="browse.php">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="submit">Search</button>
                        </span>
                    </div>
                </div>
            </form>
            <div class="album py-5">
                <div class="container">
                    <div class="row">
            <?php
                foreach ($recipes as $recipe)
                {
                    $recipeTitle = $recipe['recipe_title'];
                    echo "<div class='col-md-4'>
                            <div class='card mb-4 shadow-sm'>
                                <div class='card-body d-flex justify-content-between'>
                                    <p class='card-text'>$recipeTitle</p>
                                </div>
                            </div>
                        </div>";
                };
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
