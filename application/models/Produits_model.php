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
}     