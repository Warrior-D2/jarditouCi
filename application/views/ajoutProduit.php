<?php
$title ='Produits';
?>

<?php ob_start(); ?>

<?php echo form_open_multipart(); ?> 

    
    
    <div class="form-group">
        <label id="colFormLabel" class="col-lg-3 col-form-label ">Référence produit : *</label>
        <input type="text" class="form-control" name="pro_ref" id="pro_ref" value="<?php echo set_value('pro_ref'); ?>">
        <?php echo form_error('pro_ref'); ?>
    </div>

    <div class="form-group">
        <label id="colFormLabel" class="col-lg-3 col-form-label">Catégorie du produit : *</label>
        <select class="form-control" name="pro_cat_id" id="pro_cat_id" value="<?php echo set_value('pro_cat_id'); ?>">
            <option value="" selected>Sélectionnez la catégorie</option>
            <?php foreach ($categories as $row) { ?>
                <option value="<?=$row->cat_id?>" <?php echo  set_select('pro_cat_id', $row->cat_id);?>><?=$row->cat_id." - ".$row->cat_nom?></option> 
            <?php } ?>
        </select>
        <?php echo form_error('pro_cat_id'); ?>
    </div>

    <div class="form-group">
        <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Nom du produit : *</label>
        <input type="text" class="form-control" name="pro_libelle" id="pro_libelle" value="<?php echo set_value('pro_libelle'); ?>">
        <?php echo form_error('pro_libelle'); ?>
    </div>

    <div class="form-group">
        <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Description du produit : *</label>
        <textarea class="form-control" name="pro_description" id="pro_description" rows="4"><?php echo set_value('pro_description'); ?></textarea>
        <?php echo form_error('pro_description'); ?>
    </div>

    <div class="form-group">
        <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Prix : *</label>
        <input type="text" class="form-control" name="pro_prix" id="pro_prix" value="<?php echo set_value('pro_prix'); ?>">
        <?php echo form_error('pro_prix'); ?>
    </div>

    <div class="form-group">
        <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Stock : *</label>
        <input type="text" class="form-control" name="pro_stock" id="pro_stock" value="<?php echo set_value('pro_stock'); ?>">
        <?php echo form_error('pro_stock'); ?>
    </div>

    <div class="form-group">
        <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Couleur : *</label>
        <input type="text" class="form-control" name="pro_couleur" id="pro_couleur" value="<?php echo set_value('pro_couleur'); ?>">
        <?php echo form_error('pro_couleur'); ?>
    </div>

    <div class="form-group">
        <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label ">Extension de la photo : *</label>
        <input type="text" class="form-control" name="pro_photo" id="pro_photo" placeholder="Ex: jpg, png, ..." value="<?php echo set_value('pro_photo'); ?>">
        <?php echo form_error('pro_photo'); ?>
    </div>
    <div class="form-group">
        <label id="colFormLabel" class="col-lg-3 col-md-2 col-form-label "> photo : *</label>
        <input type="file" class="form-control" name="pro_photo" id="pro_photo" value="<?php echo set_value('pro_photo'); ?>">
        <?php echo form_error('pro_photo'); ?>
    </div>
    


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

    <!-- <div class="form-check form-check-inline mb-3 font">
        <input class="form-check-input font" type="radio" name="accepte" id="accepte" required>
        <label class="form-check-label" for="inlineCheckbox2">Voulez vous ajouter ce produit?</label>
    </div> -->

    <button type="submit" class="btn btn-outline-success">Ajouter</button>
    <button type="reset" class="btn btn-outline-danger">Refuser</button>

</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>