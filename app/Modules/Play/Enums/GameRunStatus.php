<?php

namespace App\Modules\Play\Enums;

use App\Enums\Arrayable;
use App\Enums\Lableable;
use App\Enums\Traits\ToArrayTrait;
use App\Enums\Traits\ValueByNameTrait;
use App\Enums\ValueByNameInterface;

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
     * Loose.
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
