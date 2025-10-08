<?php

namespace App\Modules\Play\Data;

use Spatie\LaravelData\Data;

class PlayData extends Data
{
    public function __construct(
        public string $move,
        /*public ?CarbonImmutable $published_at*/
    ) {
    }
}
