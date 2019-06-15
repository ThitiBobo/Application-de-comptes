<?php


namespace App\Http\DAOs;


use App\Models\Proverb;
use DB;

class ProverbDAO extends DAO
{

    public function getRandomProverb() : Proverb
    {
        // db contains 14 proverbs
        $randomId = rand(1,14);
        $proverbeDB = DB::table('proverbe')->where('id_proverbe', '=', $randomId)->first();
        return $this->createModelObject($proverbeDB);
    }


    protected function createModelObject(\stdClass $object)
    {
        $prov = new Proverb();
        $prov->setIdProverbe($object->id_proverbe);
        $prov->setProverbe($object->proverbe);
        $prov->setSource($object->source);
        $prov->setAnneeProverbe($object->annee_proverbe);
        return $prov;
    }
}