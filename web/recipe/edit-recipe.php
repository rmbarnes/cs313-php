<?php
//start the session
session_start();
$recipeId = $_POST['recipeId'];
 var_dump($recipeId);

//connect to DB
require('../php-connect.php');
$db = get_db();


if (isset($recipeId))
{
    $query = "SELECT r.recipe_title,
                    r.recipe_ingredients,
                    c.recipe_category
            FROM public.recipe r
            INNER JOIN public.category c ON r.recipe_category = c.id
            WHERE r.id = :recipeId";
}

$stmt = $db->prepare($query);
$stmt->bindValue(':recipeId', $recipeId, PDO::PARAM_STR);
$stmt->execute();
$recipe = $stmt->fetchAll(PDO::FETCH_ASSOC);

$recipeTitle = $recipe['recipe_title'];
$ingredients = $recipe['recipe_ingredients'];
$category = $recipe['recipe_category'];

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
                <h1 class="display-4 font-italic banner-text">Edit your recipe</h1>
                <p class="lead my-3 banner-text">Make it even better.</p>
            </div>
            <div class="container col-md-8">
                <form method="POST" action="user-recipes.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">Recipe Name: </label>
                            <input type="text" class="form-control" id="recipeTitle" name="recipeTitle" value="<? echo $recipeTitle; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">Ingredients: </label>
                            <input type="text" class="form-control" id="ingredients" name="ingredients" value="<? echo $ingredients; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">Category: </label>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>

            </div>

        </main>

    </body>

</html>
