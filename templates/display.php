{% include '/header.php' %}
<main class="container">
    <?php
    if (isset($_SESSION["user"])) {
    ?>

        <a href="/new" class="btn btn-outline-info my-2 my-sm-0" role="button" type="submit" aria-pressed="true">Ajouter un article</a>
    <?php
    } ?>
    <div>
        <div class="row">
            <div class="col-md-8">
                <?php
                foreach ($items as $OnePost) {

                ?>
                    <div class="card mb-5">
                        <div class="card-body">
                            <h3 class="h5 "><?= $OnePost->title ?></h3>
                            <p class="card-text"><?= $OnePost->description ?></p>
                            <p><?= $OnePost->datetime ?></p>
                        </div>
                        <img src=<?= $OnePost->url_img ?> class="card-img-top" alt="...">
                    </div>
                <?php
                }
                ?>

            </div>
            <div class="col-md-4 d-none d-md-block border-left">
                <h2 class="h4">Profil d'utilisateur</h2>
                <?php
                foreach ($items as $OnePost) {

                ?>
                    <div class="card mt-2">
                        <div class="card-body">
                            <h3 class="h6 "><?= $OnePost->title ?></h3>
                            <p class="card-text"><?= $OnePost->description ?></p>
                            <p><?= $OnePost->datetime ?></p>
                        </div>
                        <img src=<?= $OnePost->url_img ?> class="card-img-top" alt="...">
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
    </div>
</main>
{% include '/footer.php' %}