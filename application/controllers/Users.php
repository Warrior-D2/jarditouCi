	
<?php
    
    // application/controllers/Users.php
        
    defined('BASEPATH') OR exit('No direct script access allowed');
        
    class Users extends CI_Controller 
    {
        public function index()
        {
            $this->load->view('inscription');
        }

        public function inscription()
        {
            if ($this->input->post()) 
            { 
                $data = $this->input->post(); //permet de récupérer en une seule fois toutes les données envoyées par le formulaire. Equivaut au tableau $_POST en PHP natif.
                
                // ------------------ Validation de formulaire ------------------
                
                // Permet de personnaliser le style des messages d'erreurs
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="width: 315px;font-size: 14px;">', '</div>');  
                // -> 1er argument : balise HTML d'ouverture du message d'erreur.
                // -> 2ème argument : balise HTML de fermeture.

                // Traitement des données rentrées dans le formulaire.
                $this->form_validation->set_rules("use_lastname", "Nom", "required", array("required" => "Veuillez renseigner votre %s."));                  
                $this->form_validation->set_rules("use_firstname", "Prénom", "required", array("required" => "Veuillez renseigner votre %s."));                
                $this->form_validation->set_rules("use_username", "Nom d'utilisateur", "required|is_unique[users.use_username]", 
                            array("required" => "Veuillez sélectionner un %s.",
                            "is_unique" => "Le %s existe déjà !"));                
                $this->form_validation->set_rules("use_email", "E-mail", "required|valid_email|is_unique[users.use_email]", 
                            array("required" => "Veuillez renseigner votre %s.", 
                                "valid_email"=>"Veuillez saisir un %s valide.",
                                "is_unique" => "L'%s existe déjà !"));  

                $this->form_validation->set_rules("use_password", "Mot de passe", "required", array("required" => "Veuillez renseigner votre %s."));                
                $this->form_validation->set_rules("use_password2", "Mot de passe", "required|matches[use_password]", array("required" => "Veuillez confirmer votre %s.", 'matches' => 'Le %s n\'est pas identique au précédent.'));                

                if ($this->form_validation->run() == FALSE) 
                //La méthode run() permet d'exécuter la vérification des filtres. Elle retourne TRUE si la valeur est correct, sinon FALSE
                { // Echec de la validation, on réaffiche la vue formulaire 
                    $this->load->view('inscription');
                }
                else // if ($this->form_validation->run() == TRUE)
                { // La validation a réussi, nos valeurs sont bonnes, on peut insérer en base
    
                    // Transformation d'une information venant du formalaire
                    $use_password = $this->input->post("use_password"); // On récupère la valeur dans l'input "use_password"
                    $data["use_password"] = password_hash($use_password, PASSWORD_BCRYPT); // Puis on hache le mot de passe à l'aide la fonction password-hash()

                    // On supprime le champ "use_password2" pour la requête
                    unset($data["use_password2"]);

                    // On appel le modèle Users_model
                    $this->load->model('Users_model');
                    // On appel la méthode dans le modèle
                    $this->Users_model->inscription($data);
                    redirect("Users/index"); //redirige le navigateur vers la méthode liste du contrôleur produits. La méthode redirect() est disponible via le helper url.
                }     
            } 
        }

        public function connexion()
        {
            if ($this->input->post()) 
            { 
                $data = $this->input->post(); //permet de récupérer en une seule fois toutes les données envoyées par le formulaire. Equivaut au tableau $_POST en PHP natif.
                
                // ------------------ Validation de formulaire ------------------
                
                // Permet de personnaliser le style des messages d'erreurs
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="width: 315px;font-size: 14px;">', '</div>');  
                
                // Traitement des données rentrées dans le formulaire.
                $this->form_validation->set_rules("emaillog", "E-mail", "required", array("required" => "Veuillez renseigner votre %s."));                  
                $this->form_validation->set_rules("passlog", "Mot de passe", "required", array("required" => "Veuillez renseigner votre %s."));                

                if ($this->form_validation->run() == FALSE) 
                //La méthode run() permet d'exécuter la vérification des filtres. Elle retourne TRUE si la valeur est correct, sinon FALSE
                { // Echec de la validation, on réaffiche la vue formulaire 
                    $this->load->view('inscription');
                }
                else // if ($this->form_validation->run() == TRUE)
                { // La validation a réussi, nos valeurs sont bonnes, on peut insérer en base
                    $emailForm = $data['emaillog'];
                    $password = $data['passlog'];

                    // Appel du modèle
                    $this->load->model('Users_model');

                    // Appel de la méthode dans le modèle
                    $aUser = $this->Users_model->connexion($emailForm);
                    if(password_verify($password, $aUser->use_password))
                    {
                        $_SESSION['username'] = $aUser->use_firstname;
                        $_SESSION['rank'] = $aUser->use_rank;

                        redirect("produits/liste"); //redirige le navigateur vers la méthode liste du contrôleur produits. La méthode redirect() est disponible via le helper url.
                    }
                    else
                    {
                        echo "identifiant ou mot de passe incorrect !";
                    }
                }     
            }
        }

        Public function deconnexion()
        {
            unset($_SESSION["username"]);
            unset($_SESSION["rank"]);
            if (ini_get("session.use_cookies"))
            {
                setcookie(session_name(), '', time()-42000);
                /*
                Or setcookie(session_name(), '', 0, null, null, false, true);
                session_name() allow to get or modify the session's name
                */
            }
            session_destroy();
            redirect("produits/liste"); //redirige le navigateur vers la méthode liste du contrôleur produits. La méthode redirect() est disponible via le helper url.
        }
    }