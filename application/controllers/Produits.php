	
<?php
	
    // application/controllers/Produits.php
        
    defined('BASEPATH') OR exit('No direct script access allowed');
        
    class Produits extends CI_Controller 
    {
        public function index()
        {
            // // // Exemple pour créer la liste de produits jarditou
            // // // Charge la librairie 'database' et se connecte à la base de données (création d'un objet db)
            // // $this->load->database();
            
            // // Exécute la requête 
            // $results = $this->db->query("SELECT * FROM produits");  
            
            // // Récupération des résultats    
            // $aListe = $results->result();   
            
            // // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue 
            // $aViewProduits["liste_produits"] = $aListe;
            
            // On passe les tableaux en second argument de la méthode. Le "+" permet d'assigner plusieurs paramètres.
            $this->load->view('jarditou3');
        }

        public function liste()
        {
            
            // Chargement du modèle 'Produits_model'
            $this->load->model('Produits_model');

            /* On appelle la méthode liste() du modèle,
            * qui retourne le tableau de résultat ici affecté dans la variable $aListe (un tableau) 
            * remarque la syntaxe $this->nomModele->methode()
            */
            $aListe = $this->Produits_model->liste();            
            
            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue 
            $aViewProduits["liste_produits"] = $aListe;
            
            // On passe les tableaux en second argument de la méthode. Le "+" permet d'assigner plusieurs paramètres.
            $this->load->view('tableau', $aViewProduits);
        }


        public function ajouter()
        {

            // Chargement du modèle 'Produits_model'
            $this->load->model('Produits_model');
            //on attribue à la variable le resultat de la requete
            $aCategories = $this->Produits_model->categorie();    
            
            $aviewCategories['categories'] = $aCategories;
            if ($this->input->post()) 
            { // 2ème appel de la page: traitement du formulaire
<<<<<<< HEAD
                
                $data = $this->input->post(NULL, TRUE); //permet de récupérer en une seule fois toutes les données envoyées par le formulaire. Equivaut au tableau $_POST en PHP natif.
=======
                $data = $this->input->post(); //permet de récupérer en une seule fois toutes les données envoyées par le formulaire. Equivaut au tableau $_POST en PHP natif.
>>>>>>> 79c1a2357ab3952c230bd60bdc797681ef4b7ac6
                
                // ------------------------------ IMPORTANT ------------------------------
                // L'utilisation de $this->db->insert('produits', $data); nécessite que le nom des colonnes que le nom des colonnes soit identiques aux attributs "name"

                // On peut ne pas vouloir supprimer un champ dont on a pas besoin avant l'insertion :
                // unset($data["champPasEnBase"];
                
                // Ou au contraire, ajouter ou modifier des éléments :
                // Ajout d'une date d'ajout que le formulaire ne contient pas
                $data["pro_d_ajout"] = date("Y-m-d h:i:s");

                // Transformation d'une information venant du formalaire
                // par exemple forcer la référence d'un produit en majuscules
                $pro_ref = $this->input->post("pro_ref");
                $data["pro_ref"] = strtoupper($pro_ref);
                
                // ------------------ Validation de formulaire ------------------

                // Permet de personnaliser le style des messages d'erreurs
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="width: 255px;font-size: 14px;">', '</div>');  
                    // -> 1er argument : balise HTML d'ouverture du message d'erreur.
                    // -> 2ème argument : balise HTML de fermeture.

                // Traitement des données rentrées dans le formulaire.
                $this->form_validation->set_rules("pro_ref", "Référence", "required|min_length[6]", array("required" => "Veuillez renseigner une %s.",  "min_length" => "La %s doit avoir longueur minimum de 6 caractères."));                  
                $this->form_validation->set_rules("pro_libelle", "Libellé", "required|regex_match[/^[a-z0-9_\-áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]*$/i]", array("required" => "Veuillez renseigner un %s.", "regex_match"=>"Chiffres, lettres, '_' et '-' uniquement."));                
                $this->form_validation->set_rules("pro_cat_id", "Catégorie", "required", array("required" => "Veuillez sélectionner une %s."));                
                $this->form_validation->set_rules("pro_description", "Description", "required", array("required" => "Veuillez renseigner une %s."));                
                $this->form_validation->set_rules("pro_prix", "Prix", "required|decimal", array("required" => "Veuillez renseigner un %s.", "decimal"=>"Ce champs ne doit être un chiffre déciaml (Ex: 25.00)."));                
                $this->form_validation->set_rules("pro_stock", "Stock", "required|integer", array("required" => "Veuillez renseigner un %s.", "integer"=>"Ce champs ne doit contenir que des chiffres entiers."));                
                $this->form_validation->set_rules("pro_couleur", "Couleur", "required|alpha", array("required" => "Veuillez renseigner une %s.", "alpha"=>"Ce champs ne doit contenir que des lettres."));                
                //$this->form_validation->set_rules("pro_photo", "Extension", "required", array("required" => "Veuillez renseigner une %s.")); 
                $this->form_validation->set_rules("pro_bloque", "Bloque", "required", array("required" => "Veuillez cocher une des deux case."));

                if ($this->form_validation->run() == FALSE) 
                //La méthode run() permet d'exécuter la vérification des filtres. Elle retourne TRUE si la valeur est correct, sinon FALSE
                { // Echec de la validation, on réaffiche la vue formulaire 
                    $this->load->view('ajoutProduit', $aviewCategories);
                }
                else // if ($this->form_validation->run() == TRUE)
                { // La validation a réussi, nos valeurs sont bonnes, on peut insérer en base
                    
                    // Chargement du modèle 'Produits_model'
                    $this->load->model('Produits_model');
                    //execution de la requete insert
                    $this->Produits_model->ajouter($data);
                    
                    /********************************************Gestion de la photos*******************************/
                    if ($_FILES) 
                    {
                        // On extrait l'extension du nom du fichier 
                        // Dans $_FILES["pro_photo"], pro_photo est la valeur donnée à l'attribut name du champ de type 'file'  
                        $extension = substr(strrchr($_FILES["pro_photo"]["name"], "."), 1);
                    }
                    $id = $this->db->Insert_id("pro_id");
                    // On créé un tableau de configuration pour l'upload
                    $config['upload_path'] = './assets/img/'; // chemin où sera stocké le fichier
                    // nom du fichier final
                    $config['file_name'] = $id.'.'.$extension; 
                    // On indique les types autorisés (ici pour des images)
                    $config['allowed_types'] = 'gif|jpg|jpeg|png'; 
                    // On charge la librairie 'upload'
                    $this->load->library('upload');
                    // On initialise la config 
                    $this->upload->initialize($config);
                    // La méthode do_upload() effectue les validations sur l'attribut HTML 'name' ('fichier' dans notre formulaire) 
                    //et si OK renomme et déplace le fichier tel que configuré
                    if ( ! $this->upload->do_upload('pro_photo')) 
                    {
                        // Echec,  on réaffiche le formulaire
                        $this->load->view('ajoutProduit');
                    }
                    else
                    { // Succès, on redirige sur la liste 
                        redirect("produits/liste"); //redirige le navigateur vers la méthode liste du contrôleur produits. La méthode redirect() est disponible via le helper url.
                    }
                }     
            } 
            else
            { // 1er appel de la page: affichage du formulaire
                $this->load->view('ajoutProduit', $aviewCategories);  // Chargement de la vue 'ajout.php'
            }
        }

        /*--------- Modif produits --------- */
        public function modifier($id)
        {
            // Chargement du modèle 'Produits_model'
            $this->load->model('Produits_model');
            //execution de  la requete select avec l'id du produit
            $aView["produit"] = $this->Produits_model->produitId($id);

        if ($this->input->post()) 
        { // 2ème appel de la page: traitement du formulaire

            $data = $this->input->post(NULL, TRUE);
            // Ajout d'une date d'ajout que le formulaire ne contient pas
            $data["pro_d_modif"] = date("Y-m-d h:i:s");

            $this->form_validation->set_rules("pro_ref", "Référence", "required|min_length[6]",
            array("required" => "Veuillez renseigner une %s.",  "min_length" => "La %s doit avoir longueur minimum de 6 caractères."));
            $this->form_validation->set_rules("pro_libelle", "Libellé", "required|regex_match[/^[a-z0-9_\-áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]*$/i]",
            array("required" => "Veuillez renseigner un %s.", "regex_match"=>"Chiffres, lettres, '_' et '-' uniquement."));
            $this->form_validation->set_rules("pro_cat_id", "Catégorie", "required", array("required" => "Veuillez sélectionner une %s."));
            $this->form_validation->set_rules("pro_description", "Description", "required", array("required" => "Veuillez renseigner une %s."));
            $this->form_validation->set_rules("pro_prix", "Prix", "required|decimal", array("required" => "Veuillez renseigner un %s.", "decimal"=>"Ce champs ne doit être un chiffre déciaml (Ex: 25.00)."));                
            $this->form_validation->set_rules("pro_stock", "Stock", "required|integer", array("required" => "Veuillez renseigner un %s.", "integer"=>"Ce champs ne doit contenir que des chiffres entiers."));                
            $this->form_validation->set_rules("pro_couleur", "Couleur", "required|alpha", array("required" => "Veuillez renseigner une %s.", "alpha"=>"Ce champs ne doit contenir que des lettres."));                
            //$this->form_validation->set_rules("pro_photo", "Extension", "required", array("required" => "Veuillez renseigner une %s."));                
            $this->form_validation->set_rules("pro_bloque", "Bloque", "required", array("required" => "Veuillez cocher une des deux case."));

            if ($this->form_validation->run() == FALSE)
            { // Echec de la validation, on réaffiche la vue formulaire 
                $this->load->view('details', $aView);
            }
            else
            { // La validation a réussi, nos valeurs sont bonnes, on peut modifier en base  
                

                /********************************************Gestion de la photos*******************************/
                if ($_FILES) 
                {
                    // On extrait l'extension du nom du fichier 
                    // Dans $_FILES["pro_photo"], pro_photo est la valeur donnée à l'attribut name du champ de type 'file' 
                    $extension = substr(strrchr($_FILES["pro_photo"]["name"], "."), 1);
                }
                
                // On créé un tableau de configuration pour l'upload
                $config['upload_path'] = './assets/img/'; // chemin où sera stocké le fichier
                // nom du fichier final
                $config['file_name'] = $id.'.'.$extension; 
                // On indique les types autorisés (ici pour des images)
                $config['allowed_types'] = 'gif|jpg|jpeg|png'; 
                //écrase le nom du fichier existant
                $config['overwrite'] = TRUE;
                // On initialise la config 
                $this->upload->initialize($config);
                // La méthode do_upload() effectue les validations sur l'attribut HTML 'name' ('fichier' dans notre formulaire) 
                //et si OK renomme et déplace le fichier tel que configuré
                if ( ! $this->upload->do_upload('pro_photo')) 
                {
                    // Echec,  on réaffiche le formulaire
                    $this->load->view('details');
                    
                }
                else
                { // Succès, on redirige sur la liste 
                    // Chargement du modèle 'Produits_model'
                    $this->load->model('Produits_model');
                    //execution de la requete update
                    $this->Produits_model->modifier($data, $id);
                    redirect("produits/liste"); //redirige le navigateur vers la méthode liste du contrôleur produits. La méthode redirect() est disponible via le helper url.
                }
            }
        }
        else
        { // 1er appel de la page: affichage du formulaire             
            $this->load->view('details', $aView);
        }
    } // -- modifier()


        /*--------- supprimer un produit --------- */
    public function supprimer($id)
    {
        // Chargement du modèle 'Produits_model'
        $this->load->model('Produits_model');
        // on recupere l'extention de la photo via la requete
        $extension = $this->Produits_model->extension($id);
        //on supprime la photo dans le dossier
        unlink("assets/img/".$id.".".$extension);
        //on execute la requete de suppression
        $this->load->model('Produits_model');
        $this->Produits_model->supprimer($id);
        //on redirige vers la liste des produits
        redirect("produits/liste");
    }

}