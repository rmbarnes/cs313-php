<?php
//start the session
session_start();
$username = htmlspecialchars($_POST["username"]);

//connect to DB
require('../php-connect.php');
$db = get_db();


//go through each movie in the result
if (isset($username))
{
    $query = "SELECT u.display_name, r.recipe_title FROM public.user u INNER JOIN public.recipe r ON u.id = r.user_id WHERE u.username =  '$username'";
}
else {
    $query = 'SELECT * FROM recipe';
}

$stmt = $db->prepare($query);
//$stmt->bindValue(':recipeSearch', $recipeSearch, PDO::PARAM_STR);
$stmt->execute();
$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($recipes)) {
    $_SESSION['username'] = $recipes[0]['display_name'];
}

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
                        Welcome <? echo $recipes[0]['display_name']; "<br>"
                        $_SESSION['username'];
                        ?>!
                    </div>
                </div>
            </div>
            <div class="album py-5">
                <div class="container">
                    <div class="row">
                        <?php
                        foreach ($db->query($query) as $recipe)
                        {
                            $recipeTitle = $recipe['recipe_title'];

                            echo "<div class='col-md-4'>
                            <div class='card mb-4 shadow-sm'>
                                <div class='card-body'>
                                    <p class='card-text recipe-title'>$recipeTitle</p>
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
