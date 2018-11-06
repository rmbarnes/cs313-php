<?php
session_start();
//connect to DB
require('../php-connect.php');
$db = get_db();

$planId = $_GET['id'];

//delete first from the meal_plan_recipe table
$firstQuery = $db->prepare("DELETE FROM public.meal_plan_recipe
                            WHERE meal_plan_id = :planId");
$firstQuery->bindValue(':planId', $planId, PDO::PARAM_INT);
$firstQuery->execute();

//then delete from the meal_plan table
$secondQuery = $db->prepare("DELETE FROM public.meal_plan
                            WHERE id = :planId");

$secondQuery->bindValue(':planId', $planId, PDO::PARAM_INT);
$secondQuery->execute();

header('location: meal-plans.php');
die();

?>
