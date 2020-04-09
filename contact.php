<?php
include("headerJarditou.php");

?>


            <!-- Form  -->
            <!-- Methode pour collecter les informations dans le document.forms -->
            <form id="contact" action="assets/php/script.php" method="post">
                <!-- Message to specify what is necessary in the form -->
                <div class="alert alert-primary mt-1" role="alert">
                    Remplir obligatoirement les champs qui comportent un(*)
                </div>

                <fieldset>
                    <legend>Vos coordonnées :</legend>
                    <!-- nom et prenom -->
                    <div class="form-group row">
                        <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">Votre nom *</label>
                        <div class="col-lg-4 col-md-4">
                            <input type="text" class="form-control font" name="nom" value="" id="nom" placeholder="Camel"
                                autofocus>
                                <span id="p1"> </span>
                        </div>
                        <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">Votre prénom *</label>
                        <div class="col-lg-4 col-md-4">
                            <input type="text" class="form-control font" name="prenom" value="" id="prenom" placeholder="Case">
                            <span id="p2"> </span>
                        </div>
                    </div>
                    <!-- sexe et date de naissance -->
                    <div class="form-group row">
                        <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">Sexe *</label>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexe" id="Madame" value="option1">
                                <label class="form-check-label font" id="sexe" for="inlineCheckbox1">Madame</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexe" id="Monsieur" value="option2">
                                <label class="form-check-label font" id="sexe" for="inlineCheckbox2">Monsieur</label>

                            </div>
                            <span id ="p7"> </span>
                        </div>
                        <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">Date de naissance
                            *</label>
                        <div class="col-lg-4 col-md-4">
                            <input type="date" class="form-control font" name="date" value="" id="date">
                            <p id="p3"> </p>
                        </div>
                    </div>
                    <!-- adresse et code postal -->
                    <div class="form-group row">
                        <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">Adresse </label>
                        <div class="col-lg-4 col-md-4">
                            <input type="text" class="form-control font" name="adress" id="adress"
                                placeholder="30 Rue de Poulainville">
                        </div>
                        <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">code postal </label>
                        <div class="col-lg-2 col-md-4">
                            <input type="text" class="form-control font" name="cp" id="cp" placeholder="80000">
                        </div>
                    </div>
                    <!-- ville et  E-mail -->
                    <div class="form-group row">
                        <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">Ville</label>
                        <div class="col-lg-4 col-md-4">
                            <input type="text" class="form-control font" name="ville" id="ville" placeholder="Amiens">
                        </div>
                        <label id="colFormLabel" class="col-lg-2 col-md-2 col-form-label font">E-mail *</label>
                        <div class="col-lg-4 col-md-4">
                            <input type="email" class="form-control font" name="email" value="" id="email"
                            placeholder="camelCase@afpa.fr">
                            <p id="p4"> </p>
                        </div>
                    </div>
                </fieldset>
                <!-- "Your request" fieldset -->
                <Fieldset>
                    <legend>Votre demande :</legend>
                    <!-- Subject of the contact and the message -->
                    <div class="form-group row">
                        <div class="form-group col-lg-4 col-md-5">
                            <label for="FormGroupLabel">Sujet *</label>
                            <select class="custom-select" name="select"  id="select">
                                <option value ="choix">Selectionnez votre sujet</option>
                                <option value="mes_commande">Mes commandes</option>
                                <option value="question_produit">Question(s) sur un produit</option>
                                <option value="Livraison">Livraison</option>
                                <option value="remboursement">Remboursement et retour</option>
                                <option value="reclamation">Service Après-Vente</option>
                                <option value="autres">Autres</option>
                            </select>
                            <p id="p5"> </p>

                        </div>
                        <div class="form-group col-lg-8 col-md-7">
                            <label for="FormGroupLabel">Votre message *</label>
                            <textarea class="form-control font" name="message" id="message" rows="4"></textarea>
                            <p id="p6"> </p>
                        </div>
                    </div>
                </Fieldset>
                <!-- Check box for using data  -->
                <div class="form-check form-check-inline mb-3 font">
                    <input class="form-check-input font" type="radio" name="accepte" id="accepte" required>
                    <label class="form-check-label" for="inlineCheckbox2">J'accepte le traitement informatique de ce
                        formulaire *</label>
                </div>

                <!-- buttons to send or rest the input -->
                <div class="col-lg-3 form-group text-center">
                    <span id="erreur"></span><br>
                    <button type="submit" class="btn btn-primary mb-2" id="button1" value="envoiContact">Envoyer</button>
                    <button type="reset" class="btn btn-outline-secondary mb-2 ml-2"
                        value="resetContact">Annuler</button>
                </div>
                <span id="erreur"></span>

            </form>


<?php
include("footer.php")
?>