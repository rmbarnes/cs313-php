<?php
session_start();
//connect to DB
require('../php-connect.php');
$db = get_db();

$recipeId = $_POST['id'];
$recipeTitle = htmlspecialchars($_POST['recipeTitle']);
$ingredients = htmlspecialchars($_POST['ingredients']);

$cat = htmlspecialchars($_POST['cat']);

$query = $db->prepare("UPDATE public.recipe
                        SET (recipe_title, recipe_ingredients, recipe_category)
                        = (:recipeTitle, :ingredients, :cat)
                        WHERE id = :recipeId");

$query->bindValue(':recipeId', $recipeId, PDO::PARAM_INT);
$query->bindValue(':recipeTitle', $recipeTitle, PDO::PARAM_STR);
$query->bindValue(':ingredients', $ingredients, PDO::PARAM_STR);
$query->bindValue(':cat', $cat, PDO::PARAM_INT);

try {
    $query->execute();
}
catch
{
    $msg = "Must choose a category";
    header("location: edit-recipe.php?msg=$msg");
}
header('location: user-recipes.php');

?>
