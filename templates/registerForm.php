<?php
include __DIR__ . "/header.php";
?>
<div class="row container-fluid" style="height: 56rem;">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <form class="form-signin" method="POST" action="?action=register">
            <h2 class="form-signin-heading mt-5">Inscrivez-vous !</h2>
            <?php
            if (isset($errorMsg)) {
                echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
            }
            ?>
            <input type="text" class="form-control mb-3" name="username" placeholder="Nickname (4 characters)" required="" autofocus="" />
            <input type="password" class="form-control mb-3" name="password" placeholder="Password (8 characters)" required="" />
            <label>Retype password:</label>
            <input type="password" class="form-control mb-3" name="passwordRetype" placeholder="Password" required="" />

            <ul class="list-inline">
                <li class="list-inline-item"><button class="btn btn-lg btn-info btn-block" type="submit">Inscrivez-vous</button></li>
                <li class="list-inline-item"><a href="?action=login" class="btn btn-outline-info my-2 my-sm-0" role="button" type="submit" aria-pressed="true">Connexion</a></li>
            </ul>
        </form>
    </div>
</div>
<?php
include __DIR__ . "/footer.php";
?>