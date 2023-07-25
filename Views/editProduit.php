<?php

// Inclusion des fichiers requis
require_once '../database/BDD.php';
require_once '../Models/CategorieManager.php';
require_once '../Models/ProduitManager.php';

// Création d'un objet "ProduitManager" pour gérer les opérations liées aux produits
$pm = new ProduitManager();

// Vérifier si l'identifiant du produit à modifier est présent dans la variable GET (dans l'URL)
if (isset($_GET['id'])) {
    // Récupérer le produit avec l'identifiant spécifié en utilisant la méthode "findOneById"
    $produit = $pm->findOneById($_GET['id']);

    // Vérifier si le produit a été trouvé (n'est pas vide)
    if (!empty($produit)) {
        // Si on a reçu le bouton submit du formulaire, c'est que le formulaire a été envoyé
        if (isset($_POST['ajouter'])) {
            // Vérifier si les champs du formulaire ont été correctement remplis
            if (
                isset($_POST['nom']) && !empty($_POST['nom']) && is_string($_POST['nom'])
                &&
                isset($_POST['description']) && !empty($_POST['description']) && is_string($_POST['description'])
                &&
                isset($_POST['categorie']) && !empty($_POST['categorie'])
            ) {
                // Appeler la méthode "update" du "ProduitManager" pour mettre à jour le produit avec les nouvelles valeurs
                $save = $pm->update($_POST['nom'], $_POST['description'], $_POST['categorie'], $_GET['id']);
                if ($save > 0) {
                    // Redirection vers la page principale (index.php) après la mise à jour réussie
                    header('Location: ../index.php');
                } else {
                    echo '<p>Une erreur est survenue durant la sauvegarde du produit</p>';
                }
            } else {
                echo "<p>Formulaire invalide</p>";
            }
        }
?>

        <!-- Formulaire de modification du produit avec les informations pré-remplies -->
        <form action="" method="POST">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="<?= $produit['nom']; ?>">
            <br>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4" cols="20"><?= $produit['description']; ?></textarea>
            <br>
            <label for="categorie">Catégorie</label>
            <select name="categorie" id="categorie">
                <?php
                // Création d'un objet "CategorieManager" pour gérer les opérations liées aux catégories
                $cm = new CategorieManager();
                // Récupération de toutes les catégories depuis la base de données en utilisant la méthode "findAll"
                $categories = $cm->findAll();
                foreach ($categories as $cat) {
                ?>
                    <!-- Affichage des options pour les catégories avec la catégorie associée pré-sélectionnée -->
                    <option value='<?= $cat['id']; ?>' <?php if ($cat['id'] == $produit['categorie_id']) {
                                                            echo 'selected';
                                                        } ?>>
                        <?= $cat['nom']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
            <br>
            <!-- Bouton de soumission du formulaire -->
            <input type="submit" name="ajouter" value="Modifier">
        </form>
<?php
    }
    // Si le produit n'est pas trouvé dans la base de données
    else {
        echo "<p>Produit introuvable</p>";
    }
}
// Si l'identifiant du produit à modifier n'est pas présent dans l'URL
else {
    echo "<p>Produit introuvable</p>";
}
