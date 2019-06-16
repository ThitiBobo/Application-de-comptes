<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{

    private $id_depense;
    private $date_depense;
    private $montant;
    private $nom;
    private $description;
    private $fk_user;
    private $fk_nature_paiement;
    private $fk_categorie;
    private $nature_paiement;

    /**
     * @return mixed
     */
    public function getIdDepense()
    {
        return $this->id_depense;
    }

    /**
     * @param mixed $id_depense
     */
    public function setIdDepense($id_depense): void
    {
        $this->id_depense = $id_depense;
    }

    /**
     * @return mixed
     */
    public function getDateDepense()
    {
        return $this->date_depense;
    }

    /**
     * @param mixed $date_depense
     */
    public function setDateDepense($date_depense): void
    {
        $this->date_depense = $date_depense;
    }

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     */
    public function setMontant($montant): void
    {
        $this->montant = $montant;
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

    /**
     * @return mixed
     */
    public function getFkUser()
    {
        return $this->fk_user;
    }

    /**
     * @param mixed $fk_user
     */
    public function setFkUser($fk_user): void
    {
        $this->fk_user = $fk_user;
    }

    /**
     * @return mixed
     */
    public function getFkNaturePaiement()
    {
        return $this->fk_nature_paiement;
    }

    /**
     * @param mixed $fk_nature_paiement
     */
    public function setFkNaturePaiement($fk_nature_paiement): void
    {
        $this->fk_nature_paiement = $fk_nature_paiement;
    }

    /**
     * @return mixed
     */
    public function getFkCategorie()
    {
        return $this->fk_categorie;
    }

    /**
     * @param mixed $fk_categorie
     */
    public function setFkCategorie($fk_categorie): void
    {
        $this->fk_categorie = $fk_categorie;
    }

    private $categorie;

    public function getCategorie() : Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(Categorie $cat)
    {
        $this->categorie = $cat;
    }

    /**
     * @return mixed
     */
    public function getNaturePaiement() : Nature_paiement
    {
        return $this->nature_paiement;
    }

    /**
     * @param mixed $nature_paiement
     */
    public function setNaturePaiement(Nature_paiement $nature_paiement): void
    {
        $this->nature_paiement = $nature_paiement;
    }




}