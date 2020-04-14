<?php session_start(); ?>


<?php
include("headerJarditou.php");
?>
<body xmlns="http://www.w3.org/1999/html">
<?php


if ($_SESSION["role"] == "admin" || $_SESSION["role"] == "utilisateur")
{
    echo '<center><h1>You are online as :' . $_SESSION['login'] . '.Welcome Back !!!!</h1></center>';
    echo "<a href=\"./logout.php\">Log Out</a>"; // je rajoute un lien deconnexion pour pouvoir revenir a la page d'accueil et me deconnecter de la sessions
    unset($_SESSION['login']); //pour reinitialiser la session en cours et me reconnecter avec un autre utilisateur
}
else {
    ?>

    <div class="container-fluid">
        <div class="container">

            <div class="row">
                <div class="col-md-5">
                    <form role="form" method="post" action="login.php">
                        <fieldset>
                            <p class="text-uppercase pull-center"> SIGN UP.</p>

                            <div class="form-group">
                                <input type="text" name="login" class="form-control input-lg" placeholder="username">
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" class="form-control input-lg"
                                       placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input type="password" name="pass" class="form-control input-lg" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password2" id="password2" class="form-control input-lg"
                                       placeholder="Password2">
                            </div>
                            <div class="form-group">
                                <input type="text" name="nom" class="form-control input-lg" placeholder="Last name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="prenom" class="form-control input-lg" placeholder="first name">
                            </div>

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" required>
                                    By Clicking register you're agree to our policy & terms
                                </label>
                            </div>
                            <div>
                                <input type="submit" name="submit" class="btn btn-lg btn-primary mt-2 mb-2"
                                       value="Register">
                            </div>
                        </fieldset>
                    </form>
                </div>

                <div class="col-md-2">
                    <!-------null------>
                </div>

                <div class="col-md-5">
                    <form role="form" method="post" action="login.php">
                        <fieldset>
                            <p class="text-uppercase"> Login using your account: </p>

                            <div class="form-group">
                                <input type="text" name="emaillog" class="form-control input-lg" placeholder="username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="passlog" class="form-control input-lg"
                                       placeholder="Password">
                            </div>
                            <div>
                                <input type="submit" name="submit1" class="btn btn-md" value="Sign In">
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <?php
}
?>
</body>

<?php

include("footer.php");
?>
