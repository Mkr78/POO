<?php

class Categorie
{
    // Propriétés privées de la classe
    private $id; // L'identifiant de la catégorie
    private $nom; // Le nom de la catégorie
    private ?string $description = ""; // La description de la catégorie (nullable, par défaut vide)
    private $categorieId; // L'identifiant de la catégorie parente (si applicable)

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

    // Méthode pour obtenir la description de la catégorie (peut être nulle)
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

    // Méthode pour obtenir l'identifiant de la catégorie parente
    public function getcategorieId(): int
    {
        return $this->categorieId;
    }

    // Méthode pour définir l'identifiant de la catégorie parente
    public function setcategorieId(int $categorieId): self
    {
        $this->categorieId = $categorieId;
        return $this;
    }
}
