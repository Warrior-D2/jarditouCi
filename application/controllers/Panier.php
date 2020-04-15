<?php
	
    // application/controllers/Panier.php
        
    defined('BASEPATH') OR exit('No direct script access allowed');
        
    class Panier extends CI_Controller 
    {
        public function afficherPanier()
        { // vous cassez les couilles 
            $this->load->view("panier");
        }
        public function ajouter()
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

                // 
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

                    // On remet le tableau des produitss que  
                    $this->session->panier = $aPanier;
                    $this->load->view('produits/liste', $aView);

                    // On redirige sur la liste
                    redirect("produits/liste");
                }
            }

        }
    }