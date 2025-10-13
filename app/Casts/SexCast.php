<?php declare(strict_types=1);

namespace App\Casts;

use App\Enums\Sex as SexEnum;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

/**
 * Sex attribute cast.
 */
class SexCast implements CastsAttributes
{
    /**
     * Cast the stored value to a typed enum.
     *
     * @param Model $model Model instance
     * @param string $key Attribute key
     * @param mixed $value Attribute value
     * @param array $attributes Raw attributes
     * @return null|SexEnum
     */
    public function get(
        Model $model,
        string $key,
        mixed $value,
        array $attributes
    ): ?SexEnum
    {
        if ($value !== null) {
            return SexEnum::from((int) $value);
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
            'sex' => $value instanceof SexEnum ? (string) $value->value : (string) $value,
        ];
    }
}
