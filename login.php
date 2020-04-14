
<?php
session_start(); // on initialise la session

if (isset($_POST['submit']) || isset($_POST["submit1"]))  //on verifie si la variable est bien citée dans le if
{

    // on recupere les variables username et password si on fait un echo de $username ou  password on aura le nom qui s'affichera
    $email = (isset($_POST["submit"])) ? $_POST["email"] : $_POST["emaillog"]; // condition ternaire pour differencier les buttons submit du formulaire d'inscription et de connexion
    $pass = (isset($_POST["submit"])) ? $_POST["pass"] : $_POST["passlog"] ;
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $login = $_POST ["login"];

    require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
    $db = connexionBase(); // Appel de la fonction de connexion

    // on fait notre requete pour recuperer les informations sur l'utilisateur dans la base de données
    $sql = " SELECT * FROM user where email =:email  OR Login =:email";
    $result = $db->prepare($sql);
    $result->bindValue(':email', $email);
    $result -> execute();
    $data = $result->fetch(); // je crée une variable data avec un fetchAll pour verifier le mot de passe
    $result->closeCursor();
    if ($data) //on va tester si on a un enregistrement dans la base de données
    {
// pour eviter qu'un uilisateur se connecte plusieurs fois avec le meme nom/pseudo on procede comme suit
        if (password_verify($pass, $data->password)) //verification si le mot de passe de l'utilisateur est le meme que dans la base de données
        {
            echo "connexion done";
            $_SESSION['email'] = $data->email; // on enregistre une variable de session qui va nous servir a dire aux autres pages du site qu'un utilisateur est bien connecté
            $_SESSION['login'] = $data->Login; // on enregistre une variable de session qui va nous servir a dire aux autres pages du site qu'un utilisateur est bien connecté
            $_SESSION ['verif']= $data->confirme;


            //$_SESSION["auth"] = 'ok';
            if ($data->role_utilisateur == 1 ) // vérifier role dans la base de données
            {

                $_SESSION["role"] = "admin";
            }else
            {
                $_SESSION["role"] = "utilisateur";
            }
            header('Refresh: 3; URL=../views/inscription.php'); // je rajoute un header location pour bien etre redirigé sur la page d'accueil du site et non sur la page login php si l'utilisateur est deja connu



        }
        else
        {
            echo "wrong pass";
        }
    }

    else

    {
        // dans le cas ou il y a pas d'utilisateur on va hashé le password
        $pass_insert = password_hash($pass, PASSWORD_DEFAULT);
        // on insere un nouvel utilisateur dans la base de données via cette requete
        $key = "";
        $longueurKey = 15;
        for ($i = 1; $i < $longueurKey; $i++){
            $key .= mt_rand(0, 9);


        $array_user = array(
            ':email' => $email,
            ':pwd' => $pass_insert,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':login' => $login,
            ':confirmkey'=> $key

        );


        }


        $sql ="INSERT INTO user (email, password, Nom, prenom,Login, confirmkey) VALUES (:email, :pwd, :nom, :prenom, :login, :confirmkey)";
        $req =$db->prepare($sql);
//        $result -> bindValue(':email', $email);
//        $result ->bindValue(':pwd', $pwd);
 //       $result->bindValue(':nom', $nom);
        $req->execute($array_user);
        $req->closeCursor();
        echo "Registery Done"; //message qui va s'afficher si on a une nouvelle entrée dans la base de données'

        $aHeaders = array('MIME-Version' => '1.0',
            'Content-Type' => 'text/html; charset=utf-8',
            'From' => 'Jarditou config <misterr.claude@gmail.com>',
            'Reply-To' => 'Claude Kingue <claudekingue@yahoo.com>',
            'X-Mailer' => 'PHP/' . phpversion()

        );

        // include du mail en html
        include_once 'mail.php';
        mail($array_user[':email'], 'Jarditou Config - confirmation de compte', $message, $aHeaders);
        header('Refresh: 3; URL=../views/inscription.php'); // je rajoute un header location pour bien etre redirigé sur la page d'accueil du site et non sur la page login php si l'utilisateur est deja connu

        }


}


?>