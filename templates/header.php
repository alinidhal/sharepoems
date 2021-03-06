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
            <a class="navbar-brand text-info" href="/">MyArt</a>
            <button class="navbar-toggler bg-info" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inline ml-auto my-2 my-lg-0" action="/">
                    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search" value="search" name="search">
                </form>
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <a href="/logout" class="btn btn-outline-info my-2 my-sm-0" role="button" type="submit" aria-pressed="true">Déconnexion</a>
                <?php
                } else {
                ?>
                    <a href="/login" class="btn btn-outline-info my-2 my-sm-0" role="button" type="submit" aria-pressed="true">Connexion</a>
                    <a href="/register" class="btn btn-outline-info my-2 my-sm-0 ml-2" role="button" type="submit" aria-pressed="true">Inscrivez-vous</a>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>