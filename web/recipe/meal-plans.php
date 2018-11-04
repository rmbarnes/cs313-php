<?php
session_start();
//connect to DB
require('../php-connect.php');
$db = get_db();

if (isset($_SESSION['userId']))
{
    $query = "SELECT
              meal_plan.id                AS meal_plan_id,
              meal_plan_user.id           AS meal_plan_user_id,
              meal_plan_user.display_name AS meal_plan_user_display_name,
              jsonb_agg(
                  jsonb_build_object(
                      'recipe_id',                recipe.id,
                      'recipe_user_id',           recipe_user.id,
                      'recipe_user_display_name', recipe_user.display_name,
                      'recipe_title',             recipe.recipe_title
                  )
              ) AS recipes
            FROM meal_plan
            INNER JOIN meal_plan_recipe
              ON meal_plan.id = meal_plan_recipe.meal_plan_id
            INNER JOIN public.user AS meal_plan_user
              ON meal_plan.user_id = meal_plan_user.id
            INNER JOIN recipe
              ON meal_plan_recipe.recipe_id = recipe.id
            INNER JOIN public.user AS recipe_user
              ON recipe.user_id = recipe_user.id
            INNER JOIN category
              ON recipe.recipe_category = category.id
              WHERE meal_plan_user.id = :userId
            GROUP BY
              meal_plan.id,
              meal_plan_user.id,
              meal_plan_user.display_name;";
}
else {
    header('location: login.php');
}

$stmt = $db->prepare($query);
$stmt->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
$stmt->execute();
$mealPlan = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($mealPlan);




// Select all meal plans
$planQuery = 'SELECT m.start_date, m.end_date, m.id FROM meal_plan m
    INNER JOIN meal_plan_recipe mr ON m.id = mr.meal_plan_id
    WHERE m.user_id = :userId';

// Select all recipes from each meal plan







?>

<!DOCTYPE html>
<html lang="en-us">

    <head>
        <meta charset="utf-8">
        <title>Cooking Moms | Meal Plans</title>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.1.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <?php require('recipe-header.php') ;?>
        <main role="main">

            <div class="bg">
                <h1 class="display-4 font-italic banner-text">Plan Your Week</h1>
                <p class="lead my-3 banner-text">Get ahead</p>
            </div>

            <div class="album py-5">
                <div class="container">
                    <div class="row">
                        <?php
                        foreach ($mealPlan as $plan)
                        {
                            $start = date('M d', strtotime($plan['start_date']));
                            $end = date('M d', strtotime($plan['end_date']));
                            $recipe = $plan['recipe_title'];

                            echo "<div class='col-md-4'>
                            <div class='card mb-4 shadow-sm'>
                                <div class='card-body'>
                                    <p class='card-text recipe-title'>$start - $end</p>
                                    <p class='card-text'>$recipe</p>
                                </div>
                            </div>
                        </div>";
                        };
                        ?>
                    </div>
                </div>
            </div>
        </main>

    </body>

</html>
