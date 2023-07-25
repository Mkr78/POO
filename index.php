<?php

// Inclusion des fichiers nécessaires
require_once './database/BDD.php';
require_once './Models/CategorieManager.php';
require_once './Models/ProduitManager.php';

// Création d'un gestionnaire de catégories
$cm = new CategorieManager();
// Récupération de toutes les catégories
$categories = $cm->findAll();

// Création d'un gestionnaire de produits
$pm = new ProduitManager();

// Vérification si le bouton "Ajouter" a été soumis via le formulaire
if (isset($_POST['ajouter'])) {
    // Vérification des champs du formulaire
    if (
        isset($_POST['nom']) && !empty($_POST['nom']) && is_string($_POST['nom'])
        &&
        isset($_POST['description']) && !empty($_POST['description']) && is_string($_POST['description'])
        &&
        isset($_POST['categorie']) && !empty($_POST['categorie'])
    ) {
        // Sauvegarde du produit dans la base de données via le gestionnaire de produits
        $save = $pm->save($_POST['nom'], $_POST['description'], $_POST['categorie']);
        // Affichage du message en fonction du résultat de la sauvegarde
        if ($save > 0) {
            echo '<p>Produit ajouté</p>';
        } else {
            echo '<p>Une erreur est survenue durant la sauvegarde du produit</p>';
        }
    } else {
        echo "<p>Formulaire invalide</p>";
    }
}

// Récupération de tous les produits
$produits = $pm->findAll();

// Récupération de tous les produits avec leurs catégories associées
$pm = new ProduitManager();
$produits = $pm->findAllWithCategory();

// Affichage des produits s'il y en a
if (empty($produits)) {
    echo '<p>Il n\'y a aucun produit</p>';
} else {
    foreach ($produits as $p) {
        echo "<h2>" . $p['nom'] . "</h2>";
        echo "<p>" . $p['description'] . "</p>";
        echo "<p>Produit dans la catégorie suivante: " . $p['categories'] . "</p>";
        echo "<p><a href='Views/editProduit.php?id=" . $p['id'] . "'>Modifier</a></p>";
        echo "<p><a href='Views/delProduit.php?id=" . $p['id'] . "'>Supprimer</a></p>";
        echo "<hr>";
    }
}



?>
<!DOCTYPE html>
<html>
<head>
    <!-- Inclusion de la police Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Styles CSS pour la mise en forme du formulaire -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding: 20px;
            background-color: #f2f2f2;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Formulaire pour ajouter un nouveau produit -->
    <form action="" method="POST">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="categorie">Catégorie</label>
            <select name="categorie" id="categorie">
                <!-- Affichage des options de catégories récupérées plus tôt -->
                <?php
                foreach ($categories as $cat) {
                    echo "<option value='" . $cat['id'] . "'>" . $cat['nom'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="ajouter" value="Ajouter">
        </div>
    </form>
</body>
</html>
