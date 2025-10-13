<?php declare(strict_types=1);

namespace App\Modules\Play\Casts;

use App\Modules\Play\Enums\GameStatus;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

/**
 * Game status cast.
 */
class GameStatusCast implements CastsAttributes
{
    /**
     * Cast the stored value to a typed enum.
     *
     * @param Model $model Model instance
     * @param string $key Attribute key
     * @param mixed $value Attribute value
     * @param array $attributes Raw attributes
     * @return null|GameStatus
     */
    public function get(
        Model $model,
        string $key,
        mixed $value,
        array $attributes
    ): ?GameStatus
    {
        if ($value !== null) {
            return GameStatus::from((int) $value);
        }

        return null;
    }

    /**
     * Prepare the value for storage in the database.
     *
     * @param Model $model Model instance
     * @param string $key Attribute key
     * @param mixed $value Attribute value
     * @param array $attributes Raw attributes
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
            'status' => $value instanceof GameStatus ? (string) $value->value : (string) $value,
        ];
    }
}
