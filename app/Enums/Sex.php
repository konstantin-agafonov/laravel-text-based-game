<?php

namespace App\Enums;

use App\Enums\Arrayable;
use App\Enums\Lableable;
use App\Enums\Traits\ToArrayTrait;
use App\Enums\Traits\ValueByNameTrait;
use App\Enums\ValueByNameInterface;

/*
 * Перечисление пола.
 */
enum Sex: int implements Lableable, Arrayable, ValueByNameInterface
{
    use ToArrayTrait,
        ValueByNameTrait;

    /*
     * Мужской.
     */
    case MALE = 0;

    /*
     * Женский.
     */
    case FEMALE = 1;

    /**
     * Возвращает лейбл.
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::MALE => 'Мужской',
            self::FEMALE => 'Женский',
        };
    }
}
