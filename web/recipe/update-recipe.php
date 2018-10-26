<?php
session_start();
//connect to DB
require('../php-connect.php');
$db = get_db();

$recipeId = $_POST['id'];
$recipeTitle = $_POST['recipeTitle'];
$ingredients = $_POST['ingredients'];
$cat = $_POST['cat'];


$query = $db->prepare("UPDATE public.recipe
                        SET (recipe_title, recipe_ingredients, recipe_category)
                        = (:recipeTitle, :ingredients, :cat)
                        WHERE id = :recipeId");

$query->bindValue(':recipeId', $recipeId, PDO::PARAM_INT);
$query->bindValue(':recipeTitle', $recipeTitle, PDO::PARAM_INT);
$query->bindValue(':ingredients', $ingredients, PDO::PARAM_INT);
$query->bindValue(':cat', $cat, PDO::PARAM_INT);

$query->execute();

header('location: user-recipes.php');

?>
