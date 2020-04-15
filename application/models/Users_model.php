<?php 
	
if (!defined('BASEPATH')) exit('No direct script access allowed');
    
class Users_model extends CI_Model
{
    public function inscription($data)
    {
        $this->db->insert('users', $data); //génère et exécute une requête insert, le tableau $data contient les paramètres de la requête.
    }

    public function connexion($emailForm)
    {
        $user = $this->db->query("SELECT * FROM users WHERE use_email= ?", $emailForm);
        
        return $aUser = $user->row(); // première ligne du résulta ;
    }
}