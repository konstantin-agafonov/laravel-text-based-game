<?php

namespace App\Models;

use Illuminate\Support\Collection;

/**
 * Трейт параметров модели.
 */
trait HasOptions
{
    /**
     * Возвращает параметры модели в виде коллекции.
     *
     * @param bool $all Наличие выбора всех полей
     * @param string $fieldId Индефикатор поле
     * @param string $fieldName Название поле
     * @return Collection
     */
    public static function options(
        bool $all = false,
        string $fieldId = 'id',
        string $fieldName = 'name'
    ): Collection
    {
        $options = self::all()->pluck($fieldName, $fieldId);
        if ($all) {
            $options->prepend(__('Все'), 0);
        }
        return $options;
    }
}
