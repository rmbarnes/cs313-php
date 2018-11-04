<?php
session_start();

?>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <a class="navbar-brand" href="index.php">Home</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="browse.php">Browse</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user-recipes.php">My Recipes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="meal-plans.php">Meal Plans</a>
            </li>
            <?php
                if(isset($_SESSION['username']))
                {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='logout.php'>Logout</a>
                    </li>";
                }
                else
                {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='login.php'>Login</a>
                    </li>";
                }
            ?>


        </ul>

    </nav>
</header>
