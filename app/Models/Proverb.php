<?php


namespace App\Models;


/**
 * Class Proverb, retrieving a random proverb from
 * the database
 * @package App\Utils
 */
class Proverb
{
    private $id_proverbe;
    private $proverbe;
    private $source;
    private $annee_proverbe;

    /**
     * @return mixed
     */
    public function getAnneeProverbe()
    {
        return $this->annee_proverbe;
    }

    /**
     * @return mixed
     */
    public function getIdProverbe()
    {
        return $this->id_proverbe;
    }

    /**
     * @return mixed
     */
    public function getProverbe()
    {
        return $this->proverbe;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param mixed $annee_proverbe
     */
    public function setAnneeProverbe($annee_proverbe): void
    {
        $this->annee_proverbe = $annee_proverbe;
    }

    /**
     * @param mixed $id_proverbe
     */
    public function setIdProverbe($id_proverbe): void
    {
        $this->id_proverbe = $id_proverbe;
    }

    /**
     * @param mixed $proverbe
     */
    public function setProverbe($proverbe): void
    {
        $this->proverbe = $proverbe;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source): void
    {
        $this->source = $source;
    }
}