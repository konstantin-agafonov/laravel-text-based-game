<?php

namespace App\Modules\Play\Enums;

use App\Enums\Arrayable;
use App\Enums\Lableable;
use App\Enums\Traits\ToArrayTrait;
use App\Enums\Traits\ValueByNameTrait;
use App\Enums\ValueByNameInterface;

/*
 * Enumeration of game statuses.
 */
enum GameStatus: int implements Lableable, Arrayable, ValueByNameInterface
{
    use ToArrayTrait,
        ValueByNameTrait;

    /*
     * In progress.
     */
    case DRAFT = 0;

    /*
     * Win.
     */
    case PUBLISHED = 1;

    /**
     * Returns label.
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::PUBLISHED => 'Published',
        };
    }
}
