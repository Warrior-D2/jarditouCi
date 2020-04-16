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

                $this->load->view('panier', $aPanier);
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
                    $this->load->view('liste');

                    // On redirige sur la liste
                    redirect("produits/liste");
                }
            }
        }
        // *---------* Fonction modifier un produits du panier
        public function modifierQuantite($pro_id)
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
                    $aPanier[$i]['pro_qte']++;
                    array_push($aTemp, $aPanier[$i]);
                }
            }
        
            $aPanier = $aTemp;
            unset($aTemp);
            $this->session->set_userdata("panier", $aPanier);
        
            // On réaffiche le panier 
            redirect("panier/afficherPanier");
        }


        // *---------* Fonction supprimer un produits du panier
        // public function supprimerProduit($pro_id)
        // {
        //     $aPanier = $this->session->panier;
            
        //     $aTemp = array(); 
        //     //création d'un tableau temporaire vide
        
        //     for ($i=0; $i<count($tab); $i++) //on cherche dans le panier les produits à ne pas supprimer
        //     {
        //         if ($tab[$i]['pro_id'] !== $pro_id)
        //         {
        //             array_push($aTemp, $aPanier[$i]); // ces produits sont ajoutés dans le tableau temporaire
        //         }
        //     }
        //     // $deleteItem = array(
        //     //     'rowid' => 'b99ccdf16028f015540f341130b6d8ec',
        //     //     'qty'   => 0
        //     // );
            
        //     // $this->cart->update($data);
        // $aPanier = $aTemp;
        // unset($aTemp);
        // $this->session->panier = $aPanier; // le panier prend la valeur du tableau temporaire et ne contient donc plus le produit à supprimer
        
        // // On réaffiche le panier 
        // redirect("panier/afficherPanier");
        // }

        //On crée un fonction pour supprimer des produits du panier
        Function SupprimerProduits($produits_a_supprimer)
        {
            //On crée un panier temporaire, dans lequel on "recopiera" le vrai panier sans les produits à supprimer. Ainsi, on évite d'avoir des entrées avec des valeurs égales à NULL, ce qui ferait bordélique. On crée un nouveau panier tout beau, tout propre.
            $panier_temporaire = array();
            $panier_temporaire['pro_id'] = array();
            $panier_temporaire['pro_prix'] = array();
            $panier_temporaire['pro_qte'] = array();
            
            //On parcoure le panier
            foreach($_SESSION['panier']['pro_id'] as $cle => $pro_id)
            {
                $toDelete = 0;
                for($i=0; $i<count($produits_a_supprimer); $i++)
                    if($id_produit == $produits_a_supprimer[$i])
                        $toDelete = 1;
                if($toDelete == 0) //Si apres parcours de tous les éléments du tableau on ne veut pas supprimer l'élément :
                { //pro_id pro_prix pro_qte
                    array_push ($panier_temporaire['pro_id'], $_SESSION['panier']['pro_id'][$cle]);
                    array_push ($panier_temporaire['pro_prix'], $_SESSION['panier']['pro_prix'][$cle]);
                    array_push ($panier_temporaire['pro_qte'], $_SESSION['panier']['pro_qte'][$cle]);
                }
            }
            
            $_SESSION['panier'] = $panier_temporaire; //On recopie le panier temporaire dans le vrai panier.
            
            unset($panier_temporaire); //On supprime le panier temporaire.
            redirect("panier/afficherPanier");

            //bon bah ca fonctionne pas . bonne nuit les copains , j'essai de pas bash mon reveil demain matin <3
        }
    }