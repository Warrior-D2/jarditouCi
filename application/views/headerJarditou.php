<header>
  <!-- Logo and Title -->
  <div class="row">
    <!-- LOGO -->
    <div class="col-lg-4 col-md-4 col-sm-6 text-center">
      <a href="jarditou3.php"><img src="<?= base_url('assets/img/jarditou_logo.jpg'); ?>" id="logo"
              alt="Logo du site : Une femme tenant une brouette" title="Logo du site Jarditou"></a>
    </div>
      <?php
        echo "Nous sommes le  ".date("z"). "ème jour de l'année"; // Affiche la date du jour
        echo ". Il est " . date("H:i:s") ; // Affiche l'heure
        echo " "
      ?>
    <!-- Title -->
    <div class="col-lg-8 col-md-8 col-sm-6 text-center">
      <h4 class="display-8">La qualité depuis 70 ans</h4>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark"> <!-- nav bar-->
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <?php 
        if (isset($_SESSION["rank"]))
        { 
          if ($_SESSION["rank"] == 0)
          {?>  <!-- je defini les pages que l'utilisateur peut voir selon son role dans la base de données -->
            <li class="nav-item">
              <a class="nav-link" href="Jarditou3.php" title= "Accueil">Accueil<span class="sr-only">(current)</span></a>
            </li>
          <?php }else if ($_SESSION["rank"] == 1){ ?>    
          <!--si l'utilisateur est admin il ne verra pas la page d'accueil car le else est vide, jepourrais créer une page d'erreur connexion -->
          <?php }  
        } 
        else 
        {?>
          <li class="nav-item">
              <a class="nav-link" href="<?= site_url(); ?>" title= "Accueil">Accueil<span class="sr-only">(current)</span></a>
          </li>
        <?php } ?>

        <?php 
        if (isset($_SESSION["rank"]))
        {
          if ($_SESSION["rank"] == 1)
          {?>
            <li class="nav-item">
                <a class="nav-link" href="tableau.php">Produits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gestion_admin.php">gestion</a>
            </li>
          <?php 
          } 
          else if ($_SESSION["rank"] == 0)
          {?>
            <li class="nav-item">
                <a class="nav-link" href="produits_user.php">Produits</a>
            </li>
          <?php }
        } 
        else
        {?>
          <li class="nav-item">
              <a class="nav-link" href="<?= site_url('produits/liste'); ?>">Produits</a>
          </li>
        <?php } 

        // Condition accès page contact
        if (isset($_SESSION["rank"]))
        {

          if ($_SESSION["rank"] == 0)
          {?>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          <?php } 
        } 
        else 
        { 
          // Ca n'affiche rien
        }?>

        <?php 
        if (isset($_SESSION["rank"]))
        {
          if ($_SESSION["rank"] == 1)
          {?>
            <li class="nav-item">
                <a class="nav-link" href="fiche_produit.php">Admin</a>
            </li>
          <?php } 
        } 
        else 
        { 
          // Ca n'affiche rien
        }?>
        <!-- lien de navigation ajouter produit en attendant de gérer les rôles -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('produits/ajouter'); ?>">Ajouter un produit</a>
        </li>


        <?php 
        if (isset($_SESSION["rank"]))
        {
          if ($_SESSION["rank"] == 0 || $_SESSION["rank"] == 1)
          {?>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('users/deconnexion'); ?>">Deconnexion</a>
            </li>
          <?php } 
          }
          else
          {?>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('users/index'); ?>">Connexion</a>
            </li>
          <?php } ?>

      </ul>
        <span class="navbar-text">
          <!-- si je veux retrer du texte sur la navbar je le rentre ici -->
        </span>
    
      <?php
      if(!empty ($_SESSION['rank'])) {
          echo "<p class='text-light'>Welcome, ".$_SESSION['username']."</p>";
      }?>
      <a href="<?= site_url('panier/afficherPanier');?>"> <i class="fas fa-shopping-cart"></i>Panier</a>
    </div>
  </nav>
  <img src="<?= base_url('assets/img/promotion.jpg'); ?>" class="img-fluid">
  
</header>
