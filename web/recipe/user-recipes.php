<?php
//start the session
session_start();

//connect to DB
require('../php-connect.php');
$db = get_db();




if(isset($_POST['username']))
{
    $username = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['pass']);

    $query = $db->prepare("SELECT id, username, password
                            FROM public.user
                            WHERE username = :username");
    $query->bindValue(":username", $username, PDO::PARAM_STR);
    $query->execute();
    $userInfo = $query->fetch(PDO::FETCH_ASSOC);

    if (!password_verify($pass, $userInfo['password']))
    {
        header('location: login.php');
    }
    $_SESSION['username'] = $username;
    $_SESSION['userId'] = $userInfo['id'];
    var_dump($_SESSION['userId']);
}



if (isset($_SESSION['username']))
{
    $query = "SELECT u.display_name,
                    r.id,
                    r.recipe_title,
                    r.recipe_ingredients,
                    c.recipe_category
            FROM public.user u
            INNER JOIN public.recipe r ON u.id = r.user_id
            INNER JOIN public.category c ON r.recipe_category = c.id
            WHERE u.username = :username";

    $stmt = $db->prepare($query);
    $stmt->bindValue(':username', $_SESSION['username'], PDO::PARAM_STR);
    $stmt->execute();
    $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>

    <!DOCTYPE html>
    <html lang="en-us">

    <head>
        <meta charset="utf-8">
        <title>Cooking Moms | Your Recipes</title>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.1.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <?php require('recipe-header.php') ;?>
        <main role="main">

            <div class="bg">
                <h1 class="display-4 font-italic banner-text">Check out your <br>cool recipes!</h1>
                <p class="lead my-3 banner-text">Yum, yum, yum.</p>
            </div>
            <div class="container text-center">
                <div class="row">
                    <div class="col-sm d-flex justify-content-between">
                        <?php
                        if(isset($_SESSION['username']))
                        {
//                            echo "Welcome ".$_SESSION['username']."!";
                            echo "Welcome ".$recipes[0]['display_name']."!";
                            echo "\n<a class='btn btn-success' href='add-recipe.php'>Add Recipe</a>";
                        }
                        else
                        {
                            echo "<a class='btn btn-success' href='login.php'>Please login</a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="album py-5">
                <div class="container">
                    <div class="row">
                        <?php
                        foreach ($recipes as $recipe)
                        {
                            $recipeTitle = $recipe['recipe_title'];
                            $ingredients = $recipe['recipe_ingredients'];
                            $category = $recipe['recipe_category'];
                            $user = $recipe['display_name'];
                            $recipeId = $recipe['id'];
                            var_dump($recipeId);
                            echo "<div class='col-md-4'>
                                    <div class='card mb-4 shadow-sm'>
                                        <div class='card-body'>
                                            <form method='get' action='edit-recipe.php'>
                                                <p class='card-text recipe-title'>$recipeTitle</p>
                                                <p class='card-text'>$ingredients</p>
                                                <p class='card-text'>Category: $category</p>
                                                <p class='card-text'>Contributor: $user</p>
                                                <input type='submit' value='Edit' class='btn btn-success'>
                                                <input type='hidden' name='recipeId' value=$recipeId>
                                            </form>
                                            <a href='delete-recipe.php?id=$recipeId' value='Delete' class='btn btn-danger'>Delete</a>
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
