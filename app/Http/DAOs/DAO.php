<?php


namespace App\Http\DAOs;


use Illuminate\Database\Eloquent\Model;

abstract class DAO extends Model
{
    protected abstract function createModelObject(\stdClass $object);
}