<?php

namespace App\Enums;

use App\Enums\Arrayable;
use App\Enums\Lableable;
use App\Enums\Traits\ToArrayTrait;
use App\Enums\Traits\ValueByNameTrait;
use App\Enums\ValueByNameInterface;

/*
 * Enumeration of sexes.
 */
enum Sex: int implements Lableable, Arrayable, ValueByNameInterface
{
    use ToArrayTrait,
        ValueByNameTrait;

    /*
     * Male.
     */
    case MALE = 0;

    /*
     * Female.
     */
    case FEMALE = 1;

    /**
     * Returns label.
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::MALE => 'Male',
            self::FEMALE => 'Female',
        };
    }
}
