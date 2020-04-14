<?php
$title ='Jarditou : Accueil';
?>

<?php ob_start(); ?>

<?php if (isset($_SESSION))
{ 
    if ($_SESSION["role"] == "admin" || $_SESSION["role"] == "utilisateur")
    {
        echo '<center><h1>You are online as :' . $_SESSION['login'] . '.Welcome Back !!!!</h1></center>';
        echo "<a href=\"./logout.php\">Log Out</a>"; // je rajoute un lien deconnexion pour pouvoir revenir a la page d'accueil et me deconnecter de la sessions
        unset($_SESSION['login']); //pour reinitialiser la session en cours et me reconnecter avec un autre utilisateur
    }
}
else 
{ ?>
    <div class="row mt-2 mb-2">
        <div class="col-md-4 offset-1">
            <?php echo form_open();  ?> 
                <fieldset class=" border p-2">
                    <p class="text-uppercase text-center text-white bg-success"> SIGN UP :</p>
                    <div class="form-group">
                        <label for="use_login">Last name :</label>
                        <input type="text" name="use_nom" class="form-control" placeholder="Last name" value="<?php echo set_value('use_nom'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="use_login">first name :</label>
                        <input type="text" name="use_prenom" class="form-control" placeholder="first name" value="<?php echo set_value('use_prenom'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="use_login">username :</label>
                        <input type="text" name="use_login" class="form-control" placeholder="username" value="<?php echo set_value('use_login'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="use_login">E-mail Address :</label>
                        <input type="email" name="use_email" class="form-control" placeholder="Email Address" value="<?php echo set_value('use_email'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="use_login">Password :</label>
                        <input type="password" name="use_password" class="form-control input-lg" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="use_login">Confirm password :</label>
                        <input type="password" name="use_password2" id="use_password2" class="form-control"
                                placeholder="Password2">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" required>
                        By Clicking register you're agree to our policy & terms
                    </div>
                    <div>
                        <input type="submit" name="submit" class="btn btn-success mt-2 mb-2" value="Register">
                    </div>
                </fieldset>
            </form>
        </div>

        <div class="col-md-4 offset-2">
            <form role="form" method="post" action="login.php">
                <fieldset class=" border p-2">
                    <p class="text-uppercase text-center text-white bg-success"> Login using your account : </p>
                    <div class="form-group">
                        <label for="emaillog">Username :</label>
                        <input type="text" name="emaillog" class="form-control" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label for="passlog">Password :</label>
                        <input type="password" name="passlog" class="form-control"
                                placeholder="Password">
                    </div>
                    <div>
                        <input type="submit" name="submit1" class="btn btn-success" value="Sign In">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
