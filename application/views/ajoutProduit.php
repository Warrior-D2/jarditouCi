<?php
$title ='Produits';
?>

<?php ob_start(); ?>

<?php echo form_open(); ?> 

    <!-- <div class="form-group">
        <label for="formGroupExampleInput">ID</label>
        <input type="text" class="form-control" name="pro_id"id="pro_id" placeholder="">
        <span id="error_pro_id"></span>
    </div> -->
    <div class="form-group">
        <label for="formGroupExampleInput2">Réference</label>
        <input type="text" class="form-control" name="pro_ref"id="pro_ref" placeholder="">
        <span id="error_pro_ref"></span>
    </div>

    <!-- <div class="form-group">
        <label for="formGroupExampleInput2">Catégorie</label>
        <input type="text" class="form-control"name="pro_cat" id="pro_cat" placeholder="">
        <span id="error_pro_cat"></span>
    </div> -->
    <div><label for="categorie">categorie :</label>
        <select class="custom-select" name="pro_cat" ID="pro_cat">
            <option value ="">-- selectionner une catégorie--</option>
    <?php
    foreach($categories as $c)

    {
    ?>
    <option value ="<?= $c->cat_id?>"><?=$c->cat_id."-".$c->cat_nom?></option>
    <?php
    }
    ?>
    </select>

    <div class="form-group">
        <label for="formGroupExampleInput2">Libellé</label>
        <input type="text" class="form-control" name="pro_libelle"id="pro_libelle" placeholder="">
        <span id="error_pro_libelle"></span>
    </div>

    <div class="form-group">
        <label for="formGroupExampleInput2">Description</label>
        <input type="text" class="form-control" name="pro_description"id="pro_description" placeholder="">
        <span id="error_pro_description"></span>
    </div>

    <div class="form-group">
        <label for="formGroupExampleInput2">Prix</label>
        <input type="text" class="form-control" name="pro_prix" id="pro_prix" placeholder="">
        <span id="error_pro_prix"></span>
    </div>

    <div class="form-group">
        <label for="formGroupExampleInput2">Stock</label>
        <input type="text" class="form-control" name="pro_stock" id="pro_stock" placeholder="">
        <span id="error_pro_stock"></span>
    </div>

    <div class="form-group">
        <label for="formGroupExampleInput2">Couleur</label>
        <input type="text" class="form-control" name="couleur" id="couleur" placeholder="">
        <span id="error_couleur"></span>
    </div>

    <!-- <div class="form-group">
        <label for="formGroupExampleInput2">Extension</label>
        <input type="text" class="form-control" name="photo" id="photo" placeholder="Ex: jpg, png, ...">
        <span id="error_photo"></span>
    </div> -->

    <!-- <div class="form-group">
        <label for="formGroupExampleInput2">Date d'ajout</label>
        <input type="date" class="form-control" name="date_ajout" id="date_ajout" placeholder="jj-mm-aaaa">
        <span id="error_date_ajout"></span>
    </div> -->
    <!-- <div class="form-group">
        <label for="formGroupExampleInput2">Date de modification</label>
        <input type="date" class="form-control" name="date_modif" id="date_modif" placeholder="jj-mm-aaaa">
        <span id="error_date_modif"></span>
    </div> -->

    <!-- je defini des valeurs 1 et 0 pour ma mention bloque, ainsi je peux avoir un choix et oui et non pour mes produits au moment de choisir -->
    <!-- <div class="form-check form-check-inline mb-3 font">
        <label class="form-check-label" for="inlineCheckbox2">Voulez vous bloquer ce produit?</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="radI form-check-input ml-1 mb-3" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1"> <!-- Value = 1 -->
        <!-- <label class="radI form-check-label ml-2 mb-2" for="inlineRadio1"><h5 class="largContact2">Oui</h5></label> <!-- Value = 0 -->
    <!-- </div>
    <div class="form-check form-check-inline mb-3">
        <input class="radI form-check-input ml-5 mb-3" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0" checked>
        <label class="radI form-check-label ml-2 mb-2" for="inlineRadio1"><h5 class="largContact2">Non </h5></label>
    </div> -->
    <!-- si je veux que ma mention bloqué ait une valeur numerique je fais ce qui suit -->
    <div class="form-group">
        <label for="formGroupExampleInput2">Bloquer Produit</label>
        <input type="texte" class="form-control" name="bloque" id="bloque">
        <span id="error_bloque"></span>

    </div>
    <br>
    <div class="form-check form-check-inline mb-3 font">
        <input class="form-check-input font" type="radio" name="accepte" id="accepte" required>
        <label class="form-check-label" for="inlineCheckbox2">Voulez vous ajouter ce produit?</label>
    </div>

    <br>
    <button type="submit" class="btn btn-outline-success">Ajouter</button>
    <button type="reset" class="btn btn-outline-danger">Refuser</button>

</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>