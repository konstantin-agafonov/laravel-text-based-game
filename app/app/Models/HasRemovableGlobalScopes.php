<?php

namespace App\Models;

use Closure;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Arr;

/**
 * Трейт удаления глобальных скоупов.
 */
trait HasRemovableGlobalScopes
{
    /**
     * Удаление одного скоупа.
     *
     * @param Scope|string $scope Скоуп
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
     * Удаление нескольких скоупов.
     *
     * @param array $scopes Скоупы
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