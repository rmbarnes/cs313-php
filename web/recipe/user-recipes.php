<?php
//start the session
session_start();
$username = htmlspecialchars($_POST['username']);

if(isset($username)) {
    $_SESSION['username'] = $username;
}

//connect to DB
require('../php-connect.php');
$db = get_db();


//go through each movie in the result
if (isset($username))
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
}

$stmt = $db->prepare($query);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->execute();
$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

    <!DOCTYPE html>
    <html lang="en-us">

    <head>
        <meta charset="utf-8">
        <title>Cooking Moms | Home</title>
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
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <?
                        if(isset($_SESSION['username']))
                        {
//                            echo "Welcome ".$_SESSION['username']."!";
                            echo "Welcome ".$recipes[0]['display_name']."!";
                        }
                        else
                        {
                            echo "<p><a href='login.php'>Please login</a></p>";
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
                                            <form method='post' action='edit-recipe.php'>
                                                <p class='card-text recipe-title'>$recipeTitle</p>
                                                <p class='card-text'>$ingredients</p>
                                                <p class='card-text'>Category: $category</p>
                                                <p class='card-text'>Contributor: $user</p>
                                                <input type='submit' value='Edit' class='btn btn-success'>
                                                <input type='hidden' name='recipeId' value='".$recipeId."'>

                                            </form>
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
