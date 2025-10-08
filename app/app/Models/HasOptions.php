<?php

namespace App\Models;

use Illuminate\Support\Collection;

/**
 * Model options trait.
 */
trait HasOptions
{
    /**
     * Returns model options as collection.
     *
     * @param bool $all All fields selection availability
     * @param string $fieldId Field identifier
     * @param string $fieldName Field name
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
            $options->prepend(__('All'), 0);
        }
        return $options;
    }
}
