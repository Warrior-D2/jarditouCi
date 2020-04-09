	
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
            // // Exemple pour créer la liste de produits jarditou
            // // Charge la librairie 'database' et se connecte à la base de données (création d'un objet db)
            // $this->load->database();
            
            // Exécute la requête 
            $results = $this->db->query("SELECT * FROM produits");  
            
            // Récupération des résultats    
            $aListe = $results->result();   
            
            // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue 
            $aViewProduits["liste_produits"] = $aListe;
            
            // On passe les tableaux en second argument de la méthode. Le "+" permet d'assigner plusieurs paramètres.
            $this->load->view('tableau', $aViewProduits);
        }


        public function ajouter()
        {

            $resultats = $this->db->query("SELECT DISTINCT cat_nom, cat_id FROM categories LEFT JOIN produits ON cat_id = pro_cat_id");  
            $aCategories = $resultats->result();
            $aviewCategories['categories'] = $aCategories;
            if ($this->input->post()) 
            { // 2ème appel de la page: traitement du formulaire
                
                $data = $this->input->post(); //permet de récupérer en une seule fois toutes les données envoyées par le formulaire. Equivaut au tableau $_POST en PHP natif.
                
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
                    $this->form_validation->set_rules("pro_photo", "Extension", "required", array("required" => "Veuillez renseigner une %s."));                
                    $this->form_validation->set_rules("pro_bloque", "Bloque", "required", array("required" => "Veuillez cocher une des deux case."));                

                    if ($this->form_validation->run() == FALSE) 
                    //La méthode run() permet d'exécuter la vérification des filtres. Elle retourne TRUE si la valeur est correct, sinon FALSE 
                    { // Echec de la validation, on réaffiche la vue formulaire 
                        $this->load->view('ajoutProduit', $aviewCategories);
                    }
                    else // if ($this->form_validation->run() == TRUE)
                    { // La validation a réussi, nos valeurs sont bonnes, on peut insérer en base
                        $this->db->insert('produits', $data); //génère et exécute une requête insert, le tableau $data contient les paramètres de la requête.
                        redirect("produits/liste"); //redirige le navigateur vers la méthode liste du contrôleur produits. La méthode redirect() est disponible via le helper url.
                    }     
            } 
            else
            { // 1er appel de la page: affichage du formulaire
                $this->load->view('ajoutProduit', $aviewCategories);  // Chargement de la vue 'ajout.php'
            }
        }
    }