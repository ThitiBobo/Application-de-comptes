<?php


namespace App\Http\Utils;


use App\Http\DAOs\ProverbDAO;
use App\Models\Proverb;
use DB;

class Utilities
{
    public static function getRandomProverb() : Proverb
    {
        $dao = new ProverbDAO();
        return $dao->getRandomProverb();
    }

    public static function cleanString($str)
    {
        return str_replace("&", "et", $str);
    }
}