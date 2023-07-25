<?php

// Inclusion de la classe "BDD" pour hériter de ses fonctionnalités de gestion de connexion
class ProduitManager extends BDD
{
    // Méthode pour récupérer tous les produits depuis la base de données
    public function findAll()
    {
        // Requête SQL pour sélectionner toutes les lignes de la table "produits"
        $sql = 'SELECT * FROM produits';

        // Préparation de la requête en utilisant la connexion PDO héritée de la classe "BDD"
        $select = $this->co->prepare($sql);

        // Exécution de la requête
        $select->execute();

        // Récupération de toutes les lignes résultantes et retour sous forme d'un tableau
        return $select->fetchAll();
    }

    // Méthode pour récupérer tous les produits avec leurs catégories associées depuis la base de données
    public function findAllWithCategory()
    {
        // Requête SQL pour sélectionner les produits avec les noms des catégories associées (utilisation d'une jointure)
        $req = $this->co->prepare("
            SELECT p.id, p.nom, p.description, c.nom AS categories 
            FROM produits AS p
            INNER JOIN categories AS c ON p.categorie_id = c.id
        ");
        $req->execute();

        // Récupération de toutes les lignes résultantes et retour sous forme d'un tableau associatif
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour récupérer un produit en fonction de son identifiant
    public function findOneById(int $id)
    {
        // Requête SQL pour sélectionner un produit avec l'ID spécifié
        $sql = 'SELECT * FROM produits WHERE id = :id';

        // Préparation de la requête en utilisant la connexion PDO héritée de la classe "BDD"
        $select = $this->co->prepare($sql);

        // Exécution de la requête avec la valeur de l'ID fournie en paramètre
        $select->execute(['id' => $id]);

        // Récupération du produit résultant et retour
        return $select->fetch();
    }

    // Méthode pour sauvegarder un nouveau produit dans la base de données
    public function save(string $nom, string $description, int $categorie)
    {
        // Requête SQL pour insérer un nouveau produit avec les valeurs fournies
        $sql = 'INSERT INTO produits(nom, description, categorie_id) VALUES (:n, :d, :c)';

        // Préparation de la requête en utilisant la connexion PDO héritée de la classe "BDD"
        $insert = $this->co->prepare($sql);

        // Exécution de la requête avec les valeurs fournies en paramètres
        $insert->execute([
            'n' => $nom,
            'd' => $description,
            'c' => $categorie
        ]);

        // Renvoi du nombre de lignes affectées par l'insertion (généralement 1 si l'insertion réussit)
        return $insert->rowCount();
    }

    // Méthode pour mettre à jour un produit existant dans la base de données
    public function update(string $nom, string $description, int $categorie, int $id)
    {
        // Requête SQL pour mettre à jour un produit avec les valeurs fournies en fonction de son ID
        $sql = 'UPDATE produits SET nom = :n, description = :d, categorie_id = :cat WHERE id = :id';

        // Préparation de la requête en utilisant la connexion PDO héritée de la classe "BDD"
        $update = $this->co->prepare($sql);

        // Exécution de la requête avec les valeurs fournies en paramètres
        $update->execute([
            'n' => $nom,
            'd' => $description,
            'cat' => $categorie,
            'id' => $id
        ]);

        // Renvoi du nombre de lignes affectées par la mise à jour (généralement 1 si la mise à jour réussit)
        return $update->rowCount();
    }

    // Méthode pour supprimer un produit de la base de données en fonction de son identifiant
    public function delete(int $id)
    {
        // Requête SQL pour supprimer un produit avec l'ID spécifié
        $sql = 'DELETE FROM produits WHERE id = :id';

        // Préparation de la requête en utilisant la connexion PDO héritée de la classe "BDD"
        $delete = $this->co->prepare($sql);

        // Exécution de la requête avec la valeur de l'ID fournie en paramètre
        $delete->execute(['id' => $id]);

        // Renvoi du nombre de lignes affectées par la suppression (généralement 1 si la suppression réussit)
        return $delete->rowCount();
    }
}
