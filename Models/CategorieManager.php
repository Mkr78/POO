<?php

// Inclusion de la classe "BDD" pour hériter de ses fonctionnalités de gestion de connexion
class CategorieManager extends BDD
{
    // Méthode pour récupérer toutes les catégories depuis la base de données
    public function findAll()
    {
        // Requête SQL pour sélectionner toutes les lignes de la table "categories"
        $sql = 'SELECT * FROM categories';

        // Préparation de la requête en utilisant la connexion PDO héritée de la classe "BDD"
        $select = $this->co->prepare($sql);

        // Exécution de la requête
        $select->execute();

        // Récupération de toutes les lignes résultantes et retour sous forme d'un tableau
        return $select->fetchAll();
    }
}
