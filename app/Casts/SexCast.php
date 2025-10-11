<?php declare(strict_types=1);

namespace App\Casts;

use App\Enums\Sex as SexEnum;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

/**
 * Преобразователь пола.
 */
class SexCast implements CastsAttributes
{
    /**
     * Приводит значение к типу.
     *
     * @param Model $model Модель
     * @param string $key Ключ атрибута
     * @param mixed $value Значение атрибута
     * @param array $attributes Атрибуты
     * @return null|SexEnum
     */
    public function get(
        Model $model,
        string $key,
        mixed $value,
        array $attributes
    ): ?SexEnum
    {
        if (!is_null($value)) {
            return SexEnum::from((int) $value);
        }

        return null;
    }

    /**
     * Подготавливает значение для сохранения в БД.
     *
     * @param Model $model Модель
     * @param string $key Ключ атрибута
     * @param mixed $value Значение атрибута
     * @param array $attributes Атрибуты
     * @return array
     */
    public function set(
        Model $model,
        string $key,
        mixed $value,
        array $attributes
    ): array
    {
        return [
            'sex' => (string) ($value instanceof SexEnum) ? $value->value : $value,
        ];
    }
}
