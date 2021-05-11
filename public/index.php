<?php

use Entity\Post;
use Entity\User;

require '../vendor/autoload.php';

$user1 = new User();
$user1->id = 1;
$user1->nickname = "user1";
$user1->paswd = "pswd1";

$post1 = new Post();
$post1->user_id = 1;
$post1->title = "Tutu";
$post1->datetime = "12/12/2021";
$post1->description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos beatae magni nulla tempora, eum nesciunt sequi quod saepe earum atque optio. Dignissimos iure nemo perspiciatis est aut. Libero, blanditiis ipsa! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae, amet eum dolorum, obcaecati illum temporibus perferendis a atque sed dolorem facilis non officiis numquam eaque quas vel. Quia, corporis nobis! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis a ipsam illum accusamus molestias quasi suscipit facilis impedit non, in ex maiores obcaecati, officia illo, soluta nam! Incidunt, laudantium consequatur.";
$post1->url_img = "https://images.pexels.com/photos/2179483/pexels-photo-2179483.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940";
$post1->user = $user1;

$post2 = new Post();
$post2->user_id = 2;
$post2->title = "Toto";
$post2->datetime = "13/12/2021";
$post2->description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos beatae magni nulla tempora, eum nesciunt sequi quod saepe earum atque optio. Dignissimos iure nemo perspiciatis est aut. Libero, blanditiis ipsa! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae, amet eum dolorum, obcaecati illum temporibus perferendis a atque sed dolorem facilis non officiis numquam eaque quas vel. Quia, corporis nobis! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis a ipsam illum accusamus molestias quasi suscipit facilis impedit non, in ex maiores obcaecati, officia illo, soluta nam! Incidunt, laudantium consequatur.";
$post2->url_img = "https://images.pexels.com/photos/5878801/pexels-photo-5878801.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940";
$post2->user = $user1;

$items = array($post1, $post2);
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
    <nav class="navbar navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand text-light">MyArt</a>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

    </nav>
    <main class="container">
        <div>
            <div class="row">
                <div class="col-8">

                    <?php {
                    ?>
                        <div class="card mb-5">
                            <div class="card-body">
                                <h3 class="h5 font-weight-bolder"><?= $post1->title ?></h3>
                                <p class="card-text"><?= $post1->description ?></p>
                                <p><?= $post1->datetime ?></p>
                            </div>
                            <img src=<?= $post1->url_img ?> class="card-img-top" alt="...">
                        </div>
                        <div class="card mb-5">
                            <div class="card-body">
                                <h3 class="h5 font-weight-bolder"><?= $post2->title ?></h3>
                                <p class="card-text"><?= $post2->description ?></p>
                                <p><?= $post2->datetime ?></p>
                            </div>
                            <img src=<?= $post2->url_img ?> class="card-img-top" alt="...">
                        </div>
                    <?php
                    }
                    ?>

                </div>
                <div class="col-4 border-left">
                    <p>Profil d'utilsateur</p>
                    <div class="card mt-3">
                        <img src="https://cdn.pixabay.com/photo/2017/08/30/12/45/girl-2696947_960_720.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">#Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <img src="https://cdn.pixabay.com/photo/2017/07/03/20/17/abstract-2468874__340.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <img src="https://cdn.pixabay.com/photo/2018/02/06/22/43/painting-3135875__340.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <img src="https://cdn.pixabay.com/photo/2017/10/31/07/49/horses-2904536__340.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <img src="https://cdn.pixabay.com/photo/2017/05/25/09/22/flower-2342706__340.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
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