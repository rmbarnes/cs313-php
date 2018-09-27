<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">Cookie Family</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarCollapse" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if ($file === 'home') echo 'active'?>">
                    <a class="nav-link" href="/teamActivity/home.php" data-toggle="tab">Home</a>
                </li>
                <li class="nav-item <?php if ($file === 'about-us') echo 'active'?>">
                    <a class="nav-link" href="/teamActivity/about-us.php" data-toggle="tab">About Us</a>
                </li>
                <li class="nav-item <?php if ($file === 'login') echo 'active'?>">
                    <a class="nav-link" href="/teamActivity/login.php" data-toggle="tab">Login</a>
                </li>
            </ul>
        </div>
    </nav>
</header>