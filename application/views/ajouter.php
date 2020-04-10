<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$title ='Formulaire d\'ajout';
?>
<?php ob_start(); ?>

<a href="<?= site_url(); ?>"><i class="far fa-arrow-alt-circle-left fa-2x"></i>Retour vers les produits</a>
<h2 class="text-center mt-3">Formulaire d'ajout de produit : </h2>

<!-- Form -->
    <?php echo form_open(); ?> 
    <!-- <form action="http://localhost/ci/index.php/produits/ajouter" method="post">
    la même méthode sera utilisée pour afficher et traiter le formulaire 
    elle initialise aussi des mécanismes de sécurité contre les failles XSS et CSRF -->
        <div class="form-group row mt-2">
            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label">Catégorie du produit : </label>
            <div class="col-lg-3 col-md-4">
                <select class="form-control" name="pro_cat_id" id="pro_cat_id" value="<?php echo set_value('pro_cat_id'); ?>">
                    <option value="" selected>Sélectionnez la catégorie</option>
                    <?php foreach ($categories as $row) { ?>
                        <option value="<?=$row->cat_id?>" <?php echo  set_select('pro_cat_id', $row->cat_id);?>><?=$row->cat_id." - ".$row->cat_nom?></option> 
                    <?php } ?>
                </select>
                <?php echo form_error('pro_cat_id'); ?>
            </div>
            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Référence produit : *</label>
            <div class="col-lg-3 col-md-4">
                <input type="text" class="form-control" name="pro_ref" id="pro_ref" value="<?php echo set_value('pro_ref'); ?>">
                <?php echo form_error('pro_ref'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Nom du produit : *</label>
            <div class="col-lg-3 col-md-4">
                <input type="text" class="form-control" name="pro_libelle" id="pro_libelle" value="<?php echo set_value('pro_libelle'); ?>">
                <?php echo form_error('pro_libelle'); ?>

            </div>

            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Description du produit : *</label>
            <div class="col-lg-3 col-md-4">
                <textarea class="form-control" name="pro_description" id="pro_description" rows="4"><?php echo set_value('pro_description'); ?></textarea>
                <?php echo form_error('pro_description'); ?>

            </div>
        </div>

        <div class="form-group row">
            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Prix : *</label>
            <div class="col-lg-3 col-md-4">
                <input type="text" class="form-control" name="pro_prix" id="pro_prix" value="<?php echo set_value('pro_prix'); ?>">
                <?php echo form_error('pro_prix'); ?>

            </div>

            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Nombre d'unité en stock : *</label>
            <div class="col-lg-3 col-md-4">
                <input type="text" class="form-control" name="pro_stock" id="pro_stock" value="<?php echo set_value('pro_stock'); ?>">
                <?php echo form_error('pro_stock'); ?>

            </div>
        </div>

        <div class="form-group row">
            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Couleur : *</label>
            <div class="col-lg-3 col-md-4">
                <input type="text" class="form-control" name="pro_couleur" id="pro_couleur" value="<?php echo set_value('pro_couleur'); ?>">
                <?php echo form_error('pro_couleur'); ?>

            </div>
            <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Extension de la photo : *</label>
            <div class="col-lg-3 col-md-4">
                <input type="text" class="form-control" name="pro_photo" id="pro_photo" placeholder="Ex: jpg, png, ..." value="<?php echo set_value('pro_photo'); ?>">
                <?php echo form_error('pro_photo'); ?>

            </div>
        </div>

        <!-- <div class="form-group row">
            <label for="fichier" class="col-lg-3 col-md-2 col-form-label ">Sélectionnez une photo : * </label>
            <div class="col-lg-3 col-md-4">
                <input type="file" class="form-control-file" name="fichier" id="fichier">        
            </div>
        </div> -->
        <div class="form-group row">
            <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">Produit bloqué : </label>
            <div class="col-lg-4 col-md-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pro_bloque" id="oui" value="1" <?php echo  set_radio('pro_bloque', '1'); ?>>
                    <label class="form-check-label" for="oui">oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pro_bloque" id="non" value="0" <?php echo  set_radio('pro_bloque', '0', TRUE); ?>>
                    <label class="form-check-label" for="non">non</label>
                </div>
            <?php echo form_error('pro_bloque'); ?>
            </div>
        </div>
        <button type="submit" class="btn btn-success mb-2">Ajouter</button>
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>



    <!-- <div class="form-group">
        <label for="pro_cat_id">Catégorie du produit</label>
        <input type="text" name="pro_cat_id" id="pro_cat_id" class="form-control" value="<?php echo set_value('pro_cat_id'); ?>">
        <?php echo form_error('pro_cat_id'); ?>
    </div>

    <div class="form-group">
        <label for="pro_libelle">Libellé</label>
        <input type="text" name="pro_libelle" id="pro_libelle" class="form-control" value="<?php echo set_value('pro_libelle'); ?>">
        <?php echo form_error('pro_libelle'); ?>
    </div>


    <div class="form-group">
        <label for="pro_ref">Référence</label>
        <input type="text" name="pro_ref" id="pro_ref" class="form-control" value="<?php echo set_value('pro_ref'); ?>"> -->
        <!-- la méthode set_value() permet de garder la valeur rentré lors du rechargement de la page même si elle n'est pas juste -->
        <!-- <?php echo form_error('pro_ref'); ?>
    </div>

    <button type="submit" class="btn btn-dark">Ajouter</button>
</form> -->