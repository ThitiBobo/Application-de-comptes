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