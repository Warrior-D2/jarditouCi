<?php


if(isset($_GET['login'], $_GET['key'])){
    $login = urldecode($_GET['login']);
    $key = urldecode($_GET['key']);

    require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
    $db = connexionBase(); // Appel de la fonction de connexion

    $sql = " SELECT * FROM user where Login =:login";
    $result = $db->prepare($sql);
    $result->bindValue(':login', $login);
    $result -> execute();
    $userexist = $result-> rowCount();
    $user = $result->fetch();
    $result->closeCursor();

    if ($userexist == 1){
        // Verifie les nom, je suis pas sur
        if ($user->confirme == 0 && $user->confirmkey == $key){
            // ATTENTION JE SAIS PLUS COMMENT S'APPELLE TON BOOLEEN DANS TA TABLE, CHANGE LE NOM(si ca marche pas mets true)
            $sql = " UPDATE user SET confirme = 1 where Login =:login";
            $result = $db->prepare($sql);
            $result->bindValue(':login', $user->Login);
            $result -> execute();
            $result->closeCursor();
            echo "compte confirmé";
            header('Refresh: 3; URL=inscription.php'); // je rajoute un header location pour bien etre redirigé sur la page d'accueil du site et non sur la page login php si l'utilisateur est deja connu

        }
        else if($user->confirme == 1){
            echo "compte déja confirmé";
            header('Refresh: 3; URL=inscription.php'); // je rajoute un header location pour bien etre redirigé sur la page d'accueil du site et non sur la page login php si l'utilisateur est deja connu

        }
        else{
            echo "Mauvaise clef";
        }
    }

    else {
        echo "ce compte n'existe pas";
    }
}


?>


