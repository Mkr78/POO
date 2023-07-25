<?php

// Déclaration de la classe Categorie
class Categorie
{
    // Propriétés privées de la classe
    private $id; // L'identifiant de la catégorie
    private $nom; // Le nom de la catégorie
    private $description; // La description de la catégorie

    // Constructeur de la classe
    public function __construct($id, $nom, $description)
    {
        // Initialisation des propriétés de la classe avec les valeurs passées en paramètres
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
    }

    // Méthode pour obtenir l'identifiant de la catégorie
    public function getId(): int
    {
        return $this->id;
    }

    // Méthode pour obtenir le nom de la catégorie
    public function getNom(): string
    {
        return $this->nom;
    }

    // Méthode pour définir le nom de la catégorie
    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    // Méthode pour obtenir la description de la catégorie
    public function getDescription(): ?string
    {
        return $this->description;
    }

    // Méthode pour définir la description de la catégorie
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }
}
