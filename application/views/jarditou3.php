<?php
$title ='Jarditou : Accueil';
?>

<?php ob_start(); ?>
  <div class="row">
    <article class="col-md-6">

      <h1>Accueil</h1>
      <hr>
      <h3>L'entreprise</h3>
      <p>Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin et du
          paysagisme.</p>
      <p>Créée il y a 70 ans, notre entreprise vends fleurs, arbustes, matériel à main et motorisés</p>
      <p>Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens, Péronne, Abbeville,
          Corbie.</p>
      <h3>Qualité</h3>
      
      <p>Nous mettons a votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre projet.</p>
      <p>Vous serez séduits par notre expertise, nos compétences et notre sérieux.</p>
      
      <h3>Devis gratuit</h3>

      <p>Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande d'intervention. Vous
          souhaitez un devis? nous vous le réalisons gratuitement</p>
      <hr>
    </article>
    <article class="col-md-6">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?= base_url('assets/img/171.jpeg'); ?>" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="<?= base_url('assets/img/191.jpeg'); ?>" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="<?= base_url('assets/img/201.jpg'); ?>" class="d-block w-100" alt="...">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </article>
  </div>
<?php $content = ob_get_clean(); ?>
  
<?php require('template.php'); ?>
      
