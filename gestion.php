<?php

require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion
$email = $_POST['role_util'];
$role = $_POST['role_nom'];
echo "phrase bateau N° 756";


// Suppression d'un ulisateur
 function delete_user($email)
{
    var_dump($email);
$requete = 'DELETE FROM user WHERE email=:email ';
$db = connexionBase();
$result = $db->prepare($requete);
$result->bindValue(':email',$email);
$result->execute();
$result->closeCursor();
}


// Passage d'un utilisateur en Admin
 function upgrade_admin($email, $role)
{
$requete = 'UPDATE user SET role_utilisateur =:role_nom  WHERE email =:email ';
$db=connexionBase();
$result = $db->prepare($requete);
$result->bindValue(':email',$email);
$result->bindValue(':role_nom', $role);
$result->execute();
$result->closeCursor();
}




if(isset($_POST['delete_user']) && $_POST['role_util']!= "selection"){
delete_user($email);
echo "utilisateur supprimé";
    header('Refresh: 1; URL=gestion_admin.php');
}
else if (isset($_POST['upgrade_admin'])&& $_POST['role_nom']!= "selection") {

upgrade_admin($email, $role);
echo "utilisateur promu";
    header('Refresh: 1; URL=gestion_admin.php');
}
else {

    echo "AMC THE WALKING DEAD";
header('Location:gestion_admin.php');
}



?>