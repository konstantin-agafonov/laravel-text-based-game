<?php

namespace App\Enums;

use App\Enums\Traits\ToArrayTrait;
use App\Enums\Traits\ValueByNameTrait;

/*
 * Enumeration of gamerun statuses.
 */
enum GameRunStatus: int implements Lableable, Arrayable, ValueByNameInterface
{
    use ToArrayTrait,
        ValueByNameTrait;

    /*
     * In progress.
     */
    case IN_PROGRESS = 0;

    /*
     * Win.
     */
    case WIN = 1;

    /*
     * Win.
     */
    case LOOSE = 2;

    /**
     * Returns label.
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::IN_PROGRESS => 'In progress',
            self::WIN => 'WIN',
            self::LOOSE => 'LOOSE',
        };
    }
}
