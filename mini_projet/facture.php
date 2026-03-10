<?php
session_start();
?>
<h2>Facture</h2>
<a href="index.php" class="index-link">Retour à la boutique</a>
<link rel="stylesheet" href="style.css">

<table border="1">
    <tr>
        <th>Produit</th>
        <th>Quantité</th>
        <th>Prix</th>
        <th>Total</th>
    </tr>

    <?php
    $total = 0;
    foreach ($_SESSION["panier"] as $item) {
        $sousTotal = $item["quantite"] * $item["prix"];
        $total += $sousTotal;
    ?>
        <tr>
            <td><?= $item["nom"] ?></td>
            <td><?= $item["quantite"] ?></td>
            <td><?= $item["prix"] ?></td>
            <td><?= $sousTotal ?></td>
        </tr>
    <?php } ?>

    <tr>
        <td colspan="3">Total</td>
        <td><?= $total ?></td>
    </tr>
</table>