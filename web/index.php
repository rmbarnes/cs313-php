<!DOCTYPE HTML>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>Hello World</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.1.3/dist/css/bootstrap.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap-4.1.3/site/docs/4.1/examples/carousel/carousel.css" />
</head>

<body>
    <?php include 'header.php'; ?>
    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Welcome!</h1>
                <p class="lead text-muted">You've landed upon my new homepage! How fortunate.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Placeholder button</a>
                </p>
            </div>
        </section>
        <div class="album py-5">
            <div class="container">

                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="images/IMG_1306.JPG" data-holder-rendered="true">
                            <div class="card-body">
                                <p class="card-text">This is from a stop in Venice.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" alt="Thumbnail [100%x225]" src="images/IMG_1034.JPG" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                            <div class="card-body">
                                <p class="card-text">The great duomo of Florence</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" alt="Thumbnail [100%x225]" src="images/IMG_0565.JPG" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                            <div class="card-body">
                                <p class="card-text">Ancient Rome</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="text-muted bg-light">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>&copy; RBarnes <?php echo date("Y"); ?></p>

        </div>
    </footer>
</body>

</html>
<!--
<?php

  phpinfo();

?>
-->
