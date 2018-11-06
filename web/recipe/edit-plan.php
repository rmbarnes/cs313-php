<?php
//start the session
session_start();
$msg = $_GET['msg'];

$planId = $_GET['id'];

//connect to DB
require('../php-connect.php');
$db = get_db();


if (isset($planId))
{
    $query = "SELECT mp.start_date
            , mp.end_date
            , r.recipe_title

            FROM public.meal_plan mp
            INNER JOIN public.meal_plan_recipe mpr ON mp.id = mpr.meal_plan_id
            INNER JOIN public.recipe r ON mpr.recipe_id = r.id
            WHERE mp.id = :planId";
}

$stmt = $db->prepare($query);
$stmt->bindValue(':planId', $planId, PDO::PARAM_INT);
$stmt->execute();
$plan = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($plan);
$recipeTitle = $plan['recipe_title'];
$start = $plan['start_date'];
$end = $plan['end_date'];
var_dump($recipeTitle);

var_dump($start);
var_dump($end);



//get all recipes
$recipeQuery = $db->prepare("SELECT id, recipe_title FROM public.recipe");
$recipeQuery->execute();
$recipes = $recipeQuery->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en-us">

    <head>
        <meta charset="utf-8">
        <title>Cooking Moms | Edit Plan</title>
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
                <form method="POST" action="update-plan.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">Start Date: </label>
                            <input type="text" class="form-control" id="recipeTitle" name="recipeTitle" value="<?php echo $start; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">End Date: </label>
                            <input type="text" class="form-control" id="recipeTitle" name="recipeTitle" value="<?php echo $end; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">Recipes: </label><br/>
                            <?php
                            foreach($recipes as $recipe)
                            {
                                $recipeId = $recipe['id'];
                                echo "<input type='checkbox' name='check' value='$recipeId' required> ";
                                echo $recipe['recipe_title'];
                                echo "<br/>";
                            };
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Update Plan</button>
                            <a href="meal-plans.php" class="btn btn-secondary">Return to Meal Plans</a>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $planId?>">
                </form>

            </div>

        </main>

    </body>

</html>
