<?php 
	
if (!defined('BASEPATH')) exit('No direct script access allowed');
    
class Produits_model extends CI_Model
{
    public function liste()
    {
        $results = $this->db->query("SELECT * FROM produits");  
        $aListe = $results->result();   
        return $aListe;
    }

    public function ajouter($data)
    {
        return $this->db->insert('produits', $data);
    }

    public function modifier($data, $id)
    {
        $this->db->where('pro_id', $id );
        return $this->db->update('produits', $data); //génère et exécute une requête update, le tableau $data contient les paramètres de la requête.
    }

    public function supprimer($id)
    {
        $this->db->where('pro_id', $id);
        return $this->db->delete('produits');
    }

    public function categorie()
    {
        $resultats = $this->db->query("SELECT DISTINCT cat_nom, cat_id FROM categories LEFT JOIN produits ON cat_id = pro_cat_id");  
        $aCategories = $resultats->result();
        return $aCategories;
    }

    public function produitId($id)
    {
        $produit = $this->db->query("SELECT * FROM produits WHERE pro_id= ?", $id);
        $aView = $produit->row(); // première ligne du résultat
        return $aView ;
    }

    public function extension($id)
    {
        // requete pour récupérer l'extension dans la base dde données
        $result = $this->db->query("SELECT pro_photo from produits WHERE pro_id= ?", $id);
        //la requete nous renvoie un tableau
        $tab_extension = $result->row();
        //on récupere l'extension
        $extension = $tab_extension->pro_photo;
        return $extension;
    }
}     