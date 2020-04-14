<?php
include("assets/php/headerJarditou.php");


?>
<!-- Requete SQL -->
<?php
  require "connexion_bdd.php";
  $db = connexionBase();
  $idProduit = $_GET['DeleteButton'];
  $requete = "DELETE FROM produits WHERE pro_id = $idProduit";
  $result = $db->query($requete);
  verifObj($result);
?>
<!-- ******************************DELETE*********************************** -->
<h1 class="mt-4">Produit nº<?php echo $idProduit;?> supprimé</h1>

<?php
include("assets/php/footer.php")
?>
