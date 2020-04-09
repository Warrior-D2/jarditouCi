<!DOCTYPE html>

<html lang="fr">

<body>

<h1> Excercice 1 </h1>

<h3><i>Affichez la date du jour au format mardi 2 juillet 2019.</i></h3>

<?php

$date = new DateTime();

// récupératin des valeurs de la date courante
$dayName = $date->format('j'); //=> récupération du numéro du jour de la semaine (1 => lundi, ...., 7 => dimanche)
$dayNumber = $date->format('N'); // => récupération du numéro du jour dans le mois
$year = $date->format('Y'); // récupération de l'année
$monthName = $date->format('n'); // => // Numéro du mois, sans 0 initial
// tableau des jours, première valeur vide
$dayList = ['', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
// Attention, 1 à 12, donc un vide au début pour la position 0
$monthList = ['', 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
?>

 <!-- affichage du résultat en HTML -->
<p>Aujourd'hui nous sommes le <?= $dayList[$dayNumber] . " " . $dayName . " " . $monthList[$monthName] . " " . $year ?></p>



<h1> Excercice 2 </h1>

<h3><i>Trouvez le numéro de semaine de la date suivante : 14/07/2019.</i></h3>

<?php


$date = new DateTime('2019-07-14'); // je passe la date voulue en parametre
$weekNumber = $date->format('W'); // récupération du numéro de semaine selon la date passée en paramêtre de la classe DateTime
?>

    <p>La date 14/07/2019 se situe dans la semaine n°: <?= $weekNumber ?></p>

<h1> Excercice 3 </h1>

<h3><i>Combien reste-t-il de jours avant la fin de votre formation.</i></h3>

</div>
     <?php
    // j'initie un premier objet DateTime pour récupérer la date actuelle
$debutDate = new DateTime();
// j'initie un second objet DateTime pour récupérer la date de fin (passer en paramètre
$finDate= new DateTime('2020-08-01');
// calcul de la différence entre les 2 dates
$numberOfDays = $debutDate->diff($finDate);


?>
    <p>Il reste <?= $numberOfDays->days ?> jours avant votre fin de formation le 01/08/2020.</p>


    <h1> Excercice 4 </h1>

    <h3><i>Reprenez l'exercice 3, mais traitez le problème avec les fonctions de gestion du timestamp, time() et mktime().</i></h3>
<?php
$today=time();
$finDate = Mktime('2020-08-01');

echo date('m/d/Y', $today);
echo date('m/d/Y', $finDate);

 ?>

 <h1> Excercice 5 </h1>

 <h3><i>Quelle sera la prochaine année bissextile ?</i></h3>
<?php
 $date = new DateTime();

     // début de la boucle parcourant les 4 prochaines années
     for ($i = 0; $i < 4; $i++)
     {
         // on ajout un an à chaque tour
         $date->modify('+1 years');

         if ($date->format('L') == 1) // si la fonction retourne 1
         {
             ?>

             <p>
                L'année <?= $date->format('Y') ?> sera la prochaine année bissextile.
             </p>
             <?php
         }
     }
     ?>





































</html>
