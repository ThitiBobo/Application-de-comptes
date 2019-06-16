<?php


namespace App\Http\DAOs;

use DB;
use App\Models\Depense;


class DepenseDAO extends DAO
{

    public function getAllDepensesOfUser() : array
    {
        $user = auth()->user();
        $userId = $user->getAuthIdentifier();
        return $this->createArrayDepenses(DB::table('depense')->where('fk_user', '=', $userId)->get());
    }


    private function createArrayDepenses($databaseRecords) : array
    {
        $depenses = array();

        foreach($databaseRecords as $depenseDB)
        {
            $idDep = $depenseDB->id_depense;
            $depenses[$idDep] = $this->createModelObject($depenseDB);
        }
        return $depenses;
    }

    public function getAllDepensesOfUserAscDsc($ascending) : array
    {
        $depensesDB = null;
        if($ascending == true)
        {
            // croissant
            $depensesDB = DB::table('depense')
                ->orderBy('montant', 'ASC')
                ->get();
        }
        else
        {
            // décroissant
            $depensesDB = DB::table('depense')
                ->orderBy('montant', 'DESC')
                ->get();
        }
        return $this->createArrayDepenses($depensesDB);
    }



    public function createDepense(Depense $depense) : void
    {
        DB::table('depense')
            ->insert
            ([
                "date_depense" => $depense->getDateDepense(),
                "montant" => $depense->getMontant(),
                "nom" => $depense->getNom(),
                "description" => $depense->getDescription(),
                "fk_user" => $depense->getFkUser(),
                "fk_nature_paiement" => $depense->getFkNaturePaiement(),
                "fk_categorie" => $depense->getFkCategorie()
            ]);
    }

    public function getAllDepensesOfMonth()
    {
        $depensesDB = DB::select(DB::raw('select * from depense where MONTH(date_depense) = MONTH(CURRENT_DATE()) AND YEAR(date_depense) = YEAR(CURRENT_DATE());'));
        return $this->createArrayDepenses($depensesDB);

    }

    public function getAllDepensesOfYear()
    {
        $depensesDB = DB::select(DB::raw('select * from depense where YEAR(date_depense) = YEAR(CURRENT_DATE());'));
        return $this->createArrayDepenses($depensesDB);
    }


    protected function createModelObject(\stdClass $object)
    {
        $depense = new Depense();
        $depense->setIdDepense($object->id_depense);
        $depense->setDateDepense($object->date_depense);
        $depense->setMontant($object->montant);
        $depense->setNom($object->nom);
        $depense->setDescription($object->description);
        $depense->setFkUser($object->fk_user);
        $depense->setFkNaturePaiement($object->fk_nature_paiement);
        $depense->setFkCategorie($object->fk_categorie);

        //récupérer la nature paiement (naturepaiementdao)
        $naturePaiementDAO = new NaturePaiementDAO();
        $naturePaiement = $naturePaiementDAO->getNaturePaiement($depense->getFkNaturePaiement());
        $depense->setNaturePaiement($naturePaiement);

        //récupérer la catégorie (catégorieDAO)
        $categorieDAO = new CategorieDAO();
        $categorie = $categorieDAO->getCategorie($depense->getFkCategorie());
        $depense->setCategorie($categorie);
        return $depense;
    }
}