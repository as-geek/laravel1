<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerResources extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'link'
    ];

    /**
     * Получить список всех партнёров
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function getListAll()
    {
        return static::query()
            ->orderBy('name')
            ->paginate(10);
    }

    /**
     * Получить партнёра
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getCardPartners(int $id)
    {
        return static::query()
            ->where('id', $id)
            ->get();
    }

    /**
     * Список рубрик
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getRubrics()
    {
        return static::query()
            ->select('description')
            ->groupBy('description')
            ->orderBy('id')
            ->get();
    }

    /**
     * Получить список новостей для рубрики
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getListByRubrics($rubrics)
    {
        return static::query()
            ->select('link')
            ->where('description', $rubrics)
            ->get();
    }
}
