<?php
//start the session
session_start();

//connect to DB
require('../php-connect.php');
$db = get_db();


//get all categories
$catQuery = $db->prepare("SELECT recipe_category FROM public.category");
$catQuery->execute();
$categories = $catQuery->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en-us">

    <head>
        <meta charset="utf-8">
        <title>Cooking Moms | Add Recipe</title>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.1.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <?php require('recipe-header.php') ;?>
        <main role="main">

            <div class="bg">
                <h1 class="display-4 font-italic banner-text">Add a recipe!</h1>
                <p class="lead my-3 banner-text">Share your best.</p>
            </div>
            <div class="container col-md-8">
                <form method="POST" action="insert-recipe.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="recipeTitle">Recipe Name: </label>
                            <input type="text" class="form-control" id="recipeTitle" name="recipeTitle">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ingredients">Ingredients: </label>
                            <textarea class="form-control" id="ingredients" name="ingredients"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="category">Category: </label><br/>
                            <?php
                            foreach($categories as $category)
                            {
                                $categoryId = $category['id'];
                                echo "<input type='radio' name='cat' value='$categoryId'> ";
                                echo $category['recipe_category'];
                                echo "<br/>";
                            };
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-success">Add Recipe</button>
                        </div>
                    </div>
                </form>

            </div>

        </main>

    </body>

</html>
