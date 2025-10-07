<?php

namespace App\Models;

use App\Filters\HasFilter;
use App\Filters\InteractsWithFilter;
use Carbon\Carbon;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as Build;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Expression;

/**
 * Базовая модель.
 *
 * @method static latest()
 * @method static orderBy(Closure|Build|Builder|Expression|string $column, string $direction = 'asc')
 * @method static inRandomOrder()
 * @method static find(mixed $id, array|string $columns = null)
 * @method static where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static limit(int $value)
 * @method static orderByDesc(Closure|Build|Builder|Expression|string $column)
 * @method static truncate()
 * @method static get()
 * @method static groupBy(Closure|Build|Builder|Expression|string $param)
 * @method static withCount(mixed $relations)
 * @method static firstOrCreate(array $attributes = [], array $values = [])
 * @method static whereHas(string $relation, Closure $callback = null, string $operator = '>=', int $count = 1)
 * @method static selectRaw(string $expression, array $bindings = [])
 * @method static firstOrNew(array $attributes = [], array $values = [])
 * @method static create(array $attributes = [])
 * @method static isNotEmpty()
 * @method static first()
 * @method static has(string $string)
 * @method static findOrFail(mixed $id, array $columns = ['*'])
 * @method static withInactive()
 * @method static externalId(int $id)
 * @method static name(string $name)
 * @method static whereNotNull(string|array $columns, string $boolean = 'and')
 *
 * @property Carbon $deleted_at Временная метка мягкого удаления
 */
class BaseModel extends Model implements HasFilter
{
    use HasOptions,
        SoftDeletes,
        InteractsWithFilter,
        TableNameTrait;
}
