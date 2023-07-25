<?php

// Vérifier si les données requises ont été soumises via le formulaire en utilisant la méthode POST
if (
    isset($_POST['categorie']) && !empty($_POST['categorie']) && is_int($_POST['categorie']) &&
    isset($_POST['name']) && !empty($_POST['name']) && is_string($_POST['name']) &&
    isset($_POST['description']) && !empty($_POST['description']) && is_string($_POST['description'])
) {
    // Si les données sont valides, créer un nouvel objet "repositoryProduit" pour gérer l'insertion du produit
    $repositoryProduit = new repositoryProduit();

    // Appeler la méthode "create" de "repositoryProduit" pour insérer le nouveau produit dans la base de données
    $repositoryProduit->create($_POST['name'], $_POST['categorie'], $_POST['description']);

    // Après l'insertion réussie, le nouveau produit sera ajouté à la base de données.
 
}
