<?php


namespace App\Models;


class ContactUs extends Model
{
    private $table = 'contact_us';
    private $fillable = ['name', 'email', 'message'];

    /**
     * @return array
     */
    public function getFillable(): array
    {
        return $this->fillable;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }
}