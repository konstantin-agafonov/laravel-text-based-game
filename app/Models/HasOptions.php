<?php

namespace App\Models;

use Illuminate\Support\Collection;

/**
 * Model options trait.
 * 
 * Provides functionality for generating option collections from models.
 */
trait HasOptions
{
    /**
     * Get model options as a collection.
     *
     * @param bool $all Whether to include an "All" option
     * @param string $fieldId The field to use as the key
     * @param string $fieldName The field to use as the value
     * @return Collection The options collection
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
