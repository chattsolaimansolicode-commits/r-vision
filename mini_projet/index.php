<?php
session_start();

$produits = [
    ["nom" => "Téléphone", "prix" => 3500, "stock" => 5],
    ["nom" => "Casque", "prix" => 400, "stock" => 10],
    ["nom" => "Tablette", "prix" => 2800, "stock" => 8]
];

if (!isset($_SESSION["stock"])) {
    $_SESSION["stock"] = array_column($produits, "stock");
}
if (!isset($_SESSION["panier"])) {
    $_SESSION["panier"] = [];
}

$message = "";

if (isset($_POST["acheter"])) {

    $index = $_POST["produit"];
    $qte = (int)$_POST["quantite"];
    // Check against SESSION stock, not the hardcoded array

    if ($qte <= $_SESSION["stock"][$index]) {

        $_SESSION["panier"][] = [
            "nom" => $produits[$index]["nom"],
            "quantite" => $qte,
            "prix" => $produits[$index]["prix"]
        ];
        $_SESSION["stock"][$index] -= $qte;

        $message = "Produit ajouté au panier";
    } else {
        $message = "Stock insuffisant";
    }
}
?>
<link rel="stylesheet" href="style.css">

<h2>Boutique</h2>

<form method="POST">

    <select name="produit">

        <?php foreach ($produits as $i => $p) { ?>

            <option value="<?= $i ?>">
                <?= $p["nom"] ?> - <?= $p["prix"] ?> MAD
                (Stock: <?= $_SESSION["stock"][$i] ?>)
            </option>


        <?php } ?>

    </select>

    <input type="number" name="quantite" min="1">

    <button name="acheter">Acheter</button>

</form>

<p><?= $message ?></p>

<h3>Panier</h3>

<table border="1">
    <tr>
        <th>Produit</th>
        <th>Quantité</th>
        <th>Prix</th>
    </tr>

    <?php foreach ($_SESSION["panier"] as &$item) { ?>

        <tr>
            <td><?= $item["nom"] ?></td>
            <td><?= $item["quantite"] ?></td>
            <td><?= $item["prix"] ?></td>
        </tr>

    <?php } ?>

</table>

<br>
<a href="facture.php">Voir facture</a>