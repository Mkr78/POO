<?php

// Inclusion de la classe "BDD" pour hériter de ses fonctionnalités de gestion de connexion
class repositoryProduit extends BDD
{
    // Méthode pour créer un nouveau produit dans la base de données
    public function create(string $nom, int $categorieId, ?string $description = null)
    {
        // Requête SQL pour insérer un nouveau produit avec les valeurs fournies
        $sql = 'INSERT INTO produits(nom, description, categorie_id) VALUES (:n, :d, :id)';

        // Préparation de la requête en utilisant la connexion PDO héritée de la classe "BDD"
        $req = $this->co->prepare($sql);

        // Exécution de la requête avec les valeurs fournies en paramètres
        $req->execute([
            'n' => $nom,
            'd' => $description,
            'id' => $categorieId
        ]);

        // Affichage du nombre de lignes affectées par l'insertion (généralement 1 si l'insertion réussit)
        echo $req->rowCount();
    }
}
