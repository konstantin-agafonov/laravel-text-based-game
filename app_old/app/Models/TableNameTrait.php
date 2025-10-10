<?php

namespace App\Models;

/**
 * Table name trait.
 * 
 * Provides functionality for getting model table names.
 */
trait TableNameTrait
{
    /**
     * Get the table name for the model.
     *
     * @return string The table name
     */
    public static function getTableName(): string
    {
        $class = static::class;
        return (new $class())->getTable();
    }
}
