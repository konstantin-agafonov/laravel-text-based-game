<?php

namespace App\Models;

use Closure;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Arr;

/**
 * Removable global scopes trait.
 * 
 * Provides functionality for removing global scopes from models.
 */
trait HasRemovableGlobalScopes
{
    /**
     * Remove a single global scope.
     *
     * @param Scope|string $scope The scope to remove
     * @return void
     */
    public static function withoutGlobalScope(Scope|string $scope): void
    {
        if (is_string($scope) && is_array(static::$globalScopes[static::class])) {
            Arr::forget(static::$globalScopes[static::class], $scope);
        } elseif ($scope instanceof Closure) {
            Arr::forget(static::$globalScopes[static::class], spl_object_hash($scope));
        } elseif ($scope instanceof Scope) {
            Arr::forget(static::$globalScopes[static::class], get_class($scope));
        }
    }

    /**
     * Remove multiple global scopes.
     *
     * @param array<Scope|string> $scopes The scopes to remove
     * @return void
     */
    public static function withoutGlobalScopes(array $scopes = []): void
    {
        if(empty($scopes)) {
            static::$globalScopes = [];
        } else {
            foreach($scopes as $scope) {
                static::withoutGlobalScope($scope);
            }
        }
    }
}