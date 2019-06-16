<?php


namespace App\Http\DAOs;


use App\Models\Categorie;
use DB;

class CategorieDAO extends DAO
{
    public function getAllCategories()
    {
        $catBD = DB::table('categorie')->get();

        $categories = array();

        foreach($catBD as $cat)
        {
            $idCat = $cat->id_categorie;
            $categories[$idCat] = $this->createModelObject($cat);
        }
        return $categories;
    }

    public function getCategorie($id)
    {
        return $this
            ->createModelObject
            (
                DB::table('categorie')
                    ->where('id_categorie', '=', $id)
                    ->first()
            );
    }

    public function getUsedCategoriesByUser()
    {
        $user = auth()->user();
        $userID = $user->getAuthIdentifier();

        $catBD = DB::select(DB::raw(
            'SELECT * FROM categorie WHERE id_categorie IN (SELECT DISTINCT fk_categorie FROM depense WHERE fk_user = '. $userID. ')'));

        $categories = array();
        foreach($catBD as $cat)
        {
            $idCat = $cat->id_categorie;
            $categories[$idCat] = $this->createModelObject($cat);
        }
        return $categories;
    }

    public function getUsedCategoriesByUserWithNameAsKey()
    {
        $user = auth()->user();
        $userID = $user->getAuthIdentifier();

        $catBD = DB::select(DB::raw(
            'SELECT * FROM categorie WHERE id_categorie IN (SELECT DISTINCT fk_categorie FROM depense WHERE fk_user = '. $userID. ')'));

        $categories = array();
        foreach($catBD as $cat)
        {
            $nomcat = $cat->nom;
            $categories[$nomcat] = $this->createModelObject($cat);
        }
        return $categories;
    }

    public function insertCustomCategory(Categorie $cat)
    {
        // on insérer la catégorie dans la table catégorie
        DB::table('categorie')
            ->insert
            ([
                "nom" => $cat->getNom(),
                "plafond" => $cat->getPlafond(),
                "description" => $cat->getDescription()
            ]);

        // on récupère l'id de la nouvelle catégorie
        $newDBCat = DB::table('categorie')->
            where('nom', '=', $cat->getNom())->
            where('plafond', '=', $cat->getPlafond())->
            where('description', '=', $cat->getDescription())->
            first();
        $idNewCat = $newDBCat->id_categorie;

        // on remplit la table categorie_custom
        DB::table('categorie_custom')
            ->insert
            ([
                "fk_categorie" => $idNewCat
            ]);

        $user = auth()->user();
        $idUser = $user->getAuthIdentifier();

        // on remplit la table categorie_custom_to_user
        DB::table('categorie_custom_TO_user')
            ->insert
            ([
                "fk_fk_categorie_custom" => $idNewCat,
                "fk_user" => $idUser
            ]);
    }


    protected function createModelObject(\stdClass $object)
    {
        $category = new Categorie();
        $category->setNom($object->nom);
        $category->setIdCategorie($object->id_categorie);
        $category->setPlafond($object->plafond);
        $category->setDescription($object->description);
        return $category;
    }
}