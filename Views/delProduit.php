<?php

// Inclusion des fichiers requis
require_once '../database/BDD.php';
require_once '../Models/ProduitManager.php';
require_once '../Models/CategorieManager.php';

// Vérifier si l'identifiant du produit à supprimer est présent dans la variable GET (dans l'URL)
if (isset($_GET['id'])) {
    // Création d'un objet "ProduitManager" pour gérer les opérations liées aux produits
    $pm = new ProduitManager();

    // Appel de la méthode "delete" du "ProduitManager" pour supprimer le produit avec l'identifiant spécifié
    $delete = $pm->delete($_GET['id']);

    // Vérifier si la suppression a été effectuée avec succès
    if ($delete > 0) {
        // Redirection vers la page principale (index.php) après la suppression réussie
        header('Location: ../index.php');
    } else {
        // Affichage d'un message d'erreur si la suppression a échoué
        echo '<p>Une erreur est survenue lors de la suppression du produit</p>';
    }
} else {
    // Affichage d'un message si l'identifiant du produit à supprimer n'est pas présent dans l'URL
    echo '<p>Produit introuvable</p>';
}
