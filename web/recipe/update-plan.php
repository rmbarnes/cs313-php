<?php
session_start();
//connect to DB
require('../php-connect.php');
$db = get_db();

$planId = $_POST['id'];
$start = htmlspecialchars($_POST['start']);
$end = htmlspecialchars($_POST['end']);

$recipes = $_POST['check'];

$query = $db->prepare("UPDATE public.meal_plan
                        SET (start_date, end_date)
                        = (:start, :end)
                        WHERE id = :planId");

$query->bindValue(':start', $start, PDO::PARAM_STR);
$query->bindValue(':end', $end, PDO::PARAM_STR);
$query->bindValue(':planId', $planId, PDO::PARAM_INT);

$query->execute();

$mealPlanId = $db->lastInsertId("meal_plan_id_seq");

foreach ($recipes as $recipeId)
{
    $anotherQuery = $db->prepare('INSERT INTO meal_plan_recipe(meal_plan_id, recipe_id) VALUES
(:mealPlanId, :recipeId)');

    $anotherQuery->bindValue(":mealPlanId", $mealPlanId);
    $anotherQuery->bindValue(":recipeId", $recipeId);
    $anotherQuery->execute();
}


header('location: meal-plans.php');
die();

?>
