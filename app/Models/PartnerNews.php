<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerNews extends Model
{
    protected $fillable = [
        'id',
        'title',
        'description',
        'link'
    ];

    /**
     * Удалить новости партнёров из БД
     *
     * @return mixed
     */
    public static function deletePartnerNews()
    {
        return static::truncate();
    }
}
