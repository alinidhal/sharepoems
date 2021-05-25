<?php
include __DIR__ . "/header.php"; ?>
<div class="row mt-5">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <form class="form-signin" method="POST" action=" /new">
            <h2 class="form-signin-header" style="color:black;"> Nouveau code source </h2>
            <?php
            if (isset($errorMsg)) {
                echo  "<div class = 'alert alert-warning' role = 'alert'>$errorMsg</div>";
            }
            ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="titlePost">Le titre du post</label>
                    <input type="text" class="form-control" id="titlePost" placeholder="Title (>=2 caractères)" name="title" required="" autofocus="" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="description">Ecrire</label>
                    <input type="text" class="form-control" id="description" placeholder="description (>=2 caractères)" name="description" required="" autofocus="" />
                </div>
            </div>
            <div class="form-row">
                <label for="ImageSongAlbum">Mettez une image du chant</label>
                <input type="file" class="form-control-file" id="ImageSongAlbum" placeholder="Mettez l'image de l'artiste ou de l'album" name="image" autofocus="" />
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div>
<?php
include __DIR__ . "/footer.php";
