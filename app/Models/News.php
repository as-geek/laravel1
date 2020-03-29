<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'id',
        'title',
        'content',
        'rubrics_id',
        'publish_date'
    ];

    /**
     * Получить список новостей для рубрики
     * @param int $rubricsId
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getListNews(int $rubricsId)
    {
        return static::query()
            ->where('rubrics_id', $rubricsId)
            ->orderByDesc('publish_date')
            ->get();
    }

    /**
     * Получить новость
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getCardNews(int $id)
    {
        return static::query()
            ->where('id', $id)
            ->get();
    }

    /**
     * Связь с Rubrics
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rubrics()
    {
        return $this->belongsTo(Rubrics::class, 'rubrics_id');
    }

    /**
     * Связь с Comments
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comments::class, 'news_id');
    }

    /**
     * Получить список всех новостей
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function getListNewsAll()
    {
        return static::query()
            ->orderByDesc('publish_date')
            ->paginate(7);
    }
}
