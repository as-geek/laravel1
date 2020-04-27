<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = [
        'id',
        'name',
        'email',
        'is_admin'
    ];

    /**
     * Получить список всех пользователей
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function getListUsers()
    {
        return static::query()
            ->orderByDesc('created_at')
            ->paginate(7);
    }

    /**
     * Получить пользователя
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getUser($id)
    {
        return static::query()
            ->where('id', $id)
            ->get();
    }
}
