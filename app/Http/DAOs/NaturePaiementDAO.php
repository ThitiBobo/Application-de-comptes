<?php


namespace App\Http\DAOs;

use DB;
use App\Models\Nature_paiement;

class NaturePaiementDAO extends DAO
{
    public function getAllNaturePaiement()
    {
        $naturesPaiementDB = DB::table('nature_paiement')->get();

        $natures = array();

        foreach($naturesPaiementDB as $nat)
        {
            $idNatPaiement = $nat->id_nature_paiement;
            $natures[$idNatPaiement] = $this->createModelObject($nat);
        }
        return $natures;
    }

    protected function createModelObject(\stdClass $object)
    {
        $naturePaiement = new Nature_paiement();
        $naturePaiement->setIdNaturePaiement($object->id_nature_paiement);
        $naturePaiement->setNom($object->nom);
        return $naturePaiement;
    }
}