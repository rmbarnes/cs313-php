<?php
//start the session
session_start();
//var_dump($_POST);
//echo "<br/>";
//var_dump($_POST['recipeId']);
//
//$recipeId = $_POST['recipeId'];

$recipeId = $_GET['id'];

//connect to DB
require('../php-connect.php');
$db = get_db();


if (isset($recipeId))
{
    $query = "SELECT recipe_title,
                    recipe_ingredients
            FROM public.recipe
            WHERE id = :recipeId";
}

$stmt = $db->prepare($query);
$stmt->bindValue(':recipeId', $recipeId, PDO::PARAM_INT);
$stmt->execute();
$recipe = $stmt->fetch(PDO::FETCH_ASSOC);

$recipeTitle = $recipe[0]['recipe_title'];
$ingredients = $recipe[0]['recipe_ingredients'];

//get all categories
$catQuery = $db->prepare("SELECT recipe_category FROM public.category");
$catQuery->execute();
$categories = $catQuery->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en-us">

    <head>
        <meta charset="utf-8">
        <title>Cooking Moms | Edit Recipe</title>
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
                            <?php var_dump($recipeTitle); ?>
                            <input type="text" class="form-control" id="recipeTitle" name="recipeTitle" placeholder="<?php echo $recipeTitle; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">Ingredients: </label>
                            <textarea class="form-control" id="ingredients" name="ingredients" placeholder="<?php echo $ingredients; ?>"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">Category: </label><br/>
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
                            <button type="submit" class="btn btn-success">Update Recipe</button>
                        </div>
                    </div>
                </form>

            </div>

        </main>

    </body>

</html>
