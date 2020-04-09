<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$title ='Liste des produits';
?>

<?php ob_start(); ?>
    <a class="btn btn-secondary mb-1 mt-1" href="<?= site_url('produits/ajouter'); ?>" role="button">Ajouter un produit</a>
        <div class="row">
            <?php foreach ($liste_produits as $row) { ?>
                <div class="col-3 mb-2">
                    <div class="card products">
                        <a href="detail.php?pro_id=<?= $row->pro_id ?>" title="<?= $row->pro_libelle ?>">
                            <img class="card-img-top img-fluid rounded mx-auto d-block p-1" src="<?= base_url("assets/images/".$row->pro_id.".".$row->pro_photo); ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><a href="detail.php?pro_id=<?= $row->pro_id ?>" title="<?= $row->pro_libelle ?>"><?= $row->pro_libelle ?></a></h5>
                            <p class="card-text text-truncate" title="<?= $row->pro_description ?>" alt="<?= $row->pro_description ?>"> 
                                <?= $row->pro_description ?>
                            </p>
                        </div>
                        <div class="card-footer text-right">
                            <large><?= $row->pro_prix." €<br>" ?></large>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
	
