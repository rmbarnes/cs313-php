<?php
//start the session
session_start();

//connect to DB
require('../php-connect.php');
$db = get_db();

//get all recipes
if (isset($_SESSION['userId']))
{
    $recipeQuery = $db->prepare("SELECT id, recipe_title FROM public.recipe");
    $recipeQuery->execute();
    $recipes = $recipeQuery->fetchAll(PDO::FETCH_ASSOC);
}
else
{
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en-us">

    <head>
        <meta charset="utf-8">
        <title>Cooking Moms | Add Meal Plan</title>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.1.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <?php require('recipe-header.php') ;?>
        <main role="main">

            <div class="bg">
                <h1 class="display-4 font-italic banner-text">Add a meal plan!</h1>
                <p class="lead my-3 banner-text">Make more time for family.</p>
            </div>
            <div class="container col-md-8">
                <form method="POST" action="insert-plan.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="start">Start Date: (YYYY-MM-DD)</label>
                            <input type="text" class="form-control" id="start" name="start">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="end">End Date: (YYYY-MM-DD)</label>
                            <input type="text" class="form-control" id="end" name="end">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="category">Category: </label><br/>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">Recipes: </label><br/>
                                    <?php
                                    foreach($recipes as $recipe)
                                    {
                                        $recipeId = $recipe['id'];
                                        echo "<input type='checkbox' name='check[]' value='$recipeId'> ";
                                        echo $recipe['recipe_title'];
                                        echo "<br/>";
                                    };
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-success">Add Meal Plan</button>
                        </div>
                    </div>
                </form>

            </div>

        </main>

    </body>

</html>
