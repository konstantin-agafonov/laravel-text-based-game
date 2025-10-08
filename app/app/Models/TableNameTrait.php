<?php

namespace App\Models;

/**
 * Table name trait.
 */
trait TableNameTrait
{
    /**
     * Returns table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        $class = static::class;
        return (new $class())->getTable();
    }
}
