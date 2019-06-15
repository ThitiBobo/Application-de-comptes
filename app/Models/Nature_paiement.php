<?php


namespace App\Models;


class Nature_paiement
{
    private $id_nature_paiement;
    private $nom;

    /**
     * @return mixed
     */
    public function getIdNaturePaiement()
    {
        return $this->id_nature_paiement;
    }

    /**
     * @param mixed $id_nature_paiement
     */
    public function setIdNaturePaiement($id_nature_paiement): void
    {
        $this->id_nature_paiement = $id_nature_paiement;
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



}