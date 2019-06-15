<?php


namespace App\Models;


class Categorie
{
    private $id_categorie;
    private $nom;
    private $plafond;
    private $description;

    /**
     * @return mixed
     */
    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    /**
     * @param mixed $id_categorie
     */
    public function setIdCategorie($id_categorie): void
    {
        $this->id_categorie = $id_categorie;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPlafond()
    {
        return $this->plafond;
    }

    /**
     * @param mixed $plafond
     */
    public function setPlafond($plafond): void
    {
        $this->plafond = $plafond;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }


}