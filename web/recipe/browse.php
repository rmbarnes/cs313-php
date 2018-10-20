<?php
//connect to DB
require('../php-connect.php');
$db = get_db();


//go through each movie in the result
if (isset($_POST['recipeSearch']))
{
    $recipeSearch = $_POST['recipeSearch'];

    $query = "SELECT r.recipe_title, r.recipe_ingredients, c.recipe_category, u.display_name FROM recipe r INNER JOIN public.user u ON r.user_id = u.id INNER JOIN public.category c ON r.recipe_category = c.id WHERE recipe_title LIKE '%$recipeSearch%'";
}
else {
    $query = 'SELECT * FROM recipe';
}

////query for all movies
//$stmt = $db->prepare($query);
////$stmt->bindValue(':recipe_title', $recipeTitle, PDO::PARAM_STR);
//$stmt->execute();
//$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                <h1 class="display-4 font-italic banner-text">Need some inspiration?</h1>
                <p class="lead my-3 banner-text">We're here to help.</p>
            </div>

            <form method="POST" action="browse.php">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for..." name="recipeSearch">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="submit">Search</button>
                        </span>
                    </div>
                </div>
            </form>
            <div class="album py-5">
                <div class="container">
                    <div class="row">
            <?php
                foreach ($db->query($query) as $recipe)
                {
                    $recipeTitle = $recipe['recipe_title'];
                    $category = $recipe['category'];
                    echo "<div class='col-md-4'>
                            <div class='card mb-4 shadow-sm'>
                                <div class='card-body d-flex justify-content-between'>
                                    <p class='card-text'>$recipeTitle</p>
                                    <p class='card-text'>$category</p>

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
