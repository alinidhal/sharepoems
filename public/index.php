<?php

use Entity\Post;
use Entity\User;
use ludk\Persistence\ORM;

require __DIR__ . '/../vendor/autoload.php';
session_start();
$orm = new ORM(__DIR__ . '/../Resources');
$postRepo = $orm->getRepository(Post::class);
$posts = $postRepo->findAll();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/477b4091bc.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>MyArt</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand text-light" href="/">MyArt</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inline ml-auto my-2 my-lg-0" action="/">
                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Recherche" aria-label="Search">
                </form>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Connexion</button>
                <button class="btn btn-success my-2 my-sm-0 ml-2" type="submit">S'inscrire</button>
            </div>
        </div>
    </nav>
    <main class="container">
        <div>
            <div class="row">
                <div class="col-8">

                    <?php
                    foreach ($posts as $post1) {

                    ?>
                        <div class="card mb-5">
                            <div class="card-body">
                                <h3 class="h4 font-weight-bolder"><?= $post1->nickname ?></h3>
                                <h3 class="h5 "><?= $post1->title ?></h3>
                                <p class="card-text"><?= $post1->description ?></p>
                                <p><?= $post1->datetime ?></p>
                            </div>
                            <img src=<?= $post1->url_img ?> class="card-img-top" alt="...">
                        </div>
                    <?php
                    }
                    ?>

                </div>
                <div class="col-4 border-left">
                    <h2 class="h4">Profil d'utilisateur</h2>
                    <?php
                    foreach ($posts as $post1) {

                    ?>
                        <div class="card mt-2">
                            <div class="card-body">
                                <h3 class="h5 font-weight-bolder"><?= $post1->nickname ?></h3>
                                <h3 class="h6 "><?= $post1->title ?></h3>
                                <p class="card-text"><?= $post1->description ?></p>
                                <p><?= $post1->datetime ?></p>
                            </div>
                            <img src=<?= $post1->url_img ?> class="card-img-top" alt="...">
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
        </div>
    </main>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</html>