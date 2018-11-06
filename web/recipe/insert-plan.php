<?php
session_start();
//connect to DB
require('../php-connect.php');
$db = get_db();

if(isset($_SESSION['username']))
{
    $userId = $_SESSION['userId'];

    $start = htmlspecialchars($_POST['start']);
    $end = htmlspecialchars($_POST['end']);
    $recipes = $_POST['check'];


    $query = $db->prepare("INSERT INTO public.meal_plan(user_id, start_date, end_date)
                            VALUES (:userId, :start, :end)");

    $query->bindValue(':userId', $userId, PDO::PARAM_INT);
    $query->bindValue(':start', $start, PDO::PARAM_STR);
    $query->bindValue(':end', $end, PDO::PARAM_STR);

    $query->execute();

    $planId = $db->lastInsertId("meal_plan_id_seq");

    foreach ($recipes as $recipeId)
    {
        $secondQuery = $db->prepare("INSERT INTO public.meal_plan_recipe(meal_plan_id, recipe_id)
                                VALUES (:mealPlanId, :recipeId)");

        $secondQuery->bindValue(':mealPlanId', $planId, PDO::PARAM_INT);
        $secondQuery->bindValue(':recipeId', $recipeId, PDO::PARAM_INT);

        $secondQuery->execute();
    }

}
header('location: meal-plans.php');
die();

?>
