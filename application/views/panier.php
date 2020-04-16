<?php
$title ='Jarditou : Panier';
?>

<?php ob_start(); ?>

    <h1>Mon panier</h1>
    
    <?php 
    // Si le panier n'existe pas encore  
    if ($this->session->panier != null) 
    { 
    ?>
        <div class="row">
            <div class="col-12"> 
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Prix total</th>
                            <th>&nbsp;</th> 
                        </tr>   
                    </thead>
                    <tbody>
                    

                    <!-- /* ici, écrire le code pour afficher les produits mis dans le panier...
                    * ... oh oh oh! ça sent la boucle...  
                    * n'oubliez pas de calculer le total,
                    * ni d'ajouter de mettre un champ de type number pour augmenter/diminuer la quantité d'un produit
                    */ -->
                    
                    <?php $iTotal = 0; 
                    $panier = $this->session->panier;
                    foreach($panier as $row)
                    { ?>
                        <tr>
                            <td><?= $row['pro_libelle']; ?></td>
                            <td><?= $row['pro_prix'] ;?></td>
                            <td>
                                <a href="<?= site_url('panier/diminiuerQuantite/'.$row['pro_id']); ?>"><i class="fas fa-minus-circle"></i></a>
                                <?= $row['pro_qte']; ?>
                                <a href="<?= site_url('panier/augmenterQuantite/'.$row['pro_id']); ?>"><i class="fas fa-plus-circle"></i></a>
                                <a href="<?= site_url('panier/supprimerProduit/'.$row['pro_id']); ?>"><i class="fas fa-skull-crossbones"></i></a>
                            </td>
                            <td> <?= $totalRow = $row['pro_prix']*$row['pro_qte']; ?></td>
                        </tr>
                        <?php $iTotal += $totalRow; ?>
                    <?php 
                    }
                    ?>

                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <h3 class="text-center">Récapitulatif</h3>
                <div>
                    <p class="text-center">TOTAL : <?= str_replace('.', ',' , $iTotal); ?> &euro;</p>
                    <p>Supprimer le panier : <a href="<?= site_url('panier/supprimerPanier'); ?>"><i class="fas fa-skull-crossbones"></i></a></p>
                    <p><a href="<?= site_url("produits/liste"); ?>">Retour liste des produits</a></p>
                </div>
            </div>
        </div>
        <?php 
    }
    else 
    { 

        ?>
        <div class="alert alert-danger">Votre panier est vide. Pour le remplir, vous pouvez consulter 
        <a href="<?= site_url("produits/liste"); ?>">la liste des produits</a>.</div>
        <?php 
    } 

    $content = ob_get_clean(); 

    require('template.php'); 

