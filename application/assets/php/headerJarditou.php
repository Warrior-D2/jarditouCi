<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
           <title>JARDITOU, la qualité depuis 70 ans.</title>
</head>

<body>
  <div class = "container-fluid">  <!-- class pour prendre l'intégralité de la page-->
    <div class="container"> <!-- class qui mdifie la page pour en avoir 960px -->
      <header>
        <!-- Logo and Title -->
        <div class="row">
            <!-- LOGO -->
            <div class="col-lg-4 col-md-4 col-sm-6 text-center">
                <a href="jarditou3.php"><img src="assets/img/jarditou_logo.jpg" id="logo"
                        alt="Logo du site : Une femme tenant une brouette" title="Logo du site Jarditou"></a>
            </div>
            <?php
            date_default_timezone_set("Europe/Paris");
    echo "Nous sommes le  ".date("z"). "ème jour de l'année"; // Affiche la date du jour
    echo ". Il est " . date("H:i:s") ; // Affiche l'heure
    echo " "
  //   $curdate =new DateTime("H:i:s");
  //   $deb = new DateTime("10:00:00");
  //   $fin = new DateTime("20:00:00");
  //   //$curdate=new DateTime("9999-01-02");
  //   if($curdate=>$deb){
  //
  //   echo 'le magasin ferme a 20h';
  //                     }
  //  else($curdate=>$fin){
  //
  // echo'le magasin ouvre a 10h'
  //
  // }
            ?>
            <!-- Title -->
            <div class="col-lg-8 col-md-8 col-sm-6 text-center">
              <h4 class="display-8">La qualité depuis 70 ans</h4>
    </div>
        </div>
    </header>
          <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark"> <!-- nav bar-->
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav mr-auto">
                  <?php if ($_SESSION["role"] == "utilisateur" && $_SESSION['verif'] == 1){?>  <!-- je defini les pages que l'utilisateur peut voir selon son role dans la base de données -->
                <li class="nav-item active">
                  <a class="nav-link" href="Jarditou3.php" title= "Accueil">Accueil<span class="sr-only">(current)</span></a>
                </li>
                  <?php }else if ($_SESSION["role"] == "admin"){ ?>    <!--si l'utilisateur est admin il ne verra pas la page d'accueil car le else est vide, jepourrais créer une page d'erreur connexion -->

                  <?php } else {?>
                  <li class="nav-item active">
                      <a class="nav-link" href="Jarditou3.php" title= "Accueil">Accueil<span class="sr-only">(current)</span></a>
                  </li>
                  <?php } ?>

                  <?php if ($_SESSION["role"] == "admin"){?>
                      <li class="nav-item">
                          <a class="nav-link" href="tableau.php">Produits</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="gestion_admin.php">gestion</a>
                      </li>
                  <?php }else if ($_SESSION["role"] == "utilisateur"){?>
                      <li class="nav-item">
                          <a class="nav-link" href="produits_user.php">Produits</a>
                      </li>
                  <?php } else {?>
                  <li class="nav-item">
                      <a class="nav-link" href="erreur_connexion.php">Produits</a>
                  </li>
                  <?php } ?>

                  <?php if ($_SESSION["role"] == "utilisateur"){?>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact</a>
                </li>
                  <?php } else { }?>

                  <?php if ($_SESSION["role"] == "admin"){?>
                <li class="nav-item">
                      <a class="nav-link" href="fiche_produit.php">Admin</a>
                  </li>
                  <?php } else { }?>
                  <?php if ($_SESSION["role"] == "utilisateur" || $_SESSION["role"] == "admin")
                      {?>
                          <li class="nav-item">
                            <a class="nav-link" href="logout.php">Deconnexion</a>
                           </li>
                      <?php }else
                      {?>
                          <li class="nav-item">
                            <a class="nav-link" href="inscription.php">Connexion</a>
                           </li>
                        <?php } ?>


              </ul>
              <span class="navbar-text">
                <!-- si je veux retrer du texte sur la navbar je le rentre ici -->
              </span>
            </div>
              <?php

              if(!empty ($_SESSION['login'])) {
                  echo "<p class= text-light>Welcome, ".$_SESSION['login']."</p>";
              }?>
          </nav>
          <img src="assets/img/promotion.jpg" class="img-fluid">
