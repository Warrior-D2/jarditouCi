<?php
include("assets/php/headerJarditou.php");

?>

<!-- <p>Affichage de la liste des enregistrements</p>  -->
<?php
    require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
    $db = connexionBase(); // Appel de la fonction de connexion
    $requete = "SELECT pro_id, pro_ref, pro_libelle, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_d_modif, pro_bloque  FROM produits ORDER BY pro_id ASC";
    $result = $db->query($requete);

    if (!$result)
    {
        $tableauErreurs = $db->errorInfo();
        echo $tableauErreur[2];
        die("Erreur dans la requête");
    }

    if ($result->rowCount() == 0)
    {
        // Pas d'enregistrement
        die("La table est vide");
    }


    echo "<table class='table mt-2'>";
        echo "<thead class='thead-light'>";
            echo "<tr>";
                echo "<th>Clé</th>";
                echo "<th>Référence du produit</th>";
                echo "<th>Nom du produit</th>";
                echo "<th>Prix</th>";
                echo "<th>Stock</th>";
                echo "<th>Couleur</th>";
                echo "<th>Extension Photo</th>";
                echo "<th>Date d'ajout</th>";
                echo "<th>Date de modification</th>";
                echo "<th>Bloqué</th>";
            echo "</tr>";
        echo "</thead>";

        echo "<tbody>";
            while ($row = $result->fetch(PDO::FETCH_OBJ))
            {
                echo"<tr>";
                echo"<td>".$row->pro_id."</td>";
                echo"<td>".$row->pro_ref."</td>";
                echo"<td><a href=\"fiche_produit.php?pro_id=".$row->pro_id."\" title=\"".$row->pro_libelle."\">".$row->pro_libelle."</a></td>";
                echo"<td>".$row->pro_prix."</td>";
                echo"<td>".$row->pro_stock."</td>";
                echo"<td>".$row->pro_couleur."</td>";
                echo"<td>".$row->pro_photo."</td>";
                echo"<td>".$row->pro_d_ajout."</td>";
                echo"<td>".$row->pro_d_modif."</td>";
                echo"<td>".$row->pro_bloque."</td>";
                echo"</tr>";
            }
        echo "</tbody>";
    echo "</table>";
?>


<?php
include("assets/php/footer.php")
?>
