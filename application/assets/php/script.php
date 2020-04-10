<?php

$nom = htmlspecialchars($_POST['nom']);
$errorNom = "";

$prenom = htmlspecialchars($_POST['prenom']);
$errorPrenom = "";

$sexe = htmlspecialchars($_POST['sexe']);
$errorSexe = "";

$date = htmlspecialchars($_POST['date']);
$errorDate = "";

$adress = htmlspecialchars($_POST['adress']);
$cp = htmlspecialchars($_POST['cp']);
$ville = htmlspecialchars($_POST['ville']);

$email = htmlspecialchars($_POST['email']);
$errorEmail = "";

$select = htmlspecialchars($_POST['select']);
$errorSelect = "";

$message = htmlspecialchars($_POST['message']);
$errorMessage = "";

$accepte = htmlspecialchars($_POST['accepte']);
$errorAccepte = "";

// $errorAdresse = "";
// $errorCp = "";
// $errorVille = "";

if (isset($_POST)){
    // Test for nom
    if (empty($nom))
    {
        $errorNom = "veuillez renseigner ce champs";
    }else if (!preg_match("/^[a-zâäàéèùêëîïôöçñ\-\s]+$/i", $nom)) {
        $errorNom = "Veuillez utiliser uniquement des lettres et tiret.";

    }else{
        $errorNom = "Tout est ok !";
        echo "Nom = $nom <br>";
    }
    // echo $errorNom ;   //permet d'afficher un message d'erreur si souhait&
    //Test for prenom
    if (empty($prenom))
    {
        $errorPrenom = "veuillez renseigner ce champs";
    }else if (!preg_match("/^[a-zâäàéèùêëîïôöçñ\-\s]+$/i", $prenom)) {
        $errorPrenom = "Veuillez utiliser uniquement des lettres et tiret.";
    }else{
        $errorPrenom= "Tout est ok !";
        echo "Prénom = $prenom <br>";
    }

    //test for sexe
    if (empty($sexe))
    {
        $errorSexe = "veuillez cochez une des deux cases.";
    }else{
        $errorSexe = "Tout est ok !";
        echo "sexe = $sexe <br>";
    }

    echo "Date de naissance = $date <br>";
    echo "Adresse = $adress <br>";
    echo "Code postal = $cp <br>";
    echo "Ville = $ville <br>";
    
    //test for E-mail
    if (empty($email))
    {
        $errorEmail = "Veuillez renseigner ce champs";
    }else if (!preg_match("/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/", $email)) {
        $errorEmail = "Veuillez entrez un E-mail valide.";
    }else{
        $errorEmail= "Tout est ok !";
        echo "E-mail = $email <br>";
    }

    //test for Select
    if ($select === "Selectionnez votre sujet")
    {
        $errorSelect = "Veuillez renseigner ce champs";
    }else{
        $errorSelect= "Tout est ok !";
        echo "Sujet = $select <br>";
    }

    // test for message
    
    if (empty($message))
    {
        $errorMessage = "Veuillez écrire un message.";
    }else{
        $errorMessage= "Tout est ok !";
        echo "Message = $message <br>";
    }
    
    // //test for accepte
    
    if (empty($accepte))
    {
        $erroraccepte = "Vous devez accepter les conditions avant de valider le formualire.";
    }else{
        $erroraccepte= "Tout est ok !";
        echo "Validation = $accepte";
    }
}
?>