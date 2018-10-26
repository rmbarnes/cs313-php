<?php
session_start();
//connect to DB
require('../php-connect.php');
$db = get_db();

$recipeId = $_GET['id'];



$query = $db->prepare("DELETE FROM public.recipe
                        WHERE id = :recipeId");

$query->bindValue(':recipeId', $recipeId, PDO::PARAM_INT);

$query->execute();

header('location: user-recipes.php');

?>
