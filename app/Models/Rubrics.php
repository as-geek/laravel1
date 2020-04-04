<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rubrics extends Model
{
    public static function getRubrics()
    {
        return static::query()
            ->orderBy('id')
            ->get();
    }

    public function news()
    {
        return $this->hasMany(News::class, 'rubrics_id');
    }
}
