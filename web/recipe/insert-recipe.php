<?php
session_start();
//connect to DB
require('../php-connect.php');
$db = get_db();

//echo "var dump: ";
//var_dump($_SESSION['username']);
if(isset($_SESSION['username']))
{
    $userId = $_SESSION['userId'];
//    echo "$ userid ";
//    var_dump($userId);
    $recipeTitle = htmlspecialchars($_POST['recipeTitle']);
    $ingredients = htmlspecialchars($_POST['ingredients']);
    $cat = htmlspecialchars($_POST['cat']);


    $query = $db->prepare("INSERT INTO public.recipe(user_id, recipe_title, recipe_ingredients, recipe_category)
                            VALUES (:userId, :recipeTitle, :ingredients,
                            :cat)");

    $query->bindValue(':userId', $userId, PDO::PARAM_INT);
    $query->bindValue(':recipeTitle', $recipeTitle, PDO::PARAM_STR);
    $query->bindValue(':ingredients', $ingredients, PDO::PARAM_STR);
    $query->bindValue(':cat', $cat, PDO::PARAM_INT);

    $query->execute();

}
header('location: user-recipes.php');
die();

?>
