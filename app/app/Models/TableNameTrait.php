<?php

namespace App\Models;

/**
 * Трейт имени таблицы.
 */
trait TableNameTrait
{
    /**
     * Возвращает имя таблицы.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        $class = static::class;
        return (new $class())->getTable();
    }
}
