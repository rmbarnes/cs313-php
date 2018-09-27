<?php $file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);?>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">Cookie Family</a>
        <div class="navbar-collapse collapse" id="navbarCollapse" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if ($file === 'home') echo 'active'?>">
                    <a class="nav-link" href="/teamActivity/home.php" data-toggle="tab">Home</a>
                </li>
                <li class="nav-item <?php if ($file === 'about') echo 'active'?>">
                    <a class="nav-link" href="/teamActivity/about.php" data-toggle="tab">About Us</a>
                </li>
                <li class="nav-item <?php if ($file === 'login') echo 'active'?>">
                    <a class="nav-link" href="/teamActivity/login.php" data-toggle="tab">Login</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
