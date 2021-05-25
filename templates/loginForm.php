<?php
include __DIR__ . "/header.php";
?>

<div class="row container-fluid " style="height: 56rem;">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto align-item-center my-5">
        <form class="form-signin" method="POST" action="?action=login">
            <h2 class="form-signin-heading mt-5 h4" style="color:black">Connectez avec vos amis et pouvoir lire et partager des poèmes</h2>
            <?php
            if (isset($errorMsg)) {
                echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
            }
            ?>
            <input type="text" class="form-control " name="username" placeholder="Nickname" required="" autofocus="" />
            <input type="password" class="form-control my-3" name="password" placeholder="Password" required="" />
            <ul class="list-inline">
                <li class="list-inline-item"><button class="btn btn-lg btn-outline-info btn-block" type="submit">Connexion</button></li>
                <li class="list-inline-item"><a href="?action=register" class="btn btn-info my-2 my-sm-0" role="button" type="submit" aria-pressed="true">Inscrivez-vous</a></li>
            </ul>
        </form>
    </div>
</div>
<?php
include __DIR__ . "/footer.php";
?>