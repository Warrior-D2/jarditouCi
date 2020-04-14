<?php
include("assets/php/headerJarditou.php");

require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion


    ?>

    <h1 class="center-align">Administration</h1>
    <form class="container section" action="gestion.php" method="post">
       <select class="custom-select" name="role_util">

           <?php
           $sql= 'select email from user ';
           $result = $db->query($sql);
           $result -> execute();

           while($email=$result->fetch(PDO::FETCH_OBJ)) {
               if($email->email == $_SESSION['email'])
               {

                  echo '<option value="selection"> selectionner un utilisateur</option>';


               }
               else{
                   echo '<option value="'.$email->email.'">'.$email->email.'</option>';

               }

           }
           ?>

       </select>

        <select class="custom-select" name="role_nom">
            <option value="selection" > Selectionner un rôle</option>
            <option value="0"> Utilisateur</option>
            <option value="1"> Administrateur</option>

        </select>
        <div class="section center-align">

            <button class="btn waves-effect waves-light blue" type="submit" name="upgrade_admin">Promouvoir
                <i class="material-icons right">rowing</i>
            </button>
            <button class="btn waves-effect waves-light red" type="submit" name="delete_user">Supprimer
                <i class="material-icons right">delete</i>
            </button>
        </div>
    </form>
