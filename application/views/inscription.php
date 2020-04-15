<?php
$title ='Jarditou : Accueil';
?>

<?php ob_start(); ?>

<?php if (isset($_SESSION["rank"]))
{ 
    if ($_SESSION["rank"] == 1 || $_SESSION["rank"] == 0)
    {
        echo '<center><h1>You are online as :' . $_SESSION['username'] . '.Welcome Back !!!!</h1></center>';
        echo "<a href=\"./logout.php\">Log Out</a>"; // je rajoute un lien deconnexion pour pouvoir revenir a la page d'accueil et me deconnecter de la sessions
        unset($_SESSION['username']); //pour reinitialiser la session en cours et me reconnecter avec un autre utilisateur
    }
}
else 
{ ?>
    <div class="row mt-2 mb-2">
        <div class="col-md-4 offset-1">
            <?php echo form_open();  ?>  
                <fieldset class=" border shadow p-3 bg-white rounded">
                    <p class="text-uppercase text-center text-white bg-success"> SIGN UP :</p>
                    <div class="form-group">
                        <label for="use_lastname">Last name :</label>
                        <input type="text" name="use_lastname" class="form-control" placeholder="Last name" value="<?php echo set_value('use_lastname'); ?>">
                        <?php echo form_error('use_lastname'); ?>
                    </div>
                    <div class="form-group">
                        <label for="use_firstname">first name :</label>
                        <input type="text" name="use_firstname" class="form-control" placeholder="first name" value="<?php echo set_value('use_firstname'); ?>">
                        <?php echo form_error('use_firstname'); ?>
                    </div>
                    <div class="form-group">
                        <label for="use_username">username :</label>
                        <input type="text" name="use_username" class="form-control" placeholder="username" value="<?php echo set_value('use_username'); ?>">
                        <?php echo form_error('use_username'); ?>
                    </div>
                    <div class="form-group">
                        <label for="use_email">E-mail Address :</label>
                        <input type="email" name="use_email" class="form-control" placeholder="Email Address" value="<?php echo set_value('use_email'); ?>">
                        <?php echo form_error('use_email'); ?>
                    </div>
                    <div class="form-group">
                        <label for="use_password">Password :</label>
                        <input type="password" name="use_password" class="form-control input-lg" placeholder="Password" value="<?php echo set_value('use_password'); ?>">
                        <?php echo form_error('use_password'); ?>
                    </div>
                    <div class="form-group">
                        <label for="use_password2">Confirm password :</label>
                        <input type="password" name="use_password2" id="use_password2" class="form-control" placeholder="Password2" value="<?php echo set_value('use_password2'); ?>">
                        <?php echo form_error('use_password2'); ?>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" required>
                        By Clicking register you're agree to our policy & terms
                    </div>
                    <div>
                        <input type="submit" class="btn btn-success mt-2 mb-2" formaction="<?= site_url('Users/inscription'); ?>">
                    </div>
                </fieldset>
            </form>
        </div>

        <div class="col-md-4 offset-2">
            <?php echo form_open();  ?>  
                <fieldset class=" border shadow p-3 bg-white rounded">
                    <p class="text-uppercase text-center text-white bg-success"> Login using your account : </p>
                    <div class="form-group">
                        <label for="emaillog">Username :</label>
                        <input type="text" name="emaillog" class="form-control" placeholder="username">
                        <?php echo form_error('emaillog'); ?>
                    </div>
                    <div class="form-group">
                        <label for="passlog">Password :</label>
                        <input type="password" name="passlog" class="form-control"
                                placeholder="Password">
                        <?php echo form_error('passlog'); ?>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-success" formaction="<?= site_url('Users/connexion'); ?>" value="Sign In">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
