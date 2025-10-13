<?php declare(strict_types=1);

namespace App\Casts;

use App\Enums\GameRunStatus;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

/**
 * Game run status cast.
 */
class GameRunStatusCast implements CastsAttributes
{
    /**
     * Приводит значение к типу.
     *
     * @param Model $model Модель
     * @param string $key Ключ атрибута
     * @param mixed $value Значение атрибута
     * @param array $attributes Атрибуты
     * @return null|GameRunStatus
     */
    public function get(
        Model $model,
        string $key,
        mixed $value,
        array $attributes
    ): ?GameRunStatus
    {
        if ($value !== null) {
            return GameRunStatus::from((int) $value);
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
            'status' => (string) ($value instanceof GameRunStatus) ? $value->value : $value,
        ];
    }
}
