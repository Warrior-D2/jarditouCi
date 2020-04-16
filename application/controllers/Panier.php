<?php
	
    // application/controllers/Panier.php
        
    defined('BASEPATH') OR exit('No direct script access allowed');
        
    class Panier extends CI_Controller 
    {
        public function afficherPanier()
        { 
            $this->load->view("panier");
        }

        public function ajouterPanier()
        {
            // On récupère les données du formulaire 
            $aData = $this->input->post();  

            // Au 1er article ajouté, création du panier car il n'existe pas
            if ($this->session->panier == null) 
            {
                // On créé un tableau pour stocker les informations du produit  
                $aPanier = array();

                // On ajoute les infos du produit ($aData) au tableau du panier ($aPanier) 
                array_push($aPanier, $aData);  

                // On stocke le panier dans une variable de session nommée 'panier'            
                $this->session->set_userdata("panier", $aPanier);

                $this->load->view('tableau');
            }
            else
            { // le panier existe (on a déjà mis au moins un article) 

                // On récupère le contenu du panier en session           
                $aPanier = $this->session->panier;

                $pro_id = $this->input->post('pro_id');

                $bSortie = FALSE;

                // on cherche si le produit existe déjà dans le panier
                foreach ($aPanier as $produit) 
                {
                    if ($produit['pro_id'] == $pro_id)
                    {
                        $bSortie = TRUE;
                    }
                }

                if ($bSortie) 
                { // si le produit est déjà dans le panier, l'utilisateur est averti
                    echo '<div class="alert alert-danger">Ce produit est déjà dans le panier.</div>';

                    // On redirige sur la liste
                    redirect("produits/liste");
                }
                else 
                { // sinon, le produit est ajouté dans le panier
                    array_push($aPanier, $aData);

                    // On remet le tableau des produits que  
                    $this->session->panier = $aPanier;
                    // $this->load->view('liste');

                    // On redirige sur la liste
                    redirect("produits/liste");
                }
            }
        }
        // *---------* Fonction modifier un produits du panier
        public function augmenterQuantite($pro_id)
        {
            $aPanier = $this->session->panier;
        
            $aTemp = array(); //création d'un tableau temporaire vide
        
            // On parcourt le tableau produit après produit
            for ($i = 0; $i < count($aPanier); $i++) 
            {
                if ($aPanier[$i]['pro_id'] !== $pro_id) 
                // on compare le pro_id du produit que l'on veut augmenter aux autres produits dans le panier
                {
                    array_push($aTemp, $aPanier[$i]);
                    // Si il est différent alors on l'insère dans le tableau
                }
                else //si il est identique
                {
                    $aPanier[$i]['pro_qte']++; // on augmenter la quantité
                    array_push($aTemp, $aPanier[$i]); // Puis on l'ajoute au tableau
                }
            }
        
            $aPanier = $aTemp; //on attribu à $aPanier le nouveau tableau
            unset($aTemp); // On supprimer la variable inutile $aTemp
            $this->session->set_userdata("panier", $aPanier); // On modifie la variable session en attribuant le nouveau tableau avec la fonction set_userdate()
        
            // On réaffiche le panier 
            redirect("panier/afficherPanier");
        }

        public function diminiuerQuantite($pro_id)
        {
            $aPanier = $this->session->panier;
            
            $aTemp = array(); //création d'un tableau temporaire vide
            
            // On parcourt le tableau produit après produit
            for ($i = 0; $i < count($aPanier); $i++) 
            {
                if ($aPanier[$i]['pro_id'] !== $pro_id)
                {
                    array_push($aTemp, $aPanier[$i]);
                }
                else
                {
                    $aPanier[$i]['pro_qte']--; // on diminue la quantité
                    array_push($aTemp, $aPanier[$i]);
                }
            }
            
            $aPanier = $aTemp;
            unset($aTemp);
            $this->session->set_userdata("panier", $aPanier);
            
            // On réaffiche le panier 
            redirect("panier/afficherPanier");
        }

        public function supprimerProduit($pro_id)
        {
            $aPanier = $this->session->panier;
            $aTemp = array(); //création d'un tableau temporaire vide
            
            for ($i=0; $i<count($aPanier); $i++) //on cherche dans le panier les produits à ne pas supprimer
            {
                if ($aPanier[$i]['pro_id'] !== $pro_id) // ici, le produit dont le pro_id mis en paramètre de la méthode ne sera jamais ajouté dans le tableau
                {
                    array_push($aTemp, $aPanier[$i]); // ces produits sont ajoutés dans le tableau temporaire
                }
            }
            
            $aPanier = $aTemp;
            unset($aTemp);
            
            $this->session->panier = $aPanier; // le panier prend la valeur du tableau temporaire et ne contient donc plus le produit à supprimer
            
            // On réaffiche le panier 
            redirect("panier/afficherPanier");
        }

        public function supprimerPanier()
        {
            $aPanier = $this->session->panier;
            $aTemp = array(); //création d'un tableau temporaire vide        
            $aPanier = $aTemp; // On attribue un tableau vide
            unset($aTemp);
            $this->session->panier = $aPanier; // On attribue à la variable session $aPanier qui est vide.
            // On réaffiche le panier 
            redirect("panier/afficherPanier");
        }
    }