<?php

class BDD
{
    // Propriétés privées pour stocker les informations de connexion à la base de données
    private $host = 'localhost'; // L'hôte de la base de données
    private $bddName = 'pdo'; // Le nom de la base de données
    private $user = 'root'; // Le nom d'utilisateur pour se connecter à la base de données
    private $pwd = ''; // Le mot de passe pour se connecter à la base de données

    // Propriété pour garder la connexion à la base de données
    protected $co = false;

    // Constructeur de la classe
    public function __construct()
    {
        // Si nous ne sommes pas déjà connectés à la base de données
        if (!$this->co) {
            try {
                // Établir une nouvelle connexion PDO à la base de données avec les informations fournies
                $this->co = new PDO('mysql:host=' . $this->host . ';dbname=' .
                    $this->bddName, $this->user, $this->pwd);

                // Définir l'attribut de gestion des erreurs pour PDO
                // PDO::ATTR_ERRMODE : rapport d'erreurs
                // PDO::ERRMODE_EXCEPTION : lancer une exception en cas d'erreur
                $this->co->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // En cas d'erreur, afficher le message d'erreur et arrêter le script
                die($e->getMessage());
            }
        }
    }

    // Méthode pour obtenir la connexion à la base de données
    public function getCo()
    {
        return $this->co;
    }
}
