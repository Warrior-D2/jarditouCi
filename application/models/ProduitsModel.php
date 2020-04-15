<?php

	if (!defined('BASEPATH')) exit('No direct script access allowed');
	 
	class ProduitsModel extends CI_Model
	{
		  public function liste() 
		  {
				$this->load->database();
				$requete = $this->db->query("SELECT * FROM produits");
				$aProduits = $requete->result();  
	 
				return $aProduits;            
		  } // -- liste()    
		
		public function ajouter($data)
		{
			return $this->db->insert('produits',$data)
		}
	} // -- ProduitsModel
?>