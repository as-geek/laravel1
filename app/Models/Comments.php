<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'id',
        'name',
        'content',
        'news_id',
        'publish_date'
    ];

    /**
     * Получить комментарии для новости
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getCommentsToNews(int $id)
    {
        return static::query()
            ->join('news', 'comments.news_id', '=', 'news.id')
            ->select('comments.*')
            ->where('news.id', $id)
            ->orderByDesc('comments.publish_date')
            ->get();
    }

    /**
     * Связь с News
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }

    /**
     * Получить все комментарии
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function getCommentsAll()
    {
        return static::query()
            ->join('news', 'comments.news_id', '=', 'news.id')
            ->select('comments.*', 'news.title')
            ->orderByDesc('comments.publish_date')
            ->paginate(7);
    }

    /**
     * Получить комментарий
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getCommentsItem(int $id)
    {
        return static::query()
            ->where('id', $id)
            ->get();
    }
}
