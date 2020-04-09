<?php
include("assets/php/headerJarditou.php");



//Recupération des données
   $ProdId = htmlspecialchars($_POST['prodIDphoto']);
   $infosFile = pathinfo($_FILES['ImgPro']['name']);
   $extension = htmlspecialchars($infosFile[extension]);
   $tabExtension = ['jpg', 'png', 'jpeg'];
   $sizeImage = $_FILES['ImgPro']['size'];
   $sizeMax = $_POST['SizeImg']; //si besoin de modification de taille aller dans détails et changer la value dans le hidden
?>

<?php

$redirect = '/Applications/MAMP/htdocs/Jarditou3.0/assets/img/'; // Repertoire cible
$upload = $redirect.basename(htmlspecialchars($ProdId.".".$extension)); // Nom du fichier
if (move_uploaded_file ($_FILES['ImgPro']['tmp_name'] , $upload)) // upload du fichier et vérification de l'upload
{
   if (in_array($extension, $tabExtension)) // Verification de l'extension
   {
       if ($sizeImage > $sizeMax) // Verification de la taille de la photo
           echo "<p class='alert alert-danger h2 text-center mt-3'>ECHEC<br>Image trop volumineuse</p>";
       else
       {
           rename ('/Applications/MAMP/htdocs/Jarditou3.0/'.basename(htmlspecialchars($_FILES['ImgPro']['name'])), '/Applications/MAMP/htdocs/Jarditou3.0/assets/img/'.$ProdId.'.'.$extension);
           // Je renome la photo pour qu'elle corresponde à l'appel de son nom dans Produits.php
           echo "<p class='alert alert-warning h2'>Image ajouté avec succès.</p>";
// Requete SQL - Changement de l'extension dans la base de donnée
           $requete = 'UPDATE produits SET pro_photo="'.$extension.'" WHERE pro_id ='.$ProdId;
           $db->query($requete);
       }
   }
   else
       echo "<p class='alert alert-danger h3 mt-3'>Format non pris en charge</p>";
}
else
   echo "<p class='alert alert-danger h2 mt-3'>ECHEC DU CHARGEMENT";
?>

<?php
include("assets/php/footer.php")
?>
